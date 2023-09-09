<x-app-layout>
  <form method="post" action="{{ route('editprofile.update', $user) }}">
    @csrf
    @method('patch')
    <label for="name" >name</label>
    <x-input-error :messages="$errors->get('name')" />
    <input type="text" nae="name" id="name" value="{{old('name', $user->name)}}">

    <x-primary-button class="mt-4">
      送信する
    </x-primary-button>
  </form>
</x-app-layout>