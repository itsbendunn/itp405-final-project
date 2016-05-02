<?php

namespace App\Services\API;

use Cache;




class GoogleMaps{
    protected $accessKey;

    public function __Construct(array $config = []){

    }

    public function search($place_id){

//        if(Cache::get($location)){
//            $location_response = Cache::get($location);
//        }
//        else{
//            $location_response = \GoogleMaps::load('geocoding')
//                ->setEndpoint('json')
//                ->setParamByKey('address', $location)
//                ->get();
//            Cache::put($location, $location_response);
//        }
//
//        $location = json_decode($location_response);
//        $lat = $location->results[0]->geometry->location->lat;
//        $lng = $location->results[0]->geometry->location->lng;
//        $latlng = $lat + ',' + $lng;
//
//        if(Cache::get($name)){
//            $text_response = Cache::get($location);
//        }
//        else{
//            $text_response = \GoogleMaps::load('textsearch')
//                ->setEndpoint('json')
//                ->setParamByKey('query', $name)
//                ->setParamByKey('location', $latlng)
//                ->setParamByKey('radius', 10000)
//                ->get();
//            Cache::put($name, $text_response);
//        }
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
