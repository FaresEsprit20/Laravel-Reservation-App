@extends('layout/master')

@section('title','Reservations App')


@section('content')
       
<main>

<!-- Start Groupes -->
<!-- Start Séances -->
<section class="geView" id="geView">
  <div class="container-fluid">
    <div class="special-heading">Séances</div>
      <p>Créer une Séance</p>
  <div class="row">

    <div class="col-12 col-sm-12 col-lg-8 offset-3">
    
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
<form action="{{ route('create.seance') }}" method="POST" class="row g-3" id="editseance">
       @csrf
  <div class="col-md-8">
  <label for="group_ides" class="form-label">Groupe</label>
    <select name="groupe" id="group_ides" class="form-select">
      <option selected  disabled value="nil">Sélectionner un groupe...</option>
      @foreach ($groupes as $key => $item)

      <option value="{{ $item->id }}">{{ $item->group_name }}</option>              
      @endforeach
    </select>
    @error('groupe')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-8">
  <label for="loc_id" class="form-label">Locataire</label>
    <select name="locataire" id="loc_id" class="form-select">
      <option selected disabled value="nil">Sélectionner un locataire...</option>
      @foreach ($locataires as $key => $item)

      <option  value="{{ $item->id }}">{{ $item->prenom_locataire }}<br>{{ $item->nom_locataire }}</option>              
      @endforeach
    </select>
    @error('locataire')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-8">
    <label for="loca_id" class="form-label">Salle</label>
      <select name="location" id="loca_id" class="form-select">
        <option selected disabled value="nil">Sélectionner une salle...</option>
        @foreach ( $locations as $key => $item)  
        <option  value="{{ $item->id }}">{{ $item->location_name }}</option>              
        @endforeach
      </select>
      @error('location')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  <div class="col-md-8">
  <label for="hour_id" class="form-label">Heure</label>
    <input name="heure" type="time" id="hour_id" class="form-control">
    @error('heure')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-8">
  <label for="date_id" class="form-label">Date</label>
    <input name="date" type="date" id="date_id" class="form-control">
    @error('date')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-8">
    <label for="prix_id" class="form-label">Prix Unitaire Séance</label>
      <input name="prix" type="number" id="prix_id" class="form-control">
      @error('prix')
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
    <button type="submit" class="btn btn-dark">Créer Séance</button>
  </div>
</form>
      
        </div>
    </div>
  </div>
  
  </div>
  @if ($message = Session::get('create_seance_success'))
  <x-bootstrapalertsiconssvg />
 <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
   <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
   <div>
     {{ $message }}
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
 </div>
 @endif
 
 @if ($message = Session::get('create_seance_error'))
 <x-bootstrapalertsiconssvg />
<div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif
</section>
<!-- End Séances -->
<!-- Start Products -->
<section class="SeancesTable" id="SeancesTable">
  <div class="container-fluid">
    <div class="special-heading">Séances</div>
      <p>Voir la liste des séances</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display no-wrap" id="seancesDatatable">
            <caption>Liste des Séances</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Seance</th>
              <th scope="col">#Id_Enseignant</th>
              <th scope="col">#Id_Groupe</th>
              <th scope="col">#Date</th>
              <th scope="col">#Heure</th>
              <th scope="col">#prix unitaire</th>
              <th scope="col">Action</th>
            </thead>
            <tbody id="tbodySeances">
              @foreach ($seances as $key => $item)
              <tr>
                <td><a href="/seances/view/{{  $item->id  }}">{{ $item->id }}</a></td>
                <td><a href="/professeurs/view/{{  $item->locataire_id  }}">{{ $item->locataire_id }}</a></td>
                <td><a href="/groupes/view/{{  $item->groupe_id  }}">{{ $item->groupe_id }}</a></td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->heure }}</td>
                <td>{{ $item->prixUnitaire }}</td>
                <td><div><a id="btnDelete" style="display:block;width:45px;margin-bottom:5px;" href="/seances/view/{{  $item->id  }}" type="button" class="btn btn-info"><i class="fa fa-eye"></a></div></td>
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

@section('script')


<script>
  $("#seancesDatatable").DataTable(
    {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','pageLength'
        ]
    }
  );
</script>
@endsection