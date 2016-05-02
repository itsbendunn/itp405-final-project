@extends('layout')

@section('content')

    <div class="col-lg-12">
        <?php if(session('success')) :?>
        <h4 style="color: red">Review deleted</h4>
        <?php endif ?>
    @foreach($reviews as $review)
        <h4>
            Review for {{$review->place_id}}
        </h4>
        <p>
            Review Title: {{$review->review_title}}
        </p>
        <p>
            Review Text: {{$review->review_text}}
        </p>
        <p>
            Rating: {{$review->rating->rating}}
        </p>

            {!! Form::open(['url' => "/delete", 'method' => 'post']) !!}
            {!!  Form::hidden('review_id', "{$review->id}") !!}
            <br/>
            {!! Form::submit('Delete Review', array('class'=>'btn btn-danger')) !!}

            {!! Form::close() !!}

            <hr>
    @endforeach



    </div>

@endsection