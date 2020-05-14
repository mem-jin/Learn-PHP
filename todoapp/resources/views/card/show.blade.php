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
      <button type="button" class="btn btn-primary"> 編集する </button>
      <button type="button" class="btn btn-link" onclick="return confirm('{{ $card->title }}を削除して大丈夫ですか？')" href="{{ url('/cardsdelete', $card->listing_id) }}"> 削除する </button>
    </div>
  </div>
</div>
@endsection

