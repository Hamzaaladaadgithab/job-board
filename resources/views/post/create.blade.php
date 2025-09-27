<x-layout :title="$pagetitle">

<form method ="POST" action="/blog">
@csrf
  <div class="space-y-12">
    <div class="border-b border-white/10 pb-12">
      <h2 class="text-base/7 font-semibold text-black">Create New Post</h2>
      <p class="mt-1 text-sm/6 text-gray-400"> Use this form to publish a new post to the blog.</p>



    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
         <div class="sm:col-span-3">
          <label for="title" class="block text-sm/6 font-medium text-black">Title</label>
          <div class="mt-2">
            <input id="title" type="text"  value='{{old('title')}}'  name="title" autocomplete="given-name"
             class="block w-full rounded-md bg-black/5 px-3 py-1.5 text-base border {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}
             text-black outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
          </div>
           @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="sm:col-span-3">
          <label for="author" class="block text-sm/6 font-medium text-black">Author</label>
          <div class="mt-2">
            <input id="author" type="text" value='{{old('author')}}' name="author"  autocomplete="family-name"
             class=" block w-full rounded-md bg-black/5 px-3 py-1.5 text-base border {{ $errors->has('author') ? 'border-red-500' : 'border-gray-300' }}
             text-black outline-1 -outline-offset-1 outline-black/10 placeholder:text-gray-500 focus:outline-2
            focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />

          </div>
          @error('author')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="col-span-full">
          <label for="body" class="block text-sm/6 font-medium text-black">Content</label>
          <div class="mt-2">
            <textarea id="body"   name="body" rows="3"
             class="block w-full rounded-md bg-black/5 px-3 py-1.5 text-base border {{ $errors->has('body') ? 'border-red-500' : 'border-gray-300' }}
             text-black outline-1 -outline-offset-1
            outline-black/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2
            focus:outline-indigo-500 sm:text-sm/6">{{old('body')}}</textarea>
          </div>


           @error('body')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror

           <p class="mt-3 text-sm/6 text-gray-400">Write a few sentences about artical. </p>

        </div>

        <div class="col-span-full">
            <div class="flex gap-3">
              <div class="flex h-6 shrink-0 items-center">
                <div class="group grid size-4 grid-cols-1">
                  <input id="published" type="checkbox" name="published" checked aria-describedby="published-description" class="col-start-1 row-start-1 appearance-none rounded-sm border border-white/10 bg-black/5 checked:border-indigo-500 checked:bg-indigo-500
                   indeterminate:border-indigo-500 indeterminate:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 disabled:border-white/5 disabled:bg-white/10 disabled:checked:bg-white/10 forced-colors:appearance-auto" />
                  <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-black/25">
                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100" />
                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-indeterminate:opacity-100" />
                  </svg>
                </div>
              </div>
              <div class="text-sm/6">
                <label for="published" class="font-medium text-black">Is Published ?</label>
                <p id="published-description" class="text-gray-400">Do You Want it published or saved as draft.</p>
              </div>
            </div>
        </div>

      </div>
    </div>

    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/blog"
     class="text-sm/6 font-semibold text-black">Cancel</a>

    <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white
     focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
  </div>
</form>



</x-layout>
