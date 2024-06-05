<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <x-search />

    <div class="container mx-auto">
        <div class="flex flex-wrap -mx-2">
            @foreach ($categories as $category)
                <div class="w-full sm:w-1/2 md:w-1/3 p-2">
                    <a href="/posts?category={{ $category->slug}}">
                        <div class="relative bg-black text-white">
                            <img src="https://source.unsplash.com/500x500/?{{ $category->name }}" class="w-full h-full object-cover" alt="{{ $category->name }}">
                            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
                                <h5 class="text-center p-4 text-lg flex-auto" style="background-color: rgba(0,0,0,0.3)">{{ $category->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
