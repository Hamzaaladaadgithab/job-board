
<x-layout :title="$pagetitle">
    <h2>comment by {{$comment->author}}</h2>
    <P>{{ $comment->content }}</P>

    @if($comment->post)
    <h3>related post</h3>

    <ul>
        <li>
            <strong> {{$comment->post->title}} </strong>
            <p>{{$comment->post->content}}</p>
            <p>Author: {{$comment->post->author>}}</p>


            <a href='{{route('blog.show' ,$comment->post->id) }}'> view full post </a>
        </li>
    </ul>
    @else
    <p> no related post </p>
    @endif

</x-layout>

