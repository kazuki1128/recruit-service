@extends('layouts.app')

@section('content')
@if(Auth::check())
    <h1>企業詳細ページ</h1>


    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $campany->id }}</td>
        </tr>
        <tr>
            <th>企業名</th>
            <td>{{ $campany->content }}</td>
        </tr>
    </table>
    
    {!! link_to_route('campanies.edit', '編集', ['id' => $campany->id], ['class' => 'btn btn-light']) !!}
    {!! link_to_route('items.index', '選考項目一覧', ['id' => $campany->id], ['class' => 'btn btn-light']) !!}
    
    @if(Auth::id() == $campany->user_id)
        {!! Form::model($campany, ['route' => ['campanies.destroy', $campany->id], 'method' => 'delete']) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    @endif

@endif
@endsection