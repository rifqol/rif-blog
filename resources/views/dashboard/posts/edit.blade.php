<x-dashboard>
    <x-slot name="title">{{ $title }}</x-slot>

    <form method="POST" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                <div class="sm:col-span-4">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Title</label>
                    <input type="text" name="title" id="title" autocomplete="title" class="block flex-1 border-0 bg-white py-1.5 pl-1 text-gray-900 rounded placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                    placeholder="Input your title" required autofocus value="{{ old('title', $post->title) }}" @error('title') is-invalid @enderror>
                    @error('title')
                        <div class="invalid-feedback text-red-500 mt-2 text-sm">
                            {{ $message }}    
                        </div>
                    @enderror
                </div>

                <div class="sm:col-span-4">
                    <label for="slug" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Slug</label>
                    <input type="text" name="slug" id="slug" autocomplete="slug" class="block flex-1 border-0 bg-white py-1.5 pl-1 text-gray-900 rounded placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="{{ old('slug', $post->slug) }}" readonly>
                </div>
                 
                <div class="sm:col-span-4">
                    <label for="category" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Category</label>
                    <select name="category_id" autocomplete="category" class="block flex-1 border-0 bg-white py-1.5 pl-1 text-gray-900 rounded placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                        @foreach ($categories as $category )
                            @if (old('category_id', $post->category_id) == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
      
                <div class="col-span-3">
                    <label for="image" class="form-label">Upload a file</label>
                    <input type="hidden" name="oldImage" value="{{ $post->image }}">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif

                    
                    <input id="image" name="image" type="file" onchange="previewImage()" >
                </div> 

                <div class="col-span-full">
                    <label for="body" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Body</label>
                    @error('body')
                        <p class="text-red-500 mb-2" >{{ $message }}</p>                           
                    @enderror
                    <input id="body" name="body" type="hidden" value="{{ old('body', $post->body) }}">
                    <trix-editor input="body"></trix-editor>
                </div>
            </div>
          </div>
        </div>

        
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit" class="rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </div>
      </form>

      <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
    
        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
    
            imgPreview.style.display = 'block';
    
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
    
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
    
</x-dashboard>