@extends('layouts.main')
@section('title', 'Contact App | login')
@section('content')





    <div class=" mt-5 container d-flex justify-content-center  ">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-row mt-4">
                <div class="form-group col-md-60">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email"
                        class="form-control @error('email')
                    is-invalid
                        
                    @enderror"
                        placeholder="Email">

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-60 form-col ">
                    <label for="inputPassword4">Password</label>
                    <input type="password" name="password"
                        class="form-control @error('password')
                    is-invalid
                        
                    @enderror"
                        id="inputPassword4" placeholder="Password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


            </div>
            <div class="form-group">
                <div class="form-group form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" name="remember" for="remember">
                        se souvenir de moi
                    </label>
                </div>
                <a href="{{ route('password.request') }}">
                    you forgot your password?

                </a>
            </div>


            <button type="submit" class="btn btn-primary">login!</button>
        </form>
    </div>






@endsection
