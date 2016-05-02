<?php

namespace App\Services\API;

use Cache;


class GoogleMaps{
    protected $accessKey;

    public function __Construct(array $config = []){

    }

    public function search($place_id){

        if(Cache::get($place_id)){
            $place_response = Cache::get($place_id);
//            echo $place_response. " from cache";
        }
        else{
            $place_response = \GoogleMaps::load('placedetails')
                ->setEndpoint('json')
                ->setParamByKey('placeid', $place_id)
                ->get();
//            echo $place_response. " not from cache";
            Cache::put($place_id, $place_response, 45);

        }

        $result = json_decode($place_response);
        return $result;

    }



}
