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
    public function run(): void
    {
        Question::create([
            'question' => 'Kelas perawatan yang didapatkan : ',
            'next_question' => 2,
            'choice' => '["SUITE", "VVIP", "VIP", "KELAS 1", "KELAS II", "KELAS III", "ICU", "NICU", "ISOLASI"]'
        ]);

        Question::create([
            'question' => 'Kelas perawatan yang didapatkan : ',
            'next_question' => 3,
            'choice' => '["DIAMOND", "EMERALD 1", "EMERALD 2", "RUBY", "TOPAZ"]'
        ]);

        Question::create([
            'question' => 'Pelayanan Dokter Spesialis / Dokter Umum ',
            'next_question' => 4,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'question' => 'Pelayanan Perawat / Bidan',
            'next_question' => 5,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'question' => 'Pelayanan Farmasi',
            'next_question' => 6,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'question' => 'Pelayanan Radiologi',
            'next_question' => 7,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'question' => 'Pelayanan Laboratoriumm',
            'next_question' => 8,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'question' => 'Pelayanan Gizi',
            'next_question' => 9,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'question' => 'Pelayanan Rehab Medis / Fisioterapi',
            'next_question' => 10,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'question' => 'Pelayanan Kasir / Asuransi',
            'next_question' => 11,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'question' => 'Kebersihan Ruangan, Kerapihan dan Kelayakan Fasilitas',
            'next_question' => 12,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'question' => 'Pelayanan Pendaftaran Administrasi',
            'next_question' => 13,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);

        Question::create([
            'question' => 'Kemanan dan Ketertiban Rumah Sakit',
            'is_end' => 1,
            'next_question' => null,
            'choice' => '["SANGAT PUAS", "PUAS", "TIDAK PUAS"]'
        ]);
    }
}
