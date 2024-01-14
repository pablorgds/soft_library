<?php

namespace app\services;

class WeatherService
{
    private $apiKey;
    private $baseUrl = 'https://api.hgbrasil.com/weather';

    public function __construct($apiKey)
    {
        $this->apiKey = 'c1ff6c76';
    }

    public function getWeather($cidade, $estado)
    {
        $url = "{$this->baseUrl}?key={$this->apiKey}&city_name={$cidade},{$estado}";

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        // Getting the data
        return $data['results'];
    }
}