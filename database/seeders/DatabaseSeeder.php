<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Officer;
use App\Models\DuesCategory;
use App\Models\DuesMember;
use App\Models\Payment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
         
            $user1 = User::create([
            'name' => 'pak agus',
            'username' => 'pakrt',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'nohp' => '08123456700',
            'address' => 'Jl. Dahlia No. 9',
            'level' => 'admin',
    ]);
        
          $user2 = User::create([
            'name' => 'ibu rani',
            'username' => 'burt',
            'email' => 'officer@gmail.com',
            'password' => bcrypt('123'),
            'nohp' => '08123456781',
            'address' => 'Jl. Kenanga No. 8',
            'level' => 'officer'

     ]);
        
            $user3 = User::create([
            'name' => 'zahra',
            'username' => 'warga123',
            'email' => 'warga@gmail.com',
            'password' => bcrypt('123'),
            'nohp' => '08123456781',
            'address' => 'Jl. Kenanga No. 8',
            'level' => 'warga'
        
    ]);

             $user4 = User::create([
            'name' => 'tasa',
            'username' => 'warga12345',
            'email' => 'warga3@gmail.com',
            'password' => bcrypt('123'),
            'nohp' => '08123456781',
            'address' => 'Jl. Kenanga No. 8',
            'level' => 'warga'
        
    ]);

         Officer::create([
        'iduser' => $user1->id, 
        // rt
    ]);

        Officer::create([
            'iduser' => $user2->id, // bendahara
    ]);

           DuesCategory::create([
            'id' => 1,
            'period' => 'mingguan', 
            'nominal' => 15000, 
            'status' => 'aktif'
            
    ]);

            DuesCategory::create([
            'id' => 2,
            'period' => 'bulanan', 
            'nominal' => 50000,
            'status' => 'aktif'

    ]);

        DuesCategory::create([
            'id' => 3, 
            'period' => 'tahunan',
            'nominal' => 600000, 
            'status' => 'aktif'

    ]);


        DuesMember::create([
            'iduser' => $user1->id,
            'idduescategory' => 1,
    ]);

        DuesMember::create([
            'iduser' => $user2->id,
            'idduescategory' => 2, 
           
    ]);

         DuesMember::create([
            'iduser' => $user3->id,
            'idduescategory' => 3, 
        
    ]);

            Payment::create([
            'iduser' => $user1->id,
            'period' => 'mingguan',
            'nominal' => 15000,
            'petugas' => 'admin'
            
    ]);

            Payment::create([
            'iduser' => $user2->id,
            'period' => 'bulanan',
            'nominal' => 50000,
            'petugas' => 'bendahara',
            'status' => 'verified'
            
    ]);

    
            Payment::create([
            'iduser' => $user3->id,
            'period' => 'mingguan',
            'nominal' => 15000,
            'petugas' => 'warga'
            
    ]);

            Payment::create([
            'iduser' => $user4->id,
            'period' => 'tahunan',
            'nominal' => 600000,
            'petugas' => 'warga',
            'status' => 'verified'
            
    ]);

  }
 }
