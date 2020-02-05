@extends('layouts.app')

@section('content')
<div class="main-wrapper">
  <form action="{{ route('debayashi.search.index') }}" method="post">
    {{ csrf_field() }}
        <img class="logo-img" src="{{ asset('images/top/logo.svg')}}">
        <p>あの芸人の出囃子を検索しよう</p>
        <div class="search-box">
          <input id="search-keyword" type="text" name="search_keyword" class="search-text" placeholder="コンビ名で検索" required="">
          <input id="search-button" type="submit" class="search-btn" value="">
        </div>
  </form>
  <div class="comedian-wrapper">
    <div class="comedian">
      <div class="serif">
        <img src="{{ asset('images/top/serif.svg')}}">
      </div>
      <div class="male">
        <div class="male-trim">
          <img class="male-img" src="{{ asset('images/top/male.svg')}}">
        </div>
      </div>
      <div class="female">
        <div class="female-trim">
          <img class="female-img" src="{{ asset('images/top/female.svg')}}">
        </div>
      </div>
      <div class="microphone">
        <div class="trim">
          <img class="microphone-img" src="{{ asset('images/top/microphone.svg')}}">
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
