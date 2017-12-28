<?php

namespace models;

use config\Config;

class PlanetsMaker
{

    public static function calculateDiameter($position, $isMain = false)
    {
        if ($isMain) {
            $diameter = Config::INITIAL_DIAMETER;
        } else {
            $min = [
                9747, 9849, 9899, 11091, 12166,
                12166, 11874, 12921, 12689, 12410,
                12083, 11662, 10392, 9000, 8062
            ];

            $max = [
                10392, 10488, 11747, 14491, 14900,
                15748, 15588, 15905, 15588, 15000,
                14318, 13416, 11000, 9644, 8602
            ];

            $diameter = mt_rand($min[$position - 1], $max[$position - 1]);
        }
        $diameter *= Config::PLANET_SIZE_MULTIPLIER;

        return $diameter;
    }

    public static function calculateMaxFields($diameter)
    {
        return (int)pow(($diameter / 1000), 2);
    }

    public static function calculateTemp($position)
    {
        $tempMinMax = [
            1 => [220, 260],
            2 => [170, 210],
            3 => [120, 160],
            4 => [70, 110],
            5 => [60, 100],
            6 => [50, 90],
            7 => [40, 80],
            8 => [30, 70],
            9 => [20, 60],
            10 => [10, 50],
            11 => [0, 40],
            12 => [-10, 30],
            13 => [-50, -10],
            14 => [-90, -50],
            15 => [-130, -90],
        ];

        $randomTemperature = mt_rand($tempMinMax[$position][0], $tempMinMax[$position][1]);

        $temp['min'] = $randomTemperature - 40;
        $temp['max'] = $randomTemperature;

        return $temp;
    }

}