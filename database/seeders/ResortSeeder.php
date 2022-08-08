<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resorts')->insert([
            'name' => Str::random(10),
            'price' => Str::random(10),
            'location' => Str::random(10),
            'image' => Str::random(10),
            'description' => Str::random(10)
        ]);

        DB::table('resorts')->insert([
            'name' => Str::random(10),
            'price' => Str::random(10),
            'location' => Str::random(10),
            'image' => Str::random(10),
            'description' => Str::random(10)
        ]);

        DB::table('resorts')->insert([
            'name' => Str::random(10),
            'price' => Str::random(10),
            'location' => Str::random(10),
            'image' => Str::random(10),
            'description' => Str::random(10)
        ]);

        DB::table('resorts')->insert([
            'name' => Str::random(10),
            'price' => Str::random(10),
            'location' => Str::random(10),
            'image' => Str::random(10),
            'description' => Str::random(10)
        ]);

        DB::table('resorts')->insert([
            'name' => Str::random(10),
            'price' => Str::random(10),
            'location' => Str::random(10),
            'image' => Str::random(10),
            'description' => Str::random(10)
        ]);

        DB::table('resorts')->insert([
            'name' => Str::random(10),
            'price' => Str::random(10),
            'location' => Str::random(10),
            'image' => Str::random(10),
            'description' => Str::random(10)
        ]);
        DB::table('resorts')->insert([
            'name' => Str::random(10),
            'price' => Str::random(10),
            'location' => Str::random(10),
            'image' => Str::random(10),
            'description' => Str::random(10)
        ]);
        DB::table('resorts')->insert([
            'name' => Str::random(10),
            'price' => Str::random(10),
            'location' => Str::random(10),
            'image' => Str::random(10),
            'description' => Str::random(10)
        ]);
    }
}
