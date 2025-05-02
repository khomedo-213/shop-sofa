<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run(): void
     {
         DB::table('invoices')->insert([
             [
                 'user_id'      => 1,
                 'total_amount' => 320000.00,
                 'issued_date'  => '2025-04-16',
                 'status'       => 'pending',
                 'note'         => 'none.',
                 'created_at'   => date('Y-m-d H:i:s'),
                 'updated_at'   => date('Y-m-d H:i:s'),
             ],
         ]);
     }

}
