<x-home>
    <div class=" d-flex flex-column mx-auto">
        <h2 class="text-black-50 ">Create new post</h2>
        <form method="POST" action="/createPost" >
            @csrf
            <x-form.input name="name" />
            <x-form.textarea name="body" text="Write something"/>
            <x-form.submit name="Create Post" />
        </form>
    </div>
</x-home>