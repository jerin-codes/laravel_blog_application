<x-layout>

<h1>Hello {{auth()->user()->username}}</h1>
<h2>You have created {{$posts->count()}} Posts</h2>


<div class="card mb-4">
    <h2 class="font-bold mb-4">Create anew post</h2>
   @if(session('success'))
    <div>
       <x-flash-message msg="{{session('success')}}" bg="bg-green-500" />
    </div>
    @elseif(session("delete"))
    <x-flash-message msg="{{session('delete')}}" bg="bg-red-500" />
    @endif
        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{old('title')}}" class="input">
                @error('title'){{$message}}@enderror
            </div>
                <div class="mb-4">
                <label for="description">Description</label>
                <input type="text" name="description" value="{{old('description')}}" class="input">
                @error('description'){{$message}}@enderror
            </div>
            <div>
                    <label for="image">Cover Image</label>
                    <input type="file" name="image" id="image"/>
                    @error("image")
                        {{$message}}
                    @enderror
                </div>

            
            <button type="submit">Create post</button>
    </form>
</div>

@if($posts->count()>0)

<h2>Your lates posts</h2>
 @foreach ($posts as $post)
   <x-post-card :post="$post">
    <a href="{{route('posts.edit',$post)}}">Update</a>
   <form action="{{route("posts.destroy",$post)}}" method="post">
    @csrf
    @method("DELETE")
    <button>Delete</button>
    
   </form>
  
   </x-post-card>
   @endforeach
   <div>
      {{$posts->links()}}
   </div>

@endif
</x-layout>