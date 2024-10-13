<?php

namespace Database\Seeders;

use App\Models\FlightDays;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaysforFlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FlightDays::truncate();
        $data = [
            ["name"=> "Sunday",
            "status" => 'a'
            ],
            ["name"=> "Monday",
            "status" => 'a'
            ],
            ["name"=> "Tuesday",
            "status" => 'a'
            ],
            ["name"=> "Wednesday",
            "status" => 'a'
            ],
            ["name"=> "Thursday",
            "status" => 'a'
            ],
            ["name"=> "Friday",
            "status" => 'a'
            ],
            ["name"=> "Saturday",
            "status" => 'a'
            ]
           
        ];
        foreach ($data as $fldata) {
            $flightdays=FlightDays::create($fldata);
        }
    }
}
