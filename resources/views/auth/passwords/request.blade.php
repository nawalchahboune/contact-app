@extends('layouts.main')
@section('title', 'Contact App | reset password')
@section('content')




    <div class="inline-center mt-5">
        <div class=" mt-19 container d-flex justify-content-center  ">

            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                @if (session('status'))
                    <div class="alert alert-success " role="alert">
                        {{ session('status') }}
                    </div>
                @endif


                <div class="form-row mt-4">

                    <div class="form-group col-md-600">
                        <label for="inputEmail4">Email</label>
                        <input type="email" name="email" style="width: 500px;"
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

                <button type="submit" class="btn btn-primary" style="width: 250px"> send reset link </button>
            </form>
        </div>
    </div>






@endsection
