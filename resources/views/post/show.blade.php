
<x-layout :title="$pagetitle">
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->body }}</p>
    <p>{{ $post->author }}</p>

    <ul class="mt-6 space-y-4">

        @foreach ($post->comments as $comment)
        <li class="p-4 bg-gray-100 rounded-md shadow-sm">
            <p class="text-gray-800"> {{$comment->content}} </p>
            <span class="mt-1 text-sm text-gray-600">-{{$comment->author}} </span>

        </li>
        @endforeach
        </ul >


<div class="border border-gray-300 px-3 py-2 mt-2">

        <form action="/comments" method ="POST"  class="mt-8">
    @csrf

    <input type="hidden" name="post_id" value="{{$post->id}}"/>


<div class="space-y-6">
<div>
        <label for="author" class="block text-sm/6 font-medium text-black">Your Name</label>
        <div class="mt-2">
            <input id="author" type="text" value='{{old('author')}}' name="author"  autocomplete="family-name"
            class=" block w-full rounded-md bg-black/5 px-3 py-1.5 text-base border {{$errors->has('author') ? 'border-red-500' : 'border-gray-300' }}
            text-black outline-1 -outline-offset-1 outline-black/10 placeholder:text-gray-500 focus:outline-2
            focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />

          </div>
          @error('author')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

    <div>
        <label for="content" class="block text-sm/6 font-medium text-black">Your Comment</label>
        <div class="mt-2">
            <textarea id="content"   name="content" rows="4"
             class="block w-full rounded-md bg-black/5 px-3 py-1.5 text-base border {{ $errors->has('content') ? 'border-red-500' : 'border-gray-300' }}
             text-black outline-1 -outline-offset-1
            outline-black/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2
            focus:outline-indigo-500 sm:text-sm/6"></textarea>
          </div>


           @error('content')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror


      </div>
    </div>



  <div class="mt-6 flex items-center justify-end gap-x-4">

    <button type="submit"
    class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white
     focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Add Comment
    </button>

  </div>
</form>
</div>

</x-layout>
