<x-layout :title="$pagetitle">



    @if (session('success'))
        <div class=" bg-green-500 text-white font-bold rounded-t px-4 py-2">
            {{ session('success') }}
        </div>

    @endif

    @if (session('fail'))
        <div class=" bg-red-500 text-white font-bold rounded-t px-4 py-2">
            {{ session('success') }}
        </div>

    @endif

@if(auth()->user()->role=='admin'||auth()->user()->role=='editor')
    <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/blog/create"
    class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white
    focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Create</a>
</div>
@endif



    @foreach($posts as $post)
    <div class="flex justify-between items-center border border-gray-300 px-4 py-6 my-2 ">

        <div>
        <h1 class='text-2xl' > <a href="/blog/{{$post->id}}">{{ $post->title }}</a> </h1>

        <p class='text-3xl' >{{$post->user->name}}</p>
        </div>

        <div>


        @if(auth()->user()->role=='admin'||auth()->user()->role=='editor')
            <a class="text-yellow-500 hover:text-gray-500" href="{{ route('blog.edit', $post->id) }}">Edit</a>
        @endif



            @if(auth()->user()->role=='admin')
            <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?') ">
                @csrf
                @method('DELETE')

                <button class="text-red-500 hover:text-gray-500 ">Delete</button>

            </form>
@endif





            <a href="/blog/{{ $post->id }}" class="text-indigo-600 hover:text-indigo-900">Read more</a>

        </div>
    </div>
        @endforeach

        {{ $posts->links() }}

</x-layout>

