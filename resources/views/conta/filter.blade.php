<div class="row-md--">
  <div class="col-md-4">
    <a href ="{{request()->fullUrlWithQuery(['trash'=>false])}}" 
      class="btn {{request()->query('trash')?'text-secondary':'text-primary'}}">
      All
    </a>
    |
    <a href="{{request()->fullUrlWithQuery(['trash'=>true])}}" 
      class="btn {{request()->query('trash')?'text-primary':'text-secondary'}}">
      Trash
    </a>
  </div>
</div>

<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-10">
    <form method="GET" action="{{ route('contacts' ) }}">
      <div class="form-row align-items"> <!-- Utilise form-row pour un alignement horizontal -->
        
        <input type="hidden" name="trash" value={{request()->query('trash')}}>
        
        <!-- Ajuste la taille des colonnes pour aligner le select et l'input -->
        <div class="col-md-4">
          <select class="form-control" name="company_id" id="select-input" onchange="this.form.submit()">
            <option value="">All Companies</option>
            @foreach ($companies as $company )
            <option value={{$company['id']}} @if($company['id']==request()->query("company_id")) selected @endif>
              {{$company['name']}}
            </option>
            @endforeach
          </select>
        </div>
        
        <div class="col-md-6"> <!-- Ajuste la largeur de l'input de recherche -->
          <div class="input-group mb-3">
            <input type="text" name="search" value="{{request()->query('search')}}" id="search-input" 
                   class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
            
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
