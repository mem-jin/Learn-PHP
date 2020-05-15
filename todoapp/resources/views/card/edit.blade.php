@extends('layouts.app')
@section('content')
<div class="panel-body">
  <!-- バリデーションエラーの場合に表示 --> 
  @include('common.errors')
  <form action="{{ url('/card/edit')}}" method="POST" class="form-horizontal">
    {{csrf_field()}} 
      <div class="form-group"> 
        <label for="card" class="col-sm-3 control-label">カード名</label> 
        <div class="col-sm-6"> 
          <input type="text" name="card_name" value="{{ old('card_name', $card->title) }}" class="form-control"> 
        </div>
      </div>
      
      <div class="form-group"> 
        <label for="card" class="col-sm-3 control-label">メモ</label> 
        <div class="col-sm-6"> 
          <input type="text" name="card_memo" value="{{ old('card_memo', $card->memo) }}" class="form-control"> 
        </div>
        <input type="hidden" name="id" value="{{ old('id', $card->id) }}"> 
      </div>
      
      <div class="form-group"> 
        <label for="listing" class="col-sm-3 control-label">リスト名</label> 
        <div class="col-sm-6"> 
          <select name="listing_id" class="form-control">
            @foreach ($listings as $listing)
              @if ($listing->id !== $card->listing_id)
                <option value="{{$listing->id}}">{{$listing->title}}</option>
              @else
                <option value="{{$listing->id}}" selected>{{$listing->title}}</option>
              @endif
            @endforeach
          </select>  
        </div>
        <input type="hidden" name="card_id" value="{{ old('id', $card->id) }}"> 
      </div>
      
      <div class="form-group"> 
        <div class="col-sm-offset-3 col-sm-6"> 
          <button type="submit" class="btn btn-default">
            <i class="glyphicon glyphicon-saved"></i> 更新
          </button> 
        </div>
      </div>
    </form>
</div>
@endsection
