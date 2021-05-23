{{-- @extends('layout')


@section('banner')
 My single Blog
@endsection

@section('content')
    <article>
        <h1>
            {{ $post->title }}
        </h1>
        <div>
            {!! $post->body !!}
        </div>
            
    </article>

    <a href="/">Go Back</a>

@endsection --}}

<x-layout>
    <x-slot name="header">
        My Blog in Component
    </x-slot>
    <x-slot name="content">
        <article>
            <h1>
                {{ $post->title }}
                  
            </h1>

            <p>
                By <a href="#">{{}}</a> in
                <a href="/categories/{{ $post->category->slug }}">
                    {{$post->category->name}}
                </a>
            </p>
            
            <div>
                {!! $post->body !!}
            </div>
        
        </article>
        
        <a href="/">Go Back</a>
    </x-slot>
</x-layout>
