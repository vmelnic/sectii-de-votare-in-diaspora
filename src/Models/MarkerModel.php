<?php

namespace App\Models;

/**
 * Class MarkerModel
 */
class MarkerModel
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $location;

    /**
     * @var string
     */
    public $address;

    /**
     * @var string
     */
    public $state;

    /**
     * @var string
     */
    public $sv;

    /**
     * @var string
     */
    public $lat;

    /**
     * @var string
     */
    public $lon;

    /**
     * Marker constructor.
     * @param string $title
     * @param string $location
     * @param string $address
     * @param string $state
     * @param string $sv
     * @param string $lat
     * @param string $lon
     */
    public function __construct(string $title, string $location, string $address, string $state, string $sv, string $lat, string $lon)
    {
        $this->title = $title;
        $this->location = $location;
        $this->address = $address;
        $this->state = $state;
        $this->sv = $sv;
        $this->lat = $lat;
        $this->lon = $lon;
    }
}
