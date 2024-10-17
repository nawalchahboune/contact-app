@extends('layouts.main')

@section('title', 'create a contact | my contacts')

@section('content')



    <!-- content -->
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-title">
                            <strong>Add New Contact</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <form method="POST" action="{{ route('store') }}">
                                    {{ csrf_field() }}
                                    <div class="col-md-12">
                                        {{-- 
                                        @dd($companies->pluck('name', 'id')) --}}
                                        <div class="form-group row">
                                            <label for="first_name" class="col-md-3 col-form-label">First Name</label>
                                            <div class="col-md-9">
                                                <input type="text" name="first_name" id="first_name"
                                                    class="form-control    @error('first_name') is-invalid   @enderror"
                                                    value={{ old('first_name') }}>
                                                @error('first_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @else
                                                    <div class="text-muted">
                                                        entre the first name!
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="last_name" class="col-md-3 col-form-label">Last Name</label>
                                            <div class="col-md-9">
                                                <input type="text" name="last_name" id="last_name"
                                                    class="form-control  @error('last_name') is-invalid   @enderror"
                                                    value={{ old('last_name') }}>
                                                @error('last_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @else
                                                    <div class="text-muted">lastst name!
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="phone" class="col-md-3 col-form-label">Phone</label>
                                            <div class="col-md-9">
                                                <input type="text" name="phone" id="phone"
                                                    class="form-control    @error('phone') is-invalid   @enderror"
                                                    value={{ old('phone') }}>
                                                @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @else
                                                    <div class="text-muted">phone!
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="address" class="col-md-3 col-form-label">Address</label>
                                            <div class="col-md-9">
                                                <textarea name="address" id="address" rows="3" class="form-control">  {{ old('address') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">





                                            <label for="company_id" class="col-md-3 col-form-label">Company</label>
                                            <div class="col-md-9">

                                                <select name="company_id" id="company_id"
                                                    class="form-control  @error('company_id') is-invalid   @enderror"
                                                    value={{ old('company_id') }}>
                                                    @error('company_id')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @else
                                                        <div class="text-muted">company Name!!
                                                        </div>
                                                    @enderror
                                                    <option value="">Select Company</option>
                                                    @foreach ($companies as $company)
                                                        <option value="{{ $company['id'] }}" @selected($company['id'] == old('company_id'))>
                                                            {{ $company['name'] }}
                                                        </option>
                                                    @endforeach


                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-9 offset-md-3">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <a href="index.html" class="btn btn-outline-secondary">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </main>

@endsection
