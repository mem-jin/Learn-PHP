@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="inner-wrapper">
        <h3>タイトル</h3>
        <p>{{ $card->title }}</p>
    </div>
  </div>
  
  <div class="row">
    <div class="inner-wrapper">
      <h3>メモ</label>
      <p>{{ $card->memo }}</p>
    </div>
  </div>
  
  <div class="row">
    <div class="inner-wrapper">
      <h3>リスト名</label>
      <p>{{ $listing->title }}</p>
    </div>
  </div>
  
  <div class="row">
    <div class="card_action text-center">
      <a class="btn btn-primary" href="{{ url('/cardedit', $card->id) }}">編集する</a>
      <a class="btn btn-outline-danger" onclick="return confirm('{{ $card->title }}を削除して大丈夫ですか？')" href="{{ url('/carddelete', $card->id) }}">削除する</a>
    </div>
  </div>
</div>
@endsection

