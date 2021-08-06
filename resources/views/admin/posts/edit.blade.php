<x-layout>
    <x-setting :heading="'Edit Post :'.$post->title  ">
        <form action="{{route('admin.post.update',$post)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="$post->title"/>
            <x-form.input name="slug" value="{{$post->slug}}" />

            <div class=" flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file"  :value="$post->thumbnail" />
                </div>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-2 w-24">
            </div>
            <x-form.textarea name="excerpt">{{$post->excerpt}}</x-form.textarea>
            <x-form.textarea name="body">{{$post->body}}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category"></x-form.label>
                <select name="category_id" id="category" class="border broder-gray-400 p-2 w-full">
                    @foreach($categories as $category)

                    <option value="{{ $category->id }}" {{ old('category',$post->category_id) == $category->id ? "selected":"" }}">
                        {{ ucfirst($category->name) }}
                    </option>

                    @endforeach

                </select>
                <x-form.error name="category"></x-form.error>

            </x-form.field>



            <x-form.button>Update</x-form.button>

        </form>

    </x-setting>


</x-layout>