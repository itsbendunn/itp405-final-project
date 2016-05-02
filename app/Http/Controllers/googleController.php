<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Services\API\GoogleMaps;


class googleController extends Controller
{

    public function search(Request $request){


        return view('/search', [
//            'name' => $request->name,
//            'location' => $request->location,
        ]);
    }

    public function results(Request $request){
        $GoogleMaps = new GoogleMaps([]);

//        $name = $request->input('name');
//        $location = $request->input('location');
        $place_id = $request->input('place_id');

        $results = $GoogleMaps->search($place_id);

        if(empty($results->result->reviews)){
            return redirect::back()
                ->withErrors(['msg', 'No Reviews Found']);
        }

        $wordCounter = 0;
        foreach($results->result->reviews as $review){
//            $temp = substr_count($review->text, '');
//            $wordCounter+= $temp;
            if(preg_match('[poisoning|diarrhea|vomit|vomiting|barf|barfing|contaminated]', $review->text)){
                $wordCounter +=1;
            }
        }


//        $map = new Mapper(view());

//        Mapper::map(53.381128999999990000, -1.470085000000040000);

//        (new Mapper)->map(53.381128999999990000, -1.470085000000040000, ['zoom' => 15, 'center' => false, 'marker' => false, 'type' => 'HYBRID', 'overlay' => 'TRAFFIC']);
//
            return view('/results',[
            'result' => $results,
            'counter' => $wordCounter
        ]);
    }

    public function about(){
        return view('/about');
    }



}



//dunnb
//iambread
//Let users write their own reviews