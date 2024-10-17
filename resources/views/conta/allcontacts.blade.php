@extends("layouts.main")
 @section('content')
 <main class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header card-title">
              <div class="d-flex align-items-center">
                <h2 class="mb-0">All Contacts</h2>
                <div class="ml-auto">
                  <a href={{ route('createContact') }} class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                </div>
              </div>
            </div>
          <div class="display: inline">
            <div class="card-body " >
              @include('conta.filter')
                    @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                        @if($undoRoute=session('undoRoute'))
                        
                        <form method="get" action= {{$undoRoute}}>
                            @csrf
                            <button type= "submit" class="btn alert-link">undo</button>
                        </form>
                        @endif
                    </div>
                    @endif
          </div>
        
            <table class="table table-striped table-hover">
              <thead>
                @if (!@empty($contacts))
                    
  
                    
                
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">phone</th>
                  <th scope="col">address </th>
                  <th scope="col">company Name </th>
                  <th scope="col">Actions</th>
                </tr>
                
                
              </thead>
              <tbody>
                
                    
                @foreach($contacts as  $contact)
                <tr>
                  <th scope="row">{{$contact['id']}}</th>
                  <td>{{ $contact['first_name'] }}</td>
                  <td>{{ $contact['last_name'] }}</td>
                  <td>{{ $contact['phone'] }}</td>
                  <td>{{ $contact['adress'] }}</td>
                  <td>{{$contact->company['name']}}</td>
                  @if($trash)
                  
                  <td width="150" >
                  </form>
                  <form action="{{ route('restore', ['id'=>$contact->id]) }}"  style = " display: inline" method="GET">
                    @csrf
                  <button type="submit" class="btn btn-sm btn-circle btn-outline-secondary" title="Restore" ><i class="fa fa-edit "></i></button>
                    
                </form>
                  <form action="{{ route('forceDelete', ['id'=>$contact->id]) }}"  style = " display: inline" method="POST">
                    @csrf
                    @method('delete')
                  <button type="submit" onclick='return confirm("are you about forcing deletion?")' class="btn btn-sm btn-circle btn-outline-danger" title="Force deletion" ><i class="fa fa-trash "></i></button>
                    
                
                  </td>
                  
                  @else
                    <td width="150" >
                      <a href={{ route('show', $contact->id) }}  class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                      <a href={{ route('edit', $contact->id) }} class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                      <form action="{{ route('destroy', ['id'=>$contact->id]) }}"  style = " display: inline" method="POST">
                        @csrf
                        @method('delete')
                      <button type="submit" class="btn btn-sm btn-circle btn-outline-danger" title="Delete" ><i class="fa fa-trash "></i></button>
                        
                    </form>
                    </td>
                  
                  @endif
                </tr>
                @endforeach
                
              </tbody>
            </table> 
            @else
                <p> no contact found</p>
            @endif
            <div class="d-flex justify-content-center mt-5 ">
              <!--{{ $contacts->appends(request()->only('orderBy','q'))->links() }}-->
             {{ $contacts->links() }}
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>


@endsection