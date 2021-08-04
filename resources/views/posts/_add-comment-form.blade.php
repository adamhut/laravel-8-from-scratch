@auth
<x-panel>

    <form action="{{route('post-comments.store',$post)}}" method="POST">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->user()->id }}" alt="dummy avatart" style="width:40px"
                class="rounded-xl">
            <h2 class="ml-3">Want to participate!</h2>
        </header>
        <div class="mt-6">
            <textarea name="body" cols="30" rows="5" required class="w-full text-sm focus:outline-none focus:ring"
                placeholder="Quick! think of something to say!"></textarea>
            @error('body')
            <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
            <div class="flex justify-end border-t border-gray-200 pt-6 mt-8">
                <x-form.button>Post</x-form.button>
            </div>
        </div>
    </form>
</x-panel>
@else
<p class="font-semibold">
    <a href="/register" class="hover:underline">Register </a> or <a href="/login" class="hover:underline">Log in </a>to
    leave a comment
</p>
@endauth