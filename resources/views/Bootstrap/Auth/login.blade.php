@extends('Home')

@section('content')
    <div>
        <h1>LogIn</h1>
        <div>
            <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your Email Please" required>
                    @error('email')
                        <p>{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your Password Please" required>
                    @error('password')
                        <p>{{$message}}</p>
                    @enderror
                </div>
                <button type="submit">LogIn</button>
                <div>
                    <p><a href="{{route('password.request')}}">Forget Password</a></p>
                    <p>If you don't have a account then <a href="{{route('register')}}">Register</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection