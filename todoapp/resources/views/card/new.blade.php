@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

  <!-- リスト作成フォーム -->
  <form action="{{ url('cards')}}" method="POST" class="form-horizontal">
  {{csrf_field()}} 
    <div class="form-group">
      <div class="col-sm-6">
        <label for="card">タイトル</label>
        <input type="text" name="card_name" class="form-control" placeholder="カード名" value="{{ old('card_name') }}">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6">
        <label for="memo">メモ</label>
        <textarea type="text" name="card_memo" class="form-control" placeholder="詳細" value="{{ old('card_memo') }}"></textarea>
      </div>
      <input type="hidden" name="id" value="{{ old('id', $listing_id) }}"> 
    </div>
    <div class="form-group"> 
      <div class="col-sm-6"> 
        <button type="submit" class="btn btn-success"> 作成する </button> 
      </div>
    </div>
  </form>
</div> 
@endsection