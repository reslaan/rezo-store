<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'=>'reslaan',
            'email'=>'reslaan@gmail.com',
            'password'=>Hash::make('12345678'),
        ]);
    }
}
