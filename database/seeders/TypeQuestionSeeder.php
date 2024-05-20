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
        ]);

        TypeKuesioner::create([
            'nama' => 'Rawat Jalan / Hemodialisa',
        ]);

        TypeKuesioner::create([
            'nama' => 'IGD',
        ]);
    }
}
