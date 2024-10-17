@extends('layouts.main')
@section('title', 'Contact App | login')
@section('content')
    <div class=container>
        <div class="row">
            <link href="asset/js/jasny-bootstrap.min.js" rel="stylesheet">
            <form action="{{ route('user-profile-information.update') }}" method="POST">

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
                                        <a href='#'
                                            class="list-group-item list-group-item-action active">Profile</span></a>
                                        <a href="{{ route('modifyPassword') }}"
                                            class="list-group-item list-group-item-action">Password</span></a>
                                        <a href="#" class="list-group-item list-group-item-action">Import &
                                            Export</span></a>
                                    </div>
                                </div>
                            </div><!-- /.col-md-3 -->

                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header card-title">
                                        <strong>Edit Profile</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-8">
                                                @if (@session('status') == 'profile-information-updated')
                                                    <div class="alert alert-success"> we have changed your profile
                                                        information
                                                        successfully!</div>
                                                @endif
                                                <div class="form-group">
                                                    <label for="name"></label>
                                                    <input type="text" name="name" id="name"
                                                        class="form-control @error('name')

                                                  is-invalid
                                                @enderror "
                                                        value={{ old('name', $user->name) }}>
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" id="email"
                                                        class="form-control @error('email')
                                                  is-invalid
                                                @enderror  "
                                                        value={{ old('email', $user->email) }}>
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" name="phone" id="phone" class="form-control"
                                                        value={{ old('phone', $user->phone) }}>
                                                </div>
                                                <div class="form-group">
                                                    <label for="company">Company</label>
                                                    <input type="text" name="company" id="company" class="form-control"
                                                        value={{ old('company', $user->company) }}>
                                                </div>
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <input type="text" name="country" id="country" class="form-control"
                                                        value={{ old('country', $user->country) }}>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <textarea name="address" id="address" rows="2" class="form-control">{{ old('address', $user->address) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="offset-md-1 col-md-3">
                                                <div class="form-group">
                                                    <label for="bio">Profile picture</label>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new img-thumbnail"
                                                            style="width: 150px; height: 150px;">
                                                            <img src="https://via.placeholder.com/150x150" alt="...">
                                                            {{-- </div>
                                                <div class="fileinput-preview fileinput-exists img-thumbnail"
                                                    style="max-width: 150px; max-height: 150px;"></div>  hna ltht --}}

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-5">
                                                            <button type="submit" class="btn btn-success">Update
                                                                Profile</button>
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
        </div>
        <<div class="col-md-3">
            <div class="mt-2">
                <form action="{{ route('imageProfile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <span class="btn btn-outline-secondary btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="profile_picture" id="profile_picture">
                    </span>
                    <button type="submit" class="btn btn-success mt-2">Upload Image</button>
                </form>

                {{-- <form action="{{ route('imageProfile') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <input type="file" name="profile_picture">
        <button type="submit"> upload image</button>
    </form> --}}

                {{-- <a href="#" class="btn btn-outline-secondary fileinput-exists"
        data-dismiss="fileinput">Remove</a> --}}
            </div>
    </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jasny-bootstrap.min.js"></script>
    <script>
        $("#add-new-group").hide();
        $('#add-group-btn').click(function() {
            $("#add-new-group").slideToggle(function() {
                $('#new_group').focus();
            });
            return false;
        });
    </script>

@endsection
