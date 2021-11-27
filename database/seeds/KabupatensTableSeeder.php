<?php

use Illuminate\Database\Seeder;
use App\Kabupaten;

class KabupatensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kabupaten::create([
            'name'=>'BADUNG',
            'slug'=>'badung'
        ]);

        Kabupaten::create([
            'name'=>'BANGLI',
            'slug'=>'bangli'
        ]);
        Kabupaten::create([
            'name'=>'BULELENG',
            'slug'=>'buleleng'
        ]);

        Kabupaten::create([
            'name'=>'GIANYAR',
            'slug'=>'gianyar'
        ]);

        Kabupaten::create([
            'name'=>'JEMBRANA',
            'slug'=>'jembrana'
        ]);

        Kabupaten::create([
            'name'=>'KARANGASEM',
            'slug'=>'karangasem'
        ]);
        Kabupaten::create([
            'name'=>'KLUNGKUNG',
            'slug'=>'klungkung'
        ]);

        Kabupaten::create([
            'name'=>'KOTA DENPASAR',
            'slug'=>'kota-denpasar'
        ]);
        Kabupaten::create([
            'name'=>'TABANAN',
            'slug'=>'tabanan'
        ]);
    }
}
