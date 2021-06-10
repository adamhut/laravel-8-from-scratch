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
    {{-- <x-slot name="header">
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
                By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/categories/{{ $post->category->slug }}">{{$post->category->name}}</a>
            </p>
            <div>
                {{ $post->excerpt }}..。
            </div>
        </article>
        
        @endforeach
    </x-slot> --}}

    @include('_post-header')
    
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-post-featured-card></x-post-featured-card>
    
        <div class="lg:grid lg:grid-cols-2">
            <x-post-card></x-post-card>
            <x-post-card></x-post-card>
            
        </div>
    
        <div class="lg:grid lg:grid-cols-3">
            <x-post-card></x-post-card>
            <x-post-card></x-post-card>
            <x-post-card></x-post-card>
    
          
        </div>
    </main>
</x-layout>