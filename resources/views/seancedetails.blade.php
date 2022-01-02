@extends('layout/master')
@section('title','Reservations App')

@section('content')
       
<main>
<a id="button-scroll-top"></a>

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