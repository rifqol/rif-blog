@props(['title', 'body', 'category', 'author', 'created_at', 'slug'])

<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full md:w-8/12">
            <h2 class="mb-3 text-3xl tracking-tight font-bold text-gray-900">{{ $title }}</h2>
            <div class="mb-3">
                By
                <a href="/posts?author={{ $author->username }}" class="hover:underline text-base text-gray-500">{{ $author->name }}</a>
                in
                <a href="/posts?category={{ $category->slug }}" class="hover:underline text-base text-gray-500">{{ $category->name }}</a> | {{ $created_at }}
            </div>

            <img src="https://source.unsplash.com/1200x400/?{{ $category->name }}" alt="{{ $category->name }}" class="mx-auto mb-4 rounded-lg w-auto"></img>

            <article class="my-4 font-light text-lg">
                {{ $body }}
            </article>
            <a href="/posts/" class="inline-block font-medium text-blue-500 hover:underline">&laquo;Back to Post</a>
        </div>
    </div>
</div>
