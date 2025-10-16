       <x-layout>



<a href="{{route('dashboard')}}">&larr; Dashboard</a>
<div class="card mb-4">
    <h2 class="font-bold mb-4">Update post</h2>
   
  
        <form action="{{route('posts.update',$post)}}" method="post">
        @csrf
        @method("put")

        <div class="mb-4">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{$post->title}}" class="input">
                @error('title'){{$message}}@enderror
            </div>
                <div class="mb-4">
                <label for="description">Description</label>
                <input type="text" name="description" value="{{$post->description   }}" class="input">
                @error('description'){{$message}}@enderror
            </div>
            <button type="submit">update post</button>
    </form>
</div>

</x-layout>

