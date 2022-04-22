<x-home>
    @foreach ($posts as $post)
            <div class="my-3">
                <h1 class="col-9">{{ $post->name }}</h1>
                <h6 class="col-9 text-black-50  border-bottom">Author: {{ $post->user->name }}</h6>
                <div class="col-9">{{ $post->body}}</div>
            </div>
            <div class="col-9 d-flex justify-content-end">
                <form class="m-0" method="POST" action="/deletePost/{{ $post->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-primary" onclick="return confirm('Sure Want Delete?')">Delete</button>
                </form>
                <a href="/editPost/{{ $post->id }}" class="btn btn-primary ms-2 px-4 py-1">Edit</a>
            </div>
        @endforeach
</x-home>