@extends('layout')

@section('content')
    <div class="col-md-6">
        <?php if(session('success')) :?>
        <h4 style="color: red">Review added</h4>
        <?php endif ?>
            <?php if(session('failure')) :?>
            <h4 style="color: red">Review added</h4>
        <?php endif ?>
        <?php if(count($errors) > 0) : ?>
            <?php foreach ($errors->all() as $error) :?>
                <h4 style="color: red"><?php echo $error ?></h4>
            <?php endforeach; ?>
        <?php endif ?>
        <h4>Creating Review for {{$name}}</h4>


        {!! Form::open(['url' => "/create", 'method' => 'post']) !!}
        <?php echo csrf_field()?>
        Review Title: {!! Form::text('review_title') !!}<br/>
        Review:<br/> {!!  Form::textarea('review_text', 'Write your review here', ['size' => '70x8']) !!}
        <br/>
        Rating:  {!! Form::select('rating_id', $ratings, null, ['class' => 'form-control']) !!}
        <br/>
            {!! Form::hidden('place_id', $place_id) !!}
        {!! Form::submit('Submit!', array('class'=>'btn btn-success')) !!}

        {!! Form::close() !!}
    </div>
@endsection