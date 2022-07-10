<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'rezo',
            'mobile'=>'+966569847123',
            'password'=>Hash::make('12345678'),
            'isVerified'=>true,
        ]);
    }
}
