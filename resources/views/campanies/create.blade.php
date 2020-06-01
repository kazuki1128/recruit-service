@extends('layouts.app')

@section('content')
@if(Auth::check())
    @if (count($errors) > 0)
     <ul class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <li class="ml-4">{{ $error }}</li>
        @endforeach
     </ul>
    @endif

    <h1>選考企業追加ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($campany, ['route' => 'campanies.store']) !!}
        
                <div class="form-group">
                    {!! Form::label('content', '企業名:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
        
                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
@endif
@endsection