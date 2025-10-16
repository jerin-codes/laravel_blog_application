

<x-layout>
   <h1>Latests Posts</h1>
   @foreach ($posts as $post)
   <x-post-card :post="$post"/>
   @endforeach
   <div>
      {{$posts->links()}}
   </div>
</x-layout>
