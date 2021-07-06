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
        $key->name = 'Green Key';
        $key->description = 'A green key';
        $key->price = '10';
        $key->save();

        $key->vehicles()->attach([1,2]);

        $key = new Key();
        $key->name = 'Red Key';
        $key->description = 'A red key';
        $key->price = '20';
        $key->save();

        $key->vehicles()->attach([2,1]);

        $key = new Key();
        $key->name = 'Gold Key';
        $key->description = 'A gold key';
        $key->price = '30';
        $key->save();
        
        $key->vehicles()->attach([3,1]);
    }
}
