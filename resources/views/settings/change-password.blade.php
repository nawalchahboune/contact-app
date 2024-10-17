@extends('layouts.main')
@section('title', 'Contact App | change password')
@section('content')

    <link href="asset/js/jasny-bootstrap.min.js" rel="stylesheet">
    <form action={{ route('user-password.update') }} method="POST">
        @csrf
        @method('PUT')
        <main class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                Settings
                            </div>
                            <div class="list-group list-group-flush">
                                <a href='#' class="list-group-item list-group-item-action ">Profile</span></a>
                                <a href="#" class="list-group-item list-group-item-action active">Password</span></a>
                                <a href="#" class="list-group-item list-group-item-action">Import & Export</span></a>
                            </div>
                        </div>
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header card-title">
                                <strong>change your password</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        @if (@session('status') == 'password-updated')
                                            <div class="alert alert-success"> we have changed your profile information
                                                successfully!</div>
                                        @endif
                                        <div class="form-group">
                                            <label for="current-password">your current password</label>
                                            <input type="password" name="current_password"
                                                class="form-control @error('current_password')

                                                  is-invalid
                                                @enderror ">
                                            @error('current_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">new password</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password')
                                                  is-invalid
                                                @enderror  ">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password-confirmation">confirm your new password</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-5">
                                                <button type="submit" class="btn btn-success">Update password</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </form>

@endsection
