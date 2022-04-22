<x-home>
    <div class="d-flex flex-column mx-auto">
        <h2 class="text-black-50 ">Edit post {{ $post->name }}</h2>

        {{ $post->body }}
        <form method="POST" action="/editPost/{{ $post->id }}" >
            @csrf
            @method('PATCH')
            <x-form.input name="name"  :value="old('title', $post->name)"/>
            <x-form.textarea name="body" :text="old('title', $post->name)" />
            <x-form.submit name="Edit post"/>
        </form>
    </div>
</x-home>