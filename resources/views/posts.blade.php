@extends('layout')

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
    {{-- <article>
        <h1>
            <a href="/post/my-first-post">my first post</a>
        </h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aut harum doloremque rerum quasi soluta possimus earum vitae placeat sequi suscipit adipisci atque incidunt animi deserunt, repudiandae illum pariatur facere?
        </p>
    </article>
    <article >
        <h1>
            <a href="/post/my-second-post">My Second post</a>
        </h1>
        <p>
            orem ipsum dolor sit amet consectetur adipisicing elit. Omnis minus ad hic quod cumque, voluptatem, quisquam repudiandae id deleniti quasi ullam totam magni magnam blanditiis iste dicta? Repellendus, minus adipisci.
            Laborum numquam accusantium perferendis ut vitae repudiandae hic libero temporibus aliquam culpa. Numquam, maxime quas ex adipisci eveniet, fuga vel, nam quae optio tempore quam eius in possimus officiis asperiores.
        </p>
    </article>
    <article>
        <h1>
            <a href="/post/my-third-post">Third post</a>
        </h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aut harum doloremque rerum quasi soluta
            possimus earum vitae placeat sequi suscipit adipisci atque incidunt animi deserunt, repudiandae illum pariatur
            facere?
        </p>
    </article> --}}
@endsection