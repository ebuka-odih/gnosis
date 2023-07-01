<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user2 = User::where('email', '=', 'admin@gnosis.fit')->first();
        if($user2 === null){
           User::create([
                'name' => 'Gnosis Fit Collections',
                'email' => 'admin@gnosis.fit',
                'status' => 1,
                'user_role' => 1,
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => Hash::make('FitCollections112'),
            ]);
        }

    }


}
