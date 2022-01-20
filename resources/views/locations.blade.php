@extends('layout/master')

@section('title','Reservations App')

@section('content')
       
<main>
<a id="button-scroll-top"></a>
<!-- Start Locations -->
<section class="locsView" id="locsView">
  <div class="container-fluid">
    <div class="special-heading">Locations</div>
      <p>Créer une location</p>
  <div class="row">

    <div class="col-12 col-sm-12 col-lg-8 offset-3">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">

  <form action="{{ route('create.location') }}" method="POST" class="row g-3" id="createloc">
      @csrf
  <div class="col-md-8">
    <label for="nom_location" class="form-label">Nom Location</label>
    <input name="nomlocation" type="text" class="form-control" id="nom_location" >
    @error('nomlocation')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-12">
    <div class="form-check">
      <input name="chk" class="form-check-input" type="checkbox" id="reservCheck">
      <label class="form-check-label" for="reservCheck">
        Cochez moi
      </label>
    @error('chk')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Créer Location</button>
  </div>
</form>
      
    </div>
   </div>
  </div>

  </div>
 
</section>
<!-- End Locations -->


<!-- Start Products -->
<section class="reservationsView" id="reservationsView">
  <div class="container-fluid">
    <div class="special-heading">Locations</div>
      <p>Voir les Locations</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="locationsDatatable">
            <caption>Liste des Locations</caption>
            <thead class="table-dark">
              <th scope="col">#id_loc</th>
              <th scope="col">#Nom_salle</th>   
              <th scope="col">Action</th>
            </thead>
            <tbody id="tbodyL">
              @foreach ($locations as $key => $item)          
              <tr>
                <td><a href="/locations/view/{{  $item->id  }}">{{ $item->id }}</a></td>
                <td>{{ $item->location_name }}</td>
                <td><div><a id="btnDelete" style="display:block;width:45px;margin-bottom:5px;" href="/locations/view/{{  $item->id  }}" type="button" class="btn btn-info"><i class="fa fa-trash-alt"></a></div></td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
      
        </div>
    </div>
  </div>
  <div class="col col-sm col-lg-2">
  </div>
  </div>
 
</section>
<!-- End Products -->
</main>

@endsection