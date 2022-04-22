<x-homepage>
    <div class="d-flex col-10 mx-auto mt-3">
        <div class="col-3 d-flex flex-column">
            <a class="btn btn-outline-danger col-6 my-2" href="/">All Posts</a>
            <a class="btn btn-outline-danger col-6 my-2" href="/showPost/{{ auth()->user()->id }}">My posts </a>
        </div>
        <div class="col-9">
            {{ $slot }}
        </div>
    </div>
</x-homepage>