<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Customer;
use App\Models\Question;
use App\Models\TypeKuesioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class KuesionerController extends Controller
{
    public function index()
    {
        $data['type_kuesioner'] = TypeKuesioner::all();
        return view('pages.kuesioner.index', $data);
    }
    public function start(Request $request)
    {
        $request = json_decode($request->getContent());
        if ($this->isStartConditionMet($request)) {
            return $this->kuesioner($request);
        } 
        return $this->sendDefaultMessage($request);
    }

    private function isStartConditionMet($request)
    {
        $condition = $request->type == 'quick_reply' && $request->payload->postbackText == 'Ya';
        if ($condition || Cache::has($request->source)) {
            Cache::put($request->source, 'start', now()->addMinutes(10));
            return true;
        }
        return false;
    }

    private function sendDefaultMessage($request)
    {
        $message = "Terima kasih telah menghubungi kami. Sebagai informasi, untuk pertanyaan mengenai pelayanan di Rumah Sakit Tiara Sella dapat menghubungi :	\n0736-20350 (Telepon)\n0811-7153-399 (WhatsApp)\nUntuk pendaftaran dapat whatsapp ke no 08117307272, atau akses www.digital.rstiarasella.com\nKami berharap dapat terus dipercaya melayani anda dan orang terkasih. *Salam Sehat*";
        return $this->send_message($request, $message);
    }

    public function kuesioner($request)
    {
        $this->initializeState($request);
        $client = $this->getOrCreateClient($request);

        switch (Cache::get('state_'.$request->source)) {
            case '0':
                return $this->handleInitialState($request);
            case '1':
                return $this->handleFirstState($request);
            case '3':
                return $this->sendDefaultMessage($request);
            default:
                return $this->handleSubsequentStates($request, $client);
        }
    }

    private function initializeState($request)
    {
        if (!Cache::has('state_'.$request->source)) {
            Cache::put('state_'.$request->source, '0', now()->addMinutes(10));
        }
    }

    private function getOrCreateClient($request)
    {
        return Customer::firstOrCreate(
            ['no_hp' => $request->source],
            ['nama' => $request->sender->name]
        );
    }

    private function handleInitialState($request)
    {
        $type = TypeKuesioner::all();
        $message = 'Pelayanan yang didapatkan :';
        $options = $this->formatOptions($type, 'pelayanan_');
        return $this->sendInteractiveMessage($request, $message, $options, '1');
    }

    private function handleFirstState($request)
    {
        $type_kuesioner_id = $this->extractIdFromPayload($request->payload->postbackText);
        $question = Question::where('type_kuesioner_id', $type_kuesioner_id)->where('is_start', 1)->first();
        $options = $this->subFormatOptions(json_decode($question->choice), $question->id);
        return $this->sendInteractiveMessage($request, $question->question, $options, '2');
    }

    private function handleSubsequentStates($request, $client)
    {
        $answer_state = explode("_", $request->payload->postbackText);
        $question_before = Question::where('id', end($answer_state))->first();
        $this->storeAnswer($client, $question_before, $answer_state[0]);
        $question = Question::where('before_question', end($answer_state))->first();
        if (!$question) {
            return $this->sendDefaultMessage($request);
        }
        $options = $this->subFormatOptions(json_decode($question->choice), $question->id);
        return $this->sendInteractiveMessage($request, $question->question, $options, '2');
    }

    private function formatOptions($data, $prefix)
    {
        return collect($data)->map(function ($item) use ($prefix) {
            return [
                'id' => $prefix.$item->id,
                'teks' => $item->nama ?? $item,
            ];
        })->toJson();
    }

    private function subFormatOptions($data, $prefix)
    {
        return collect($data)->map(function ($item) use ($prefix) {
            return [
                'id' => $item.'_'.$prefix,
                'teks' => $item->nama ?? $item,
            ];
        })->toJson();
    }

    private function sendInteractiveMessage($request, $message, $options, $nextState)
    {
        $response = $this->send_interaktive($request, $message, $options);
        if ($response['status'] == true) {
            Cache::put('state_'.$request->source, $nextState, now()->addMinutes(10));
        }
        return;
    }

    private function storeAnswer($client, $question, $answer)
    {
        Answer::create([
            'customer_id' => $client->id,
            'type_kuesioner_id' => $question->type_kuesioner_id,
            'question_id' => $question->id,
            'answer' => $answer,
        ]);
    }

    private function extractIdFromPayload($postbackText)
    {
        return explode("_", $postbackText)[1];
    }

    public function send_interaktive($request, $message, $option)
    {
        $body = [
            'recipient' => $request->source,
            'message' => $message,
            'option' => $option,
        ];
        $response = Http::withHeaders([
            'Token' => '9812yK76RIMXu4DfgDVIVJIN7vECiXyudc6W40UsCP8nF7qLaH7654kwH3AI',
            'Content-Type' => 'application/json'
        ])->post('https://app-api.wazapbro.com/index.php/api/apis/myapi_interactive/format/json', $body);
            
       return $response->json();
    }

    public function send_message($request, $message)
    {
        $body = [
            'recipient' => $request->source,
            'message' => $message,
        ];
        $response = Http::withHeaders([
            'Token' => '9812yK76RIMXu4DfgDVIVJIN7vECiXyudc6W40UsCP8nF7qLaH7654kwH3AI',
            'Content-Type' => 'application/json'
        ])->post('https://app-api.wazapbro.com/index.php/api/apis/myapi_interactive/format/json', $body);
            
       return $response->json();
    }
}
