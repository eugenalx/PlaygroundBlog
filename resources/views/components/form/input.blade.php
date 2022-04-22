@props(['name'])

<div class="col-12 d-grid">
    <input type="text" name="{{ $name }}" id="{{ $name }}"  class="border border-gray-200  my-3 p-2" required placeholder="Post Title">
    
    <x-form.errors name="{{ $name }}" />
</div>

