@extends('layouts.app')

@section('headData')
@endsection
<?php ?>
@section('wrapper')
    <section class="fon_2">
        @include('elements.headerTrainer')
        <section class="container">   <!-- ~~~  class="page" ~~~ -->
            <div class="row">
                @include('elements.navTrainer')
                <h1>Анкеты по питанию</h1>
                <?php $count=1 ?>
                @foreach($food as $f)
                    <div>
                        <p>№{{$count}}</p>
                        <a href="{{URL::asset('/food/'.$f->id)}}">Анкета {{$f->name}} {{$f->surname}}</a>
                    </div>
                    <?php $count++ ?>
                @endforeach
            </div>
        </section>
    </section>

@endsection