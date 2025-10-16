<h2>{{$posts->count()}}Posts by {{$user->username}}</h2>
@foreach ($posts as $post)
    <x-post-card :post="$post"/>
@endforeach
<div>
{{$posts->links()}}
</div>