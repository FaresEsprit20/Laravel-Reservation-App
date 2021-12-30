@extends('layout/master')

@section('title','Reservations App')


@section('content')
       
<main>
<a id="button-scroll-top"></a>
<!-- Start Groupes -->
<!-- Start Séances -->
<section class="geView" id="geView">
  <div class="container-fluid">
    <div class="special-heading">Séances</div>
      <p>Créer une Séance</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
    
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
<form action="{{ route('create.seance') }}" method="POST" class="row g-3" id="editseance">
       @csrf
  <div class="col-md-8">
  <label for="group_ides" class="form-label">Groupe</label>
    <select name="groupe" id="group_ides" class="form-select">
      <option selected  disabled value="nil">Sélectionner un groupe...</option>
      @foreach ($groupes as $key => $item)

      <option  value="{{ $item->id_groupe }}">{{ $item->nom_groupe }}</option>              
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

      <option  value="{{ $item->id_locataire }}">{{ $item->nom $item->prenom }}</option>              
      @endforeach
    </select>
    @error('locataire')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-8">
  <label for="hour_id" class="form-label">Heure</label>
    <input name="time" type="time" id="hour_id" class="form-control">
    @error('time')
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
  <div class="col col-sm col-lg-2">
  </div>
  </div>
 
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
          <table class="table display" id="seancesDatatable">
            <caption>Liste des Séances</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Seance</th>
              <th scope="col">#Id_Enseignant</th>
              <th scope="col">#Id_Groupe</th>
              <th scope="col">#Nom & Prénom Ens</th>
              <th scope="col">#Nom_Groupe</th>
              <th scope="col">#Date</th>
              <th scope="col">#Heure</th>
              <th scope="col">Action</th>
            </thead>
            <tbody id="tbodySeances">
              <tr>
                <td>#Id_Seance</td>
                <td>#Id_Enseignant</td>
                <td>#Id_Groupe</td>
                <td>#Nom & Prénom Ens</td>
                <td>#Nom_Groupe</td>
                <td>#Date</td>
                <td>#Heure</td>
                <td><div><button id="btnDelete" style="display:block;width:45px;margin-bottom:5px;" type="button" class="btn btn-info"><i class="fa fa-eye"></button></div></td>
              </tr>
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
<!-- Modal -->
<div class="modal fade" id="reservmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Succés</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Votre Séance a été crée avec Succés!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal">OK!</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Modal -->
<!-- Start Products -->
<section class="GroupesTable" id="GroupeTable">
  <div class="container-fluid">
    <div class="special-heading">Eleves</div>
      <p>Voir la liste des éleves par séance</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="reservationsDatatable">
            <caption>Liste des Eleves</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Séance</th>
              <th scope="col">#Id_Groupe</th>
              <th scope="col">#Id_Eleve</th>
              <th scope="col">#Nom_Groupe</th>
              <th scope="col">#Prenom_Eleve</th>
              <th scope="col">#NomEleve</th>
              <th scope="col">#Classe</th>
              <th scope="col">#Tel</th>
              <th scope="col">#Date_Séance</th>
              <th scope="col">#Heure_Séance</th>
              <th scope="col">#Payement</th>
              <th scope="col">#Absent 1 Présent 0</th>
              <th scope="col">Action</th>
            </thead>
            <tbody id="tbodyGroupes">
              <td>#Id_Séance</td>
              <td>#Id_Groupe</td>
              <td>#Id_Eleve</td>
              <td>#Nom_Groupe</td>
              <td>#Prenom_Eleve</td>
              <td>#NomEleve</td>
              <td>#Classe</td>
              <td>#Tel</td>
              <td>#Date_Séance</td>
              <td>#Heure_Séance</td>
              <td>#Payement</td>
              <td>#Absent 1 Présent 0</td>
              <td><div><button id="btnAbsent" style="display:block;width:70px;margin-bottom:5px;" type="button" class="btn btn-info">Absent</button><button id="btnPresent" style="display:block;width:70px;margin-bottom:5px;" type="button" class="btn btn-secondary">Présent</button></div></td>
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