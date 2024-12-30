<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SaleItem::factory(30)->recycle([
            Sale::factory(20)->recycle([
                Customer::all(),
                User::all()
            ])->create(),
            Product::factory(20)->recycle([
                Category::all()
            ])->create()
        ])->create();
    }
}
