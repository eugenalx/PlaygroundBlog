@props(['name'])
<div class="col-12 d-grid">
    <textarea 
    name="{{ $name }}" 
        id="{{ $name }}"  
        class="border border-gray-200 my-3 p-2" 
        required 
        placeholder="Some text"
        rows="8">
    </textarea>
    <x-form.errors name="{{ $name }}" />
</div>