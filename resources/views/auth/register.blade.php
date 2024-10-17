{{-- @extends('layouts.main_public')
@section('title', 'contact App | Register')
@endsection
@section('content')
<h1> Registration</h1>
@endsection --}}
@extends('layouts.main')
@section('title', 'Contact App | Register')
@section('content')





    <div class=" mt-5 container d-flex justify-content-center ">
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div>
                <h1>Registration !</h1>
                <div class="form-row">
                    <div class="form-group col-md-6 form-col">
                        <label for="name">first name</label>
                        <input type="text" name="name"
                            class="form-control  @error('name')
                        is-invalid
                            
                        @enderror"
                            value="{{ old('name') }}" placeholder="your first name">

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                    <div class="form-group col-md-6 form-col">

                        <label>last name</label>
                        <input type="text" name="last_name"
                            class="form-control @error('last_name')
                        is-invalid
                            
                        @enderror"
                            value="{{ old('last_name') }}" placeholder="your last name">
                        @error('last_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-row mt-4">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email"
                        class="form-control @error('last_name')
                    is-invalid
                        
                    @enderror"
                        placeholder="Email">
                </div>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="form-row">
                <div class="form-group col-md-6 form-col ">
                    <label for="inputPassword4">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group col-md-6 form-col">

                    <label for="inputPassword5">confirm your Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-phone" viewBox="0 0 16 16">
                    <path
                        d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                </svg>
                <label for="inputPhone">Phone</label>

                <input type="text" class="form-control" id="inputPhone" placeholder="06......">
            </div>

            <div class="form-group">
                <label for="inputAddress">Address</label>

                <input type="text" class="form-control" id="inputAddress" placeholder="1234 route de ...">
            </div>
            <div class="form-row">
                <label for="inputState">school name</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>

            
            <button type="submit" class="btn btn-primary">Register!</button>
        </form>
    </div>






@endsection
