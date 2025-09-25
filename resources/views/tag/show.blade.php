
<x-layout :title="$pagetitle">
    <h2>tag by {{$tag->title}}</h2>



    <h3>related post</h3>

    <ul>
        @forelse ($tag->posts as $post )

            <li>
            <strong> {{$post->title}} </strong>
            <p>Author: {{$post->author>}}</p>


            <a href='{{route('blog.show' ,$post->id) }}'> view full post </a>
        </li>

        @empty
    <p> no related post </p>
        @endforelse
    </ul>

</x-layout>

