@extends('layouts.app')

@section('content')

<div class="top-page-wrapper">
  <div class="top-form-group top-animation">
    <img class="logo-img" src="{{ asset('images/top/logo.svg')}}">
    <p class="font-white">あの芸人の出囃子を検索しよう</p>
    <!-- form -->
    <form action="{{ route('debayashi.search') }}" method="post">
      {{ csrf_field() }}
          <div class="search-box">
            <input id="search-keyword" type="text" name="search_keyword" class="search-text outline-none" placeholder="コンビ名で検索" required="">
            <button id="search-button" type="submit" class="search-btn outline-none">
              <i class="fas fa-search"></i>
            </button>
          </div>
    </form>
    <!-- form -->
  </div>
  <div class="comedian-wrapper">
    <div class="comedian">
      <div class="center-pos">
        <div class="serif top-animation" id="animation-item-last">
          <img class="serif-img" src="{{ asset('images/top/serif.svg')}}">
        </div>
        <div class="male">
          <div class="male-trim">
            <img class="male-img top-animation" src="{{ asset('images/top/male.svg')}}">
          </div>
        </div>
        <div class="female">
          <div class="female-trim">
            <img class="female-img top-animation" src="{{ asset('images/top/female.svg')}}">
          </div>
        </div>
        <div class="microphone">
          <div class="microphone-trim">
            <img class="microphone-img top-animation" src="{{ asset('images/top/microphone.svg')}}">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')
  <script src="{{ asset('/js/functionsLib.js') }}"></script>
  <script>
    window.onload = function(){
        // Cookie名の存在チェック
        var cookieValue = "{{ \Cookie::get($cookieName) }}"

        if (cookieValue) {
            // top-animationとクラス名がついているelementを取得
            var animationItems = document.getElementsByClassName('top-animation');

            var itemArray = Array.prototype.slice.call(animationItems);
            // top-animationのclassを削除
            itemArray.forEach(item => {
                item.classList.remove('top-animation');
            });
            // フッター表示
            FunctionsLib.displayFooter();
        } else {
            // フッター表示
            FunctionsLib.displayFooter('', 'animation-item-last');
        }

    }
  </script>
@endsection
