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
        ]);
    }

    public function results(Request $request){
        $GoogleMaps = new GoogleMaps([]);
        $place_id = $request->input('place_id');

        $results = $GoogleMaps->search($place_id);

        if(empty($results->result->reviews)){
            return redirect::back()
                ->withErrors(['msg', 'No Reviews Found']);
        }

        $wordCounter = 0;
        foreach($results->result->reviews as $review){
            if(preg_match('[poisoning|diarrhea|vomit|vomiting|barf|barfing|contaminated]', $review->text)){
                $wordCounter +=1;
            }
        }
            return view('/results',[
            'result' => $results,
            'counter' => $wordCounter
        ]);
    }

    public function about(){
        return view('/about');
    }



}
