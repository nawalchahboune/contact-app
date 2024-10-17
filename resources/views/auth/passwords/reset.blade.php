@extends('layouts.main')
@section('title', 'Contact App | reset the password')
@section('content')





    <div class=" mt-5 container d-flex justify-content-center  ">
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <div class="form-row mt-4">
              <div class="form-group col-md-600">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email"
                        class="form-control @error('email')
                    is-invalid
                        
                    @enderror"
                        value="{{ request()->email }}" placeholder="Email">

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-60 form-col ">
                    <label for="inputPassword4">new password</label>
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
            <div class="form-row">
                <div class="form-group col-md-60 form-col ">
                    <label for="inputPassword4">confirm password</label>
                    <input type="password" name="password_confirmation"
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
                <input type="hidden" name="token" value="{{ request()->route('token') }}">


                </input>


            </div>
            <button type="submit" class="btn btn-primary" style="width: 250px"> update the password </button>

        </form>
    </div>






@endsection
