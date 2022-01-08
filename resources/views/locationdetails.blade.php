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

<!-- Start Groupes -->
<section class="geView" id="geView">
  <div class="container-fluid">
    <div class="special-heading">Locations</div>
      <p>Modifier une location</p>
  <div class="row">

    <div class="col-12 col-sm-12 col-lg-8 offset-3">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
  <form action="{{ route('update.location') }}" method="POST" class="row g-3" id="editgroup">
       @method('PUT')
       @csrf
  <div class="col-md-8">
  <label for="group_id" class="form-label">Location</label>
    <select name="location" id="group_id" class="form-select">
      <option selected  disabled value="nil">Sélectionner une location...</option>
      @foreach ($locations as $key => $item)
      <option value="{{ $item->id }}">{{ $item->location_name }}</option>
      @endforeach
      
    </select>
    @error('location')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-8">
    <label for="group_name" class="form-label">Nom Location</label>
    <input name="nomlocationu" type="text" class="form-control" id="group_name">
    @error('nomlocationu')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  <div class="col-12">
    <div class="form-check">
      <input name="chku" class="form-check-input" type="checkbox" id="reservChecks">
      <label class="form-check-label" for="reservChecks">
        Cochez moi
      </label>
      @error('chku')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Modifier Location</button>
  </div>
</form>
      
        </div>
    </div>
  </div>

  </div>
 
</section>
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
            </thead>
            <tbody id="tbodyL">
              @foreach ($locations as $key => $item)          
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->location_name }}</td>
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