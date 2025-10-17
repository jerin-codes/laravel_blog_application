@props(["post","details"=>false])

<div class="card bg-green-50">
        

      @if($post->image_url !=NULL)
 <div>
            <img src="{{asset("storage/".$post->image_url)}}">
      </div>
      @else
       <div>
            <img src="{{asset("storage/posts_images/default_image.png")}}">
      </div>
      @endif
         <h2 class="font-bold text-xl">{{$post->title}}</h2>
         <div class="text-xs font-light mb-4">
            <span>posted {{$post->created_at->diffForHumans()}} by <a href="{{route('posts.user',$post->user_id)}}">{{$post->user->username}}</a></span>
            <a href="#" class="text-blue-500 font-medium">{{$post->created_At}}</a>
      </div>
      @if(!$details)
      <div class="text-sm">
         <p>{{Str::words($post->description,15,"...")}}</p>
         <a href="{{route("posts.show",$post)}}">Read More &rarr;</a>
   </div>
   @else
   <div class="text-sm">
         <p>{{$post->description}}</p>

   </div>
      @endif
      <div>
          {{$slot}}
      </div>
   </div> 