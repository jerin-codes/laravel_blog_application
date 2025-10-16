<x-layout>

    <h1 class="text-center">Register a new account</h1>
    <div class="mx-auto max-w-screen-sm card">
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="username" style="font-size:30px;">Username</label>
                <input type="text" name="username" value="{{old('username')}}" class="input">
                @error('username'){{$message}}@enderror
            </div>
            <div class="mb-4">
                <label for="username">Email</label>
                <input type="text" name="email" value="{{old('email')}}" class="input">
                @error('email'){{$message}}@enderror
            </div>
            <div class="mb-4">
                <label for="password">password</label>
                <input type="password" name="password" class="input">
                @error('password'){{$message}}@enderror
            </div>
            <div class="mb-4">
                <label for="password_cpnformation">confirm password</label>
                <input type="password" name="password_confirmation" class="input">
            </div>
            <button class="btn">Register</submit>
        </form>

    </div>
</x-layout>