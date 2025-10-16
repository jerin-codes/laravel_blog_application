<x-layout>

<h2>Welcome Back</h2>
<form action="{{route("login")}}" method="POST">
    @error("failed") {{$message}}@enderror
 @csrf
<label>email</label>
<input type="text" name="email">
@error("email"){{$message}}@enderror
<label>password</label>
<input type="password" name="password">
@error("password"){{$message}}@enderror<br>
<div style="display:flex; gap:4px;">
<input type="checkbox" name="remember">
<label>Remember me</label>
</div>
<button type="submit">Submit</button> 
</form>


</x-layout>