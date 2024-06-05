<form action="/posts">
    @if (request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">
    @endif
    @if (request('author'))
    <input type="hidden" name="author" value="{{ request('author') }}">
@endif
    <div class="flex items-center justify-center mb-6 col-span-8 space-x-2">
        <input type="text" placeholder="Search..." class="w-2/5 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" name="search" value="{{ request('search') }}">
        <button class="btn btn-danger inline-block bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md" type="submit">Search</button>
    </div>
</form>