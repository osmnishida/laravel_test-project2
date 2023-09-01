<x-app-layout>
  @if(session('message'))
    <div class="text-red-600 font-bold">
      {{session('message')}}
    </div>
  @endif

  <form method="post" action="{{ route('user.update', $user) }}">
    @csrf
    @method('patch')
    <label for="name">name</label>
    <x-input-error :messages="$errors->get('name')" />
    <input type="text" name="name" id="name" value="{{old('name', $user->name)}}">
    <label for="email">email</label>
    <x-input-error :messages="$errors->get('email')" />
    <input type="text" name="email" id="email" value="{{old('email', $user->email)}}">
    <label for="password">password</label>
    <x-input-error :messages="$errors->get('password')" />
    <input type="text" name="password" id="password" value="{{old('password', $user->password)}}">

    <x-primary-button class="mt-4">
      送信する
    </x-primary-button>
  </form>
</x-app-layout>