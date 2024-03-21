<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert([
            ['ekskul' => 'Irmas'],
            ['ekskul' => 'Pramuka'],
            ['ekskul' => 'Pecinta Alam'],
            ['ekskul' => 'PMR'],
            ['ekskul' => 'Jurnalistik'],
            ['ekskul' => 'Osis'],
        ]);
    }
}
