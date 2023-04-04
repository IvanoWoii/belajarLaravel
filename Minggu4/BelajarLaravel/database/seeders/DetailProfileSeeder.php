<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert data ke table pegawai
        DB::table('detail_profile')->insert([
            'addres'=>'Jember',
            'nomor_tlp'=>'08xxxxxxx',
            'ttl'=>'2000-11-26',
            'foto'=>'picture.png'
        ]);
        // DB::insert('insert into users (addres,nomor_tlp,ttl,foto) values (?, ?,?,?)', ['Jember','12312','2000-11-26','picture.png']);
    }
}
