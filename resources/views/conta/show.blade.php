@extends("layouts.main")
@section('title','show a contact | my contacts')
 @section('content')
 


  <main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Contact Details</strong>
            </div>           
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="first_name" class="col-md-3 col-form-label">First Name</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{$contact['first_name']}}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="last_name" class="col-md-3 col-form-label">Last Name</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{$contact['last_name']}}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label">Phone</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{$contact['phone']}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label">Address</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{$contact['adress']}}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="phone" class="col-md-3 col-form-label">company id</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{$contact['company_id']}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group row mb-0">
                    <div class="col-md-9 offset-md-3">
                        <a href={{ route('edit', ['id'=>$contact['id']]) }} class="btn btn-info">Edit</a>
                        
                        <form action="{{ route('destroy', $contact->id) }}"   style = " display: inline" method="POST">
                          {{ csrf_field() }}
                          @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete" ><i class="fa fa-times "></i></button>
                          
                      </form>


                        <a href={{ route('contacts') }} class="btn btn-outline-secondary">Cancel</a>
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





@endsection