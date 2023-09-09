メールアドレス（ユーザー）検索結果
{{--
{{$searchusers->email}}
--}}

{{-- {{$email}} --}}
{{-- {{$searchusers}} --}}
<br>

{{--
@php
var_dump($searchusers);
@endphp
<br>
--}}

@if(isset($searchusers))
    @foreach($searchusers as $searchuser)
      <p>
        ID:{{$searchuser->id}}
        name:{{$searchuser->name}}
        email:{{$searchuser->email}}
      </p>
    @endforeach
@endif