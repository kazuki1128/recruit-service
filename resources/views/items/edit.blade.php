@extends('layouts.app')

@section('content')

    <h1>{{ $item->content }} のメッセージ編集ページ</h1>

    <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form
                action="{{ route('items.edit', ['id' => $item->campany_id, 'item_id' => $item->id]) }}"
                method="POST"
            >
              {{ csrf_field() }}
              <div class="form-group">
                <label for="content">選考状況</label>
                <input type="text" class="form-control" name="content" id="content"/>
              </div>
              <div class="form-group">
                <label for="status">状態</label>
                <select name="status" id="status" class="form-control">
                  @foreach(\App\Item::STATUS as $key => $val)
                    <option
                        value="{{ $key }}"
                        {{ $key == old('status', $item->status) ? 'selected' : '' }}
                    >
                      {{ $val['label'] }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="due_date">予定日</label>
                <input type="text" class="form-control" name="due_date" id="due_date"
                       value="{{ old('due_date') ?? $item->formatted_due_date }}" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>

@endsection