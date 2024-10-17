@extends('layouts.main')
@section('title', 'Contact App | Veriy your email address!!')
@section('content')


    <div class="inline-center">
        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success">
                email sent successfully. please check your inbox.
            </div>
        @endif



        <div class=" mt-5 container d-flex justify-content-center  row-1 ">
            <p>
            <h1>
                welcome {{ auth()->user()->name }}
            </h1>
            <hr>
            </p>
            <p>
                we had already sent a verification link to your email address. if you didn't receive it, please click the
                button
                below to resend it.

            </p>
            <div>
                <form action={{ route('verification.send') }} method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">resend email verification!!</button>
                </form>
            </div>



        </div>


    </div>






@endsection
