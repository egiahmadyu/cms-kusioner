<?php

namespace Database\Seeders;

use App\Models\TypeKuesioner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeKuesioner::create([
            'nama' => 'Rawat Inap',
            'to_question' => 1
        ]);

        TypeKuesioner::create([
            'nama' => 'Rawat Jalan / Hemodialisa',
            'to_question' => 1
        ]);

        TypeKuesioner::create([
            'nama' => 'IGD',
            'to_question' => 3
        ]);
    }
}
