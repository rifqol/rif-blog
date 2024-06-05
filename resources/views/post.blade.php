<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
            
            <div class="p-2">
                <x-single :title="$post->title" :slug="$post->slug" :body="$post->body" :category="$post->category" :author="$post->author" :created_at="$post->created_at->diffForHumans()" />
            </div>
        
</x-layout>
