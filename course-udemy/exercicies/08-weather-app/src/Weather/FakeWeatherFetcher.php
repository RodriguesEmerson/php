<?php

namespace App\Weather;

class FakeWeatherFetcher implements WeatherFetcherInterface{
   public function fetch(string $city):WeatherInfo{

      $weatherType =['cloudy', 'snowy', 'stormy', 'sunny'];

      return new WeatherInfo($city, rand(1, 270), $weatherType[array_rand($weatherType)]);
   }
}