<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run():void
     {
        Question::create([
            
            'question' => 'Pelayanan Dokter Spesialis / Dokter Umum ',
            'before_question' => null,
            'is_start' => 1,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            
            'question' => 'Pelayanan Perawat / Bidan',
            'before_question' => 1,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            
            'question' => 'Pelayanan Farmasi',
            'before_question' => 2,
            'choice' => '["SANGAT PUAS","PUAS","TIDAK PUAS","TIDAK MENGGUNAKAN"]'
        ]);

        Question::create([
            
            'question' => 'Pelayanan Radiologi',
            'before_question' => 3,
            'choice' => '["SANGAT PUAS","PUAS","TIDAK PUAS","TIDAK MENGGUNAKAN"]'
        ]);

        Question::create([
            
            'question' => 'Pelayanan Laboratoriumm',
            'before_question' => 4,
            'choice' => '["SANGAT PUAS","PUAS","TIDAK PUAS","TIDAK MENGGUNAKAN"]'
        ]);

        Question::create([
            
            'question' => 'Pelayanan Gizi',
            'before_question' => 5,
            'choice' => '["SANGAT PUAS","PUAS","TIDAK PUAS","TIDAK MENGGUNAKAN"]'
        ]);

        Question::create([
            
            'question' => 'Pelayanan Rehab Medis / Fisioterapi',
            'before_question' => 6,
            'choice' => '["SANGAT PUAS","PUAS","TIDAK PUAS","TIDAK MENGGUNAKAN"]'
        ]);

        Question::create([
            
            'question' => 'Pelayanan Kasir / Asuransi',
            'before_question' => 7,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            
            'question' => 'Kebersihan Ruangan, Kerapihan dan Kelayakan Fasilitas',
            'before_question' => 8,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            
            'question' => 'Pelayanan Pendaftaran Administrasi',
            'before_question' => 9,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            
            'question' => 'Kemanan dan Ketertiban Rumah Sakit',
            'is_end' => 1,
            'before_question' => 10,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);
     }
    public function run_old(): void
    {
        Question::create([
            'type_kuesioner_id' => 1,
            'question' => 'Kelas perawatan yang didapatkan : ',
            'before_question' => null,
            'choice' => '["SUITE", "VVIP", "VIP", "KELAS 1", "KELAS II", "KELAS III", "ICU", "NICU", "ISOLASI"]'
        ]);

        Question::create([
            'type_kuesioner_id' => 1,
            'question' => 'Ruang Perawatan : ',
            'before_question' => 1,
            'choice' => '["DIAMOND", "EMERALD 1", "EMERALD 2", "RUBY", "TOPAZ"]'
        ]);

        Question::create([
            'type_kuesioner_id' => 1,
            'question' => 'Pelayanan Dokter Spesialis / Dokter Umum ',
            'before_question' => 2,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'type_kuesioner_id' => 1,
            'question' => 'Pelayanan Perawat / Bidan',
            'before_question' => 3,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'type_kuesioner_id' => 1,
            'question' => 'Pelayanan Farmasi',
            'before_question' => 4,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'type_kuesioner_id' => 1,
            'question' => 'Pelayanan Radiologi',
            'before_question' => 5,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'type_kuesioner_id' => 1,
            'question' => 'Pelayanan Laboratoriumm',
            'before_question' => 6,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'type_kuesioner_id' => 1,
            'question' => 'Pelayanan Gizi',
            'before_question' => 7,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'type_kuesioner_id' => 1,
            'question' => 'Pelayanan Rehab Medis / Fisioterapi',
            'before_question' => 8,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'type_kuesioner_id' => 1,
            'question' => 'Pelayanan Kasir / Asuransi',
            'before_question' => 9,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'type_kuesioner_id' => 1,
            'question' => 'Kebersihan Ruangan, Kerapihan dan Kelayakan Fasilitas',
            'before_question' => 10,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'type_kuesioner_id' => 1,
            'question' => 'Pelayanan Pendaftaran Administrasi',
            'before_question' => 11,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'type_kuesioner_id' => 1,
            'question' => 'Kemanan dan Ketertiban Rumah Sakit',
            'is_end' => 1,
            'before_question' => 12,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);
    }
}
