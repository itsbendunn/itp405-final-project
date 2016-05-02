<?php

namespace App\Http\Controllers;
use App\Models\rating;
use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Services\API\GoogleMaps;


use App\Http\Requests;

class databaseController extends Controller{


    public function create($place_id, Request $request){
        $name = $request->input('name');
        $ratings = rating::pluck('rating', 'id');
        return view('/create',
            [
                'place_id' => $place_id,
                'name' => $name,
                'ratings' => $ratings
            ]);
    }

    public function store(Request $request){

        $validation = Validator::make($request->all(),[
            'review_title' => 'required|string|min:2',
            'review_text' => 'required'
        ]);

        if($validation->fails()){
            return redirect::back()
                ->withInput()
                ->withErrors($validation);
        }

        $review = new review();
        $review->review_title = $request->input('review_title');
        $review->review_text = $request->input('review_text');
        $review->user_id = Auth::id();
        $review->rating_id = $request->input('rating_id');
        $review->place_id = $request->input('place_id');
        $review->save();

        return redirect::back()
            ->with('success', true);
    }

    public function view(){
        $GoogleMaps = new GoogleMaps([]);

        $all_reviews = review::with('rating')->get();
        $review_holder = [];
        foreach($all_reviews as $reviews){
            if($reviews->user_id == Auth::id()){
                $temp_place = $GoogleMaps->search($reviews->place_id);
                $reviews->place_id = $temp_place->result->name;
                $review_holder[] = $reviews;
            }
        }
        return view('/view', [
            'reviews' => $review_holder
        ]);
    }


    public function delete(Request $request){
        $id = $request->input('review_id');
        review::where('id', '=', $id)->delete();

        return redirect::back()
            ->with('success', true);
    }
}