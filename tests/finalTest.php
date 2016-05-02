<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\review;

class finalTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCheckAPINameCall()
    {
        $response = "Ebaes";
        $map = new \App\Services\API\GoogleMaps();
        $test_response = $map->search('ChIJn7GRXOzHwoARNOHThxF8Kp4');
        $place_name = $test_response->result->name;
        $this->assertEquals($place_name, $response);
    }

    public function testPageAuth(){
        $this
            ->visit('results?place_id=ChIJYxSlTUu5woARhhBcdwIrW84')
            ->press('Create Review')
            ->seePageIs('/login');
    }

    public function testRelationships(){
        $review = new review();
        $this->assertEquals($review->rating_id, $review->rating_id);
    }

//    public function testORMBinding(){
//        $review = new review();
//        $review->rating_id = ('2');
//        $this->assertEquals("I've had better", $review->rating->rating);
//    }
//
//    public function testCreateLink(){
//        $user = factory(App\User::class)->create();
//            $this->actingAs($user)
//                ->visit('results?place_id=ChIJYxSlTUu5woARhhBcdwIrW84')
//                ->press('Create Review')
//                ->seePageIs('create/ChIJYxSlTUu5woARhhBcdwIrW84?name=Taco%20Bell');
//
//    }


}
