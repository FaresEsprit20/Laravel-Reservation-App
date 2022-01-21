@extends('layout/master')

@section('title','Reservations App')


@section('content')
       
<main>



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

  <input type="hidden" name="location" value="{{  $location->id  }}">
  <div class="col-md-8">
    <label for="group_name" class="form-label">Nom Location</label>
    <input name="nomlocationu" value="{{ $location->location_name }}" type="text" class="form-control" id="group_name">
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
<section class="SeancesTable" id="SeancesTable">
  <div class="container-fluid">
    <div class="special-heading">Séances du location</div>
      <p>Voir la liste des séances du location</p>
  <div class="row">

    <div class="col-12 col-sm-12 col-lg-10 offset-1">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="seanceslocDatatable">
            <caption>Liste des Séances du location</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Seance</th>
              <th scope="col">#Date</th>
              <th scope="col">#Heure</th>
              <th scope="col">#prix unitaire</th>
            </thead>
            <tbody id="tbodySeances">
              @foreach ($seanceslocation as $key => $item)
              <tr>
                <td><a href="/seances/view/{{  $item->id  }}">{{ $item->id }}</a></td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->heure }}</td>
                <td>{{ $item->prixUnitaire }}</td>
             
              </tr>
              @endforeach
             
            </tbody>
          </table>
      
        </div>
    </div>
  </div>

  </div>
 
</section>
<!-- End Products -->


</main>

@endsection

@section('script')
<script>
  $("#seanceslocDatatable").DataTable();
</script>
@endsection