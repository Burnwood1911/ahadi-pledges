<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jumuiya;
use App\Models\PaymentMethod;
use App\Models\PledgeType;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $paymentmethods = ['AIRTEL', 'TIGO', 'MPESA', 'CRDB'];

        foreach($paymentmethods as $pm){
            PaymentMethod::factory()->create([
                'name' => $pm
            ]);
        }

        $jumuiyas = ['SINZA', 'MWENGE', 'KINONDONI', 'MBEZI'];

        foreach($jumuiyas as $pm){
            Jumuiya::factory()->create([
                'name' => $pm
            ]);
        }

        $pledgetypes = ['MONEY', 'OBJECT'];

        foreach($pledgetypes as $pm){
            PledgeType::factory()->create([
                'title' => $pm
            ]);
        }

        $roles = ['USER', 'ADMIN'];

        foreach($roles as $pm){
            Role::factory()->create([
                'name' => $pm
            ]);
        }


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
