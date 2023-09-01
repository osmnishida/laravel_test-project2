<x-app-layout>
  <x-slot name="header">
    <h2>
      ユーザー個別表示
    </h2>

  </x-slot>

  <h1>
    {{ $user->name }}
  </h1>
  <p> {{$user->email}}</p>
  <p> {{$user->password}}</p>
  <a href="{{route('user.edit', $user)}}">
    <x-primary-button>
      編集
    </x-primary-button>
  </a>

  <form method="post" action="{{route('user.destroy', $user)}}">
    @csrf
    @method('delete')
    <x-primary-button class="bg-red-700 ml-2">
      削除
    </x-primary-button>
  </form>
  
</x-app-layout>