<x-dashboard>
    <x-slot name="title">{{ $title }}</x-slot>

    @if (session()->has('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
        {{ session('success') }}
    </div> 
    @endif

    <div class="overflow-x w-full mt-3">
        <div my-6 mt-6 mb-6 ml-6>
            <a href="/dashboard/posts/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-6">Create Post</a>
        </div>
        
        <table class="min-w-full mt-6 bg-white">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($posts as $post)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $post->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $post->category->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="/dashboard/posts/{{ $post->slug }}" class="text-blue-600 hover:text-blue-900 inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                <path d="M12 2L12 12 14 10"></path>
                            </svg>
                        </a>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-yellow-600 hover:text-yellow-900 inline-block ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 3H6a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V9l-5-5z"></path>
                                <path d="M15 3v6a2 2 0 002 2h6"></path>
                                <path d="M10 18l2 2 4-4"></path>
                            </svg>
                        </a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="inline-block ml-2">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-900"
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
                    </td>                 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard>
