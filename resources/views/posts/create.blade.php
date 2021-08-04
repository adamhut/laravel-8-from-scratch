<x-layout>
    <x-setting heading="Publish new post" >
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" />
            <x-form.input name="slug" />

            <x-form.input name="thumbnail" type="file" />

            <x-form.textarea name="excert" />
            <x-form.textarea name="body" />

            {{-- <div class="mb-6">
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
                <input type="file" name="thumbnail" id="thumbnail" class="border broder-gray-400 p-2 w-full" required
                    value="{{ old('thumbnail') }}">
                @error('thumbnail')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    body
                </label>
                <textarea class="border broder-gray-400 p-2 w-full" name="body" id="body" required>{{ old('body') }}</textarea>
                @error('body')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror
            </div> --}}
            <x-form.field>
                <x-form.label name="category"></x-form.label>
                <select name="category_id" id="category" class="border broder-gray-400 p-2 w-full">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category') == $category->id ? "selected":"" }}">
                        {{ ucfirst($category->name) }}
                    </option>

                    @endforeach

                </select>
                <x-form.error name="category"></x-form.error>

            </x-form.field>



            <x-form.button>Publish</x-form.button>

        </form>

    </x-setting>


</x-layout>