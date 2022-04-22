<x-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
      
        <div class="d-flex col-10 mx-auto justify-content-between align-items-center ">
            @auth
                <div class="col-6">Welcome, {{ auth()->user()->name }}!</div>
            @else
                <div class="col-6">Not sign in</div>
            @endauth
            <x-form.button name="Create new post" target="/createPost" />
        </div>

        <div class="d-flex col-10 mx-auto mt-3">
            <div class="col-3 d-flex flex-column">
                <a href="/">Home</a>
                <a href="/showPost/{{ auth()->user()->id }}">My posts </a>
            </div>
                <div class="col-9">
                    @foreach ($posts as $post)
                        <div class="my-3">
                            <h1 class="col-9">{{ $post->name}}</h1>
                            <h6 class="col-9 text-black-50  border-bottom">Author: {{ $post->user->name }}</h6>
                            <div class="col-9">{{ $post->body}}</div>
                        </div>
                    @endforeach
            </div>
        </div> 
    </div>
</x-layout>