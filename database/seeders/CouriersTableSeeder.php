<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Courier;

class CouriersTableSeeder extends Seeder
{
    public function run()
    {
        $couriers = [
            ['name' => 'Citylink Express', 'tracking_url' => 'https://www.tracking.my/citylink/'],
            ['name' => 'Skynet', 'tracking_url' => 'https://www.tracking.my/skynet/'],
            ['name' => 'Pos Laju', 'tracking_url' => 'https://www.tracking.my/poslaju/'],
            ['name' => 'J & T Express', 'tracking_url' => 'https://www.tracking.my/jt/'],
            ['name' => 'Ninja Van', 'tracking_url' => 'https://www.tracking.my/ninja-van/'],
            ['name' => 'DHL Express', 'tracking_url' => 'https://www.tracking.my/dhl'],
        ];

        foreach ($couriers as $courier) {
            Courier::create($courier);
        }
    }
}

