@props(['name', 'text', 'placeholder'])
<div class="col-12 d-grid">
    <textarea 
        name="{{ $name }}" 
        id="{{ $name }}"  
        class="border border-gray-200 my-3 p-2" 
        required 
        rows="8"
        placeholder="{{ $placeholder  }}"
        {{ $attributes (['value' => old($name)]) }}
        >{{ $text }}</textarea>
    <x-form.errors name="{{ $name }}" />
</div>