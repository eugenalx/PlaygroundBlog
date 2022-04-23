<x-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
      
        <div class="d-flex col-10 mx-auto justify-content-between align-items-center ">
            @auth
                <h3 class="col-6">Welcome, {{ auth()->user()->name }}!</h3>
            @else
                <div class="col-6">Not sign in</div>
            @endauth
            @cannot('admin')
                <x-form.button name="Create new post" target="/createPost" />
            @endcannot
        </div>
        {{ $slot }}
    </div>
</x-layout>