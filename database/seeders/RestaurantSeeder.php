<?php

namespace Database\Seeders;

use App\Models\RestaurantModel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'restaurant_name' => 'Restaurent 1',
                'lat' => -34.06748705504900000000,
                'long' => 150.73672425596000000000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'restaurant_name' => 'Restaurent 2',
                'lat' => -23.70588549000000000000,
                'long' => 133.87858560000000000000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'restaurant_name' => 'Restaurent 3',
                'lat' => -23.70588549000000000000,
                'long' => 133.87858560000000000000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];
        foreach ($data as $new_data) {
            RestaurantModel::updateOrCreate(['id' => $new_data['id']], $new_data);
        }
    }
}
