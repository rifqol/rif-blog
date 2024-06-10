<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-search />

<div class="flex justify-center flex-col">
    <section class="bg-white shadow-lg rounded-lg text-center border border-gray-200 mb-8">
        <?php $latePost = $posts->first(); ?>
        @if ($latePost->image)
        <div style="max-height: 350px; overflow:hidden">
            <img src="{{ asset('storage/' . $latePost->image) }}" alt="{{ $latePost->image }}" class="mx-auto mb-4 rounded-lg w-auto"></img>
        </div>
        @else
            
        <img src="https://source.unsplash.com/1200x400/?{{ $latePost->category->name }}" alt="{{ $latePost->category->name }}" class="mx-auto mb-4 rounded-lg w-auto"></img>

        @endif
       
        <div class="max-w-7xl mx-auto ">
         <a href="/posts/{{ $latePost->slug }}" class="hover:underline">
          <h1 class="text-4xl font-bold text-gray-900">{{ $latePost->title }}</h1>
         </a>
          <small>
            By
            <a href="/posts?author={{ $latePost->author->username }}" class="hover:underline text-base text-gray-500">{{ $latePost->author->name }}</a>
            in
            <a href="/posts?category={{ $latePost->category->slug }}" class="hover:underline text-base text-gray-500">{{ $latePost->category->name }}</a> | {{ $latePost->created_at->diffForHumans() }}
          </small>
          <p class="mt-4 text-lg text-gray-500">{{ $latePost->body }}</p>
          <a href="/posts/{{ $latePost->slug }}" class="font-medium text-blue-500 hover:underline ">Read more</a>
        </div>
    </section>

    <div class="flex flex-wrap justify-between">
        @foreach($posts as $post)
         @if ($post != $latePost )    
            <div class="p-2">
                <x-card :title="$post->title" :image="$post->image" :slug="$post->slug" :body="$post->body" :category="$post->category" :author="$post->author" :created_at="$post->created_at->diffForHumans()" />
            </div>
        @endif
        @endforeach
    </div>
</div>
{{ $posts->links() }}
</x-layout>
