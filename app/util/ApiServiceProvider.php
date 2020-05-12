<?php

namespace App\Util;
use GuzzleHttp\Client;

class ApiServiceProvider {

  public static function getWatches(){
    $baseUrl = "http://mrwatch.tk/api/sportWatches";

    $client = new Client();
    $response = $client->get($baseUrl);
    $data = [];

    if($response->getStatusCode() == 200){
      $body = json_decode($response->getBody());
      $data["items"] = $body;
      $data["status"] = 1;
      return $data;
    } else{
      $data["status"] = 0;
      return $data;
    }
  }


  public static function getCovid19Data(){
    $baseUrl = "https://api.covid19api.com/live/country/colombia";

    $client = new Client();
    $response = $client->get($baseUrl);
    if($response->getStatusCode() == 200){
      $body = json_decode($response->getBody());
      $data["response"] = last($body);
      $data["status"] = 1;
      return $data;
    } else{
      $data["status"] = 0;
      return $data;

    }


  }

}
