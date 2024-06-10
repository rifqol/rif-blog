<x-dashboard>
    <x-slot name="title">{{ $title }}</x-slot>

    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full md:w-8/12">
                <h2 class="mb-3 text-3xl tracking-tight font-bold text-gray-900">{{ $post->title }}</h2>

                <a href ="/dashboard/posts" class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-2 rounded">Back to Posts</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="bg-yellow-500 text-white hover:text-yellow-900 inline-block py-1 px-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 3H6a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V9l-5-5z"></path>
                        <path d="M15 3v6a2 2 0 002 2h6"></path>
                        <path d="M10 18l2 2 4-4"></path>
                    </svg>
                </a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="inline-block">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="bg-red-500 text-white hover:text-red-900 font-bold py-1 px-2 rounded"
                        onclick="return confirm('are you sure?')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6V4a2 2 0 00-2-2H7a2 2 0 00-2 2v2"></path>
                            <line x1="6" y1="11" x2="6" y2="20"></line>
                            <line x1="10" y1="11" x2="10" y2="20"></line>
                            <line x1="14" y1="11" x2="14" y2="20"></line>
                            <line x1="18" y1="11" x2="18" y2="20"></line>                                    
                        </svg>
                                                       
                    </button>
                </form>

                @if ($post->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="mx-auto mb-4 rounded-lg w-auto"></img>
                </div>
                @else
                    
                <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="mx-auto mb-4 rounded-lg w-auto"></img>
    
                @endif

                <article class="my-4 font-light text-lg">
                    {{ $post->body }}
                </article>
            </div>
        </div>
    </div>

</x-dashboard>
