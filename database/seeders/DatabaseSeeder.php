<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DuesCategory;
use App\Models\DuesMember;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
         
            $admin = User::create([
            'name' => 'Admin RW',
            'username' => 'adminrw',
            'email' => 'adminrw@example.com',
            'password' => bcrypt('123456'),
            'nohp' => '08123456700',
            'address' => 'Jl. Dahlia No. 9',
            'level' => 'admin',
    ]);
        
        $warga1 = User::create([
            'name' => 'admin',
            'username' => 'admin123',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'nohp' => '08123456781',
            'address' => 'Jl. Kenanga No. 8',
            'level' => 'admin'

     ]);
        
                $warga2 = User::create([
            'name' => 'Warga',
            'username' => 'warga123',
            'email' => 'warga@gmail.com',
            'password' => bcrypt('123'),
            'nohp' => '08123456781',
            'address' => 'Jl. Kenanga No. 8',
            'level' => 'warga'
        
    ]);

                $warga3 = User::create([
            'name' => 'Warga3',
            'username' => 'warga12345',
            'email' => 'warga3@gmail.com',
            'password' => bcrypt('123'),
            'nohp' => '08123456781',
            'address' => 'Jl. Kenanga No. 8',
            'level' => 'warga'
        
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
            'iduser' => $warga1->id,
            'idduescategory' => 1,
    ]);

        DuesMember::create([
            'iduser' => $warga2->id,
            'idduescategory' => 2, 
            // bulanan
    ]);

         DuesMember::create([
            'iduser' => $warga3->id,
            'idduescategory' => 3, 
            // bulanan
    ]);

            Payment::create([
            'iduser' => $warga1->id,
            'period' => '2025-08',
            'nominal' => 50000,
            'petugas' => 'adminrw'
            
    ]);

            Payment::create([
            'iduser' => $warga2->id,
            'period' => '2025-08',
            'nominal' => 50000,
            'petugas' => 'adminrw'
            
    ]);

                Payment::create([
            'iduser' => $warga2->id,
            'period' => '2025-08',
            'nominal' => 50000,
            'petugas' => 'adminrw'
            
    ]);

  }
 }
