@extends('layouts.app')

@section('content')

    <h1>選考項目一覧</h1>
    <a href="{{ route('items.create', ['id' => $current_campany_id]) }}" class="btn btn-default btn-block text-light bg-primary ">
        選考項目を追加する
    </a>
    

    @if (count($items) > 0)
        <table class="table">
            <thead>
                <tr>
                <th>タイトル</th>
                <th>状態</th>
                <th>予定日</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->content }}</td>
                    <td>
                        <span class="label {{ $item->status_class }}">{{ $item->status_label }}</span>
                    </td>
                    <td>{{ $item->formatted_due_date }}</td>
                    <td><a href="{{ route('items.edit', ['id' => $item->campany_id, 'item_id' => $item->id]) }}">編集</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    
    
@endsection