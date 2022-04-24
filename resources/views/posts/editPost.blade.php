<x-posts>
    <div class="d-flex flex-column mx-auto">
        <h2 class="text-black-50 ">Edit post {{ $post->name }}</h2>
        <form method="POST" action="/editPost/{{ $post->id }}" >
            @csrf
            @method('PATCH')
            <x-form.input name="name"  :value="old('name', $post->name)"/>
            <x-form.textarea name="body" placeholder=""  :text="old('body', $post->body)" />
            <x-form.submit name="Edit post"/>
        </form>
    </div>
</x-posts>