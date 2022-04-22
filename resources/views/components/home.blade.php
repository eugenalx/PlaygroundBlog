<x-homepage>
    <div class="d-flex offset-1 col-10 mt-3">
        <div class="col-3 d-flex flex-column">
            <a class="btn btn-white col-6 my-2 border" href="/">Home</a>
            <a class="btn btn-white col-6 my-2 border" href="/showPost/{{ auth()->user()->id }}">My posts </a>
        </div>
        <div class="col-9">
            {{ $slot }}
        </div>
    </div>
</x-homepage>