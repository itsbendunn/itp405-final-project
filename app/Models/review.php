<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
//    public function __construct($data){
//        $this->review_title = $data['review_title'];
//        $this->review_text = $data['review_text'];
//        $this->user_id = $data['user_id'];
//        $this->rating_id = $data['rating_id'];
//        $this->place_id = $data['place_id'];
////        $this->restaurant_id = $data['restaurant_id'];
////        $this->user_id = $data['user_id'];
////        $this->poison = $data['poison'];
//
//    }
//
//    public function save(){
//        DB::table('reviews')->insert([
//            'review_title' => $this->review_title,
//            'review_text' => $this->review_text,
//            'user_id' => $this->user_id,
//            'rating_id' => $this->rating_id,
//            'place_id' => $this->place_id,
////            'restaurant_id' => $this->restaurant_id,
////            'user_id' => $this->user_id,
////            'poison' => $this->poison
//        ]);
//    }
//
//    public static function all(){
//        return DB::table('reviews')
//            ->orderBy('review_title')
//            ->get();
//    }

    public function rating(){
        return $this->belongsTo('App\Models\rating');
    }


}
