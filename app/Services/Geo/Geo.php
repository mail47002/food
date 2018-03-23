<?php

namespace App\Services\Geo;


class Geo
{
    const KM = 111.13384;
    const MI = 69.05482;

    protected $unit;
    protected $decimal;

    public function __construct($unit = 'km', $decimal = 2)
    {
        $this->unit = $unit;
        $this->decimal = $decimal;
    }

    /**
     * Return the distance
     *
     * @param $from
     * @param $to
     * @return float
     */
    public function getDistance($from, $to) {
        $deg = $this->calculateDistance($from, $to);

        $distance = $this->convertDistance($deg, $this->unit);

        return round($distance, $this->decimal);
    }

    /**
     * Calculate the distance in degrees
     *
     * @param $from
     * @param $to
     * @return float
     */
    protected function calculateDistance($from, $to)
    {
        return rad2deg(acos((sin(deg2rad($from['lat']))*sin(deg2rad($to['lat']))) + (cos(deg2rad($from['lat']))*cos(deg2rad($to['lat']))*cos(deg2rad($from['lng'] - $to['lng'])))));
    }

    /**
     * Convert the distance in degrees to the chosen unit (kilometres, miles)
     *
     * @param $deg
     * @param $unit
     * @return float
     */
    protected function convertDistance($deg, $unit)
    {
        switch($unit) {
            case 'km':
                $distance = $deg * self::KM;
                break;
            case 'mi':
                $distance = $deg * self::MI;
                break;
        }

        return $distance;
    }
}