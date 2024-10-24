@props(['name'])
@error('name')
    <p class="text-sx text-red-500 mt-1">{{$message}}</p>
@enderror
