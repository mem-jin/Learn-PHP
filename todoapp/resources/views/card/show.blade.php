@extends('layouts.app')
@section('content')

<div class="cardWrapper">
  <div class="card_title">
    <h3>タイトル</h3>
    <h2>{{ $card->title }}</h2>
      
    <h3>メモ</h3>
    <h2>{{ $card->memo }}</h2>
    
    <h3>リスト名</h3>
    <h2>{{ $listing->title }}</h2>
    
    <div class="card_action">
      <a href="{{ url('/cardedit', $card->id) }}">編集する</a>
      <a onclick="return confirm('{{ $card->title }}を削除して大丈夫ですか？')" href="{{ url('/carddelete', $card->id) }}">削除する</a>
    </div>
  </div>
</div>
@endsection

