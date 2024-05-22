<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Customer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ConversationController extends Controller
{
    public function index(Request $request)
    {
        $request = json_decode($request->getContent());
        // return response()->json($request);
        if ($this->isStartConditionMet($request)) {
            return $this->kuesioner($request);
        } else if ($request->payload->text !== 'Auto Generated Message By System From direct Message') {
            // return $this->kuesioner($request);
            return $this->sendDefaultMessage($request);
        }
        return response()->json(['message' => 'Broadcast']);
    }

    public function kuesioner($request)
    {
        $this->initializeState($request);
        $client = $this->getOrCreateClient($request);

        switch (Cache::get('state_'.$request->source)) {
            case '0':
                return $this->handleInitialState($request);
            case '1':
                return $this->handleSubsequentStates($request, $client);
            case '3':
                return $this->sendDefaultMessage($request);
            default:
                return $this->handleSubsequentStates($request, $client);
        }
    }

    public function handleSubsequentStates($request, $client)
    {
        $answer_state = explode("_", $request->payload->postbackText);
        $this->storeAnswer($answer_state[0], $answer_state[1], $client);
        $question = Question::where('before_question', end($answer_state))->first();
        $option = $this->formatOptions(json_decode($question->choice), $question->id);
        return $this->sendInteractiveMessage($request, $question->question, $option, $question->is_end == '1' ? '3': '2');
    }

    private function getOrCreateClient($request)
    {
        return Customer::firstOrCreate(
            ['no_hp' => $request->source],
            ['nama' => $request->sender->name]
        );
    }

    public function storeAnswer($answer, $question_id, $client)
    {
        Answer::create([
            'customer_id' => $client->id,
            // 'type_kuesioner_id' => $question->type_kuesioner_id,
            'question_id' => $question_id,
            'answer' => $answer,
        ]);
    }

    public function handleInitialState($request)
    {
        $question = Question::where('is_start', 1)->first();
        $option = $this->formatOptions(json_decode($question->choice), $question->id);
        // dd($option);
        return $this->sendInteractiveMessage($request, $question->question, $option, '1');
    }

    private function sendInteractiveMessage($request, $message, $options, $nextState)
    {
        $response = $this->send_interaktive($request, $message, $options);
        if ($response['status'] == true) {
            Cache::put('state_'.$request->source, $nextState, now()->addMinutes(10));
        }
        return $response;
    }

    public function send_interaktive($request, $message, $option)
    {
        $body = [
            'recipient' => $request->source,
            'message' => $message,
            'option' => $option,
        ];
        $response = Http::withHeaders([
            'Token' => '432N1973UIMXu4DfgDVIVJIN7vECiii4dc6W40UsCP8nF7qLaH7654kwH762',
            'Content-Type' => 'application/json'
        ])->post('https://app-api.wazapbro.com/index.php/api/apis/myapi_interactive/format/json', $body);
            
       return $response->json();
    }

    private function formatOptions($data, $prefix)
    {
        return collect($data)->map(function ($item) use ($prefix) {
            return [
                'id' => $item.'_'.$prefix,
                'teks' => $item,
            ];
        })->toJson();
    }

    private function initializeState($request)
    {
        if (!Cache::has('state_'.$request->source)) {
            Cache::put('state_'.$request->source, '0', now()->addMinutes(10));
        }
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

    public function send_message($request, $message)
    {
        $body = [
            'recipient' => $request->source,
            'message' => $message,
        ];
        $response = Http::withHeaders([
            'Token' => '432N1973UIMXu4DfgDVIVJIN7vECiii4dc6W40UsCP8nF7qLaH7654kwH762',
            'Content-Type' => 'application/json'
        ])->post('https://app-api.wazapbro.com/index.php/api/apis/myapi_interactive/format/json', $body);
            
       return $response->json();
    }
}
