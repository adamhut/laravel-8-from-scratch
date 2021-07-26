<x-layout>
    <section class=" py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publish new post
        </h1>
        <x-panel class="max-w-md mx-auto">
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Title
                </label>
                <input type="text" name="title" id="title" class="border broder-gray-400 p-2 w-full" required
                    value="{{ old('title') }}">
                @error('title')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="excert" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Excert
                </label>
                <textarea
                    class="border broder-gray-400 p-2 w-full"
                    name="excert"
                    id="excert"
                    required
                >{{ old('excert') }}</textarea>
                @error('excert')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Thumbnail
                </label>
                <input
                    type="file"
                    name="thumbnail"
                    id="thumbnail"
                    class="border broder-gray-400 p-2 w-full"
                    required
                    value="{{ old('thumbnail') }}"
                >
                @error('thumbnail')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label
                    for="body"
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                >
                    body
                </label>
                <textarea class="border broder-gray-400 p-2 w-full" name="body" id="body" required>{{ old('body') }}</textarea>
                @error('body')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="category" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    category
                </label>
                <select name="category_id" id="category" class="border broder-gray-400 p-2 w-full">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category') == $category->id ? "selected":"" }}"
                        >
                        {{ ucfirst($category->name) }}
                        </option>

                    @endforeach

                </select>

                @error('category')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>

            <x-submit-button>Publish</x-submit-button>
        </form>
        </x-panel>

    </section>
</x-layout>