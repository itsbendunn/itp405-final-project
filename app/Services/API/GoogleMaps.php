<?php


namespace App\Services\API;

class GoogleMaps{
    protected $accessKey;

    public function __Construct(array $config = []){

    }

    public function search($searchTerm){
        $response = \GoogleMaps::load('geocoding')
            ->setEndpoint('json')
            ->setParamByKey('address', $searchTerm)
            ->get();
        $result = json_decode($response);
        return $result;
    }


}