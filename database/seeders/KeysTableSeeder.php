<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Key;

class KeysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Key::truncate();
        $key = new Key();
        $key->name = 'K name 1';
        $key->description = 'K desc 1';
        $key->price = '10';
        $key->save();

        $key->vehicles()->attach([1,2]);

        $key = new Key();
        $key->name = 'K name 2';
        $key->description = 'K desc 2';
        $key->price = '20';
        $key->save();

        $key->vehicles()->attach([2,1]);

        $key = new Key();
        $key->name = 'K name 3';
        $key->description = 'K desc 3';
        $key->price = '30';
        $key->save();
        
        $key->vehicles()->attach([3,1]);
    }
}
