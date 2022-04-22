@props(['name'])

<div class="col-12 d-grid">
    <input class="border border-gray-200  my-3 p-2"
            type="text" 
            name="{{ $name }}" 
            id="{{ $name }}" 
            required 
            placeholder="Post Title"
            {{ $attributes (['value' => old($name)]) }}
    >
    
    <x-form.errors name="{{ $name }}" />
</div>

