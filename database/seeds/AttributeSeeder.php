<?php

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Attribute::create([
            'id' => 1,
            'name' => 'المقاس',
        ]);
        Attribute::create([
            'id' => 2,
            'name' => 'اللون',
        ]);
        Attribute::create([
            'id' => 3,
            'name' => 'الوزن',
        ]);
      //  factory(\App\Models\Attribute::class,5)->create();

    }
}
