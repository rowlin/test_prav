@extends('layouts.app')
@section('headData')

@endsection

@section('wrapper')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <h2>Панель</h2>

            @foreach($allUser as $key => $user )
                <section>

                    <div id="avatar"><img src="{{ UserHelper::getAvatar($user) }}" alt="{{$user->name}}"></div>
                    <div id="name">{{ UserHelper::getFullName($user) }}</div>
                    <div id="many">
                    {{ $user->pay }}
                     </div><!--many-->
                    <div id="status">
                        @if($key == 0)
                            <span>Первое место</span>
                        @elseif( $key == 1 )
                            <span>Второе место</span>
                        @elseif($key == 2)
                            <span>Третье место</span>
                        @endif
                    </div><!--status-->
                </section>
            @endforeach

            </div><!--col-->
      </div><!--row-->
    </div><!--container-->
@endsection
