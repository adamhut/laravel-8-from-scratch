{{-- @extends('layout')

@section('banner')
    My Blog
@endsection


@section('content')
    

    @foreach($posts as $post)
        <article class="{{$loop->even ? 'mb-6' :''}}">
            <h1>
                <a href="/post/{{ $post->slug }}">
                {{ $post->title }}
                </a>
            </h1>
            <div>
                {{ $post->excerpt }}..。
            </div>
        </article>

    @endforeach
@endsection --}}

<x-layout>
<x-slot name="header">
        My Blog in Component
    </x-slot>
    <x-slot name="content">
        @foreach($posts as $post)
        <article class="{{$loop->even ? 'mb-6' :''}}">
            <h1>
                <a href="/post/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>
            <p>
                By <a href="#">{{$post->user->name}}</a> in<a href="/categories/{{ $post->category->slug }}">{{$post->category->name}}</a>
            </p>
            <div>
                {{ $post->excerpt }}..。
            </div>
        </article>
        
        @endforeach
    </x-slot>
</x-layout>