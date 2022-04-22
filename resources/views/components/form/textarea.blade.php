@props(['name', 'text'])
<div class="col-12 d-grid">
    <textarea 
        name="{{ $name }}" 
        id="{{ $name }}"  
        class="border border-gray-200 my-3 p-2" 
        required 
        rows="8"
        {{ $attributes (['value' => old($name)]) }}
        >{{ $text }}
    </textarea>
    <x-form.errors name="{{ $name }}" />
</div>