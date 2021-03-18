@extends('Home')

@section('content')
    <div style="width: 340px; margin: 50px auto; background-color: #f7f7f7; box-shadow: 0px 2px 2px rgba(0,0,0,0.3); padding: 30px;">
        <h1 class="text-center">LogIn</h1>
        <div>
            <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="Your Email Please" required>
                    @error('email')
                        <p class="alert alert-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Your Password Please" required>
                </div>
                <button class="btn btn-primary btn-block" type="submit">LogIn</button>
                <div class="text-center">
                    <p><a href="{{route('password.request')}}">Forget Password</a></p>
                    <p>If you don't have a account then <a href="{{route('register')}}">Register</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection