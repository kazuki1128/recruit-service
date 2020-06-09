@extends('layouts.app')

@section('content')

    <h1>選考項目新規作成ページ</h1>

    @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
    @endif
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
            <form action="{{ route('items.create', ['id' => $campany_id]) }}" method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="content">選考状況</label>
                <input type="text" class="form-control" name="content" id="content" value="{{ old('content') }}" />
              </div>
              <div class="form-group">
                <label for="due_date">予定日</label>
                <input type="text" class="form-control" name="due_date" id="due_date" value="{{ old('due_date') }}" />
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