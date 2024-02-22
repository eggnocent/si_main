<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            ['kategori' => 'Pendingin Ruang',
             'deskripsi' => 'M'],
             ['kategori' => 'Personal Komputer',
             'deskripsi' => 'M'],
             ['kategori' => 'Laptop',
             'deskripsi' => 'M'],
             ['kategori' => 'Speaker Active',
             'deskripsi' => 'M'],
             ['kategori' => 'Scanner',
             'deskripsi' => 'M'],
             ['kategori' => 'Printer',
             'deskripsi' => 'M'],
             ['kategori' => 'Projector',
             'deskripsi' => 'M'],
             ['kategori' => 'Projector Screen',
             'deskripsi' => 'M'],
             ['kategori' => 'Mesin Bor',
             'deskripsi' => 'M'],
             ['kategori' => 'Crimping Tools',
             'deskripsi' => 'A'],
             ['kategori' => 'Obeng',
             'deskripsi' => 'A'],
             ['kategori' => 'Tang',
             'deskripsi' => 'A'],
             ['kategori' => 'Alat Ukur',
             'deskripsi' => 'A'],
             ['kategori' => 'Solder',
             'deskripsi' => 'A'],
             ['kategori' => 'Konektor Jaringan | Bahan Praktik',
             'deskripsi' => 'BHP'],
             ['kategori' => 'Kabel Jumper | Bahan Praktik',
             'deskripsi' => 'BHP'],
             ['kategori' => 'Perangkat Jaringan | Bahan Praktik',
             'deskripsi' => 'BTHP'],
             ['kategori' => 'Mikrokontroller Board | Bahan Praktik',
             'deskripsi' => 'BTHP'],
             ['kategori' => 'Mikrokontroller Module | Bahan Praktik',
             'deskripsi' => 'BTHP'],
             ['kategori' => 'Komponen Elektronika | Bahan Praktik',
             'deskripsi' => 'BTHP']
        ];

        Kategori::insert($data);

    }
}
