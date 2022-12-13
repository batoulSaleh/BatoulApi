<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Cleaning;
use App\Models\Home;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Rule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Admin::create([
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'password' => Hash::make('adminadmin'),
        // ]);

        Admin::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin'),
        ]);


    Payment::create([
        'name_en' => 'credit cart',
        'name_ar' => 'كريدت كارد',
    ]);

    Payment::create([
        'name_en' => 'cash on delivery',
        'name_ar' => ' الدفع عند الاستلام',
    ]);





    }
}
