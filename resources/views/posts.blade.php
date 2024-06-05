<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <x-search />

    <div class="flex flex-wrap justify-between">
        @foreach($posts as $post)
         @if ($post)    
            <div class="p-2">
                <x-card :title="$post->title" :slug="$post->slug" :body="$post->body" :category="$post->category" :author="$post->author" :created_at="$post->created_at->diffForHumans()" />
            </div>
        @endif
        @endforeach
    </div>

    {{ $posts->links() }}
</x-layout>