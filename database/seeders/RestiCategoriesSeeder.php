<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestiCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resti_categories')->insert([
            ['nama_kategori' => 'Lingkungan Hidup'],
            ['nama_kategori' => 'Layanan Publik'],
            ['nama_kategori' => 'Fasilitas Umum'],
        ]);
    }
}
