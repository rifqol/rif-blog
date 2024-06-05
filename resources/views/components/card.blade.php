<!-- card-component.blade.php -->

@props(['title', 'body', 'category', 'author', 'created_at', 'slug'])

<div class="max-w-sm bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="px-4 py-4">
        <div class="absolute px-3 py-2 text-white bg-black bg-opacity-25">
            <a href="/posts?category={{ $category->slug }}" class="hover:underline">
                {{ $category->name }}
            </a>
        </div>
        <img src="https://source.unsplash.com/500x400/?{{ $category->name }}" alt="{{ $category->name }}" class="mx-auto mb-4 rounded-lg w-auto"></img>
        <a href="/posts/{{ $slug }}" class="hover:underline">   
            <div class="font-bold text-xl mb-2">{{ $title }}</div>
        </a>
        <small class="inline-block">
            By
            <a href="/posts?author={{ $author->username }}" class="hover:underline text-base text-gray-500">{{ $author->name }}</a> | {{ $created_at }}
        </small>
        <p class="my-4 font-light">
           {{ Str::limit($body, 50)}}
        </p>
        <a href="/posts/{{ $slug }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">Read more</a>
    </div>
</div>
