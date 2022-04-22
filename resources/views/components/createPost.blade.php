<x-layout>
    <div class=" col-5 d-flex flex-column mx-auto">
        <h2 class="text-black-50 ">Create new post</h2>
        <form method="POST" action="/storePost" >
            @csrf
            <x-form.input name="name" />
            <x-form.textarea name="body" />
            <x-form.submit name="Create Post"/>
        </form>
    </div>
</x-layout>