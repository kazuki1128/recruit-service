@extends('layouts.app')

@section('content')
    @if (Auth::check())
         <h1>選考中の会社一覧</h1>
         @if(count($campanies) > 0)
             @include('campanies.index', ['campanies' => $campanies])
         @endif
          {!! link_to_route('campanies.create', '企業追加', null, ['class' => 'btn btn-primary']) !!}
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Recruit serviceへようこそ</h1>
                {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection