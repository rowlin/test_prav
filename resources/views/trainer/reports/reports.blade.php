@extends('layouts.app')

@section('headData')
@endsection

@section('wrapper')
    <section class="fon_2">
        @include('elements.headerTrainer')
        <section class="container">   <!-- ~~~  class="page" ~~~ -->
            <div class="row">
                @include('elements.navTrainer')
                <?php $count = 1 ?>
                @foreach($report as $r)
                    <div>
                        @if($r->answer == 1)
                            <a href="{{URL::asset('/reports/'.$r->user_id.'/'.$r->id)}}">Отчет №{{$count}}</a>
                            Не отвечен
                        @endif
                        @if($r->answer == 2)
                            <a href="{{URL::asset('/reports/'.$r->user_id.'/'.$r->id)}}">Отчет №{{$count}}</a>
                        @endif
                    </div>
                    <?php $count++ ?>
                @endforeach
            </div>

        </section>
    </section>
@endsection