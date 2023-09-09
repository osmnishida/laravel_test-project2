<x-app-layout>
  <x-slot name="header">
    <h2>
      ユーザー一覧表示
    </h2>
  </x-slot>

  <form method="post" action="{{ route('user.search') }}">
    @csrf
    <label for="searchmailaddress">メールアドレス検索</laravel>
    <input type="text: name="searchmailaddress" name="searchmailaddress" id="searchmailaddress">
    <x-primary-button class="mt-4">
      検索する
    </x-primary-button>
  </form>

  @if(session('message'))
    <div class="text-red-600 font-bold">
      {{session('message')}}
    </div>
  @endif

  @foreach($users as $user)
    <p>
      ID:{{$user->id}}
      Name:{{$user->name}}
      email:{{$user->email}}
      Password:{{$user->password}}
      $id={{$user->id}};
      <a href="{{route('user.show',$user)}}" class="text-blue-600">
        {{$user->name}}
      </a>
    </p>
  @endforeach
</x-app-layout>
