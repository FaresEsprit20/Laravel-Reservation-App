@extends('layout/master')

@section('title','Reservations App')


@section('content')
       
<main>
<a id="button-scroll-top"></a>
<!-- Modal -->
<div class="modal fade" id="reservmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Succés</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Votre Groupe a été crée avec Succés!
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
    <div class="special-heading">Factures</div>
      <p>Voir la liste des factures éleves</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="reservationsDatatable">
            <caption>Liste des Groupes</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Facture</th>
              <th scope="col">#Id_Elève</th>
              <th scope="col">#Id_Groupe</th>
              <th scope="col">#Nom_Prénom_Elève</th>
              <th scope="col">#Nom_Groupe</th>
              <th scope="col">#Nbre Séances</th>
              <th scope="col">#Prix des séances</th>
              <th scope="col">#Montant Payé</th>
              <th scope="col">#Montant a Payer </th>
              <th scope="col">#Date & heure </th>
              <th scope="col">#Action</th>
            </thead>
            <tbody id="tbodyGroupes">
              <tr>
                <td>#Id_Facture</td>
                <td>#Id_Elève</td>
                <td>#Id_Groupe</td>
                <td>#Nom_Prénom_Elève</td>
                <td>#Nom_Groupe</td>
                <td>#Nbre Séances</td>
                <td>#Prix des séances</td>
                <td>#Montant Payé</td>
                <td>#Montant a Payer </td>
                <td>#Date & heure </td>
                <td><div><button style="display:block;width:65px;" id="btnArchv"type="button" class="btn btn-dark">Archv</button></div></td>  
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
<!-- Start Products -->
<section class="GroupesTable" id="GroupeTable">
  <div class="container-fluid">
    <div class="special-heading">Factures</div>
      <p>Voir la liste des factures Enseignants</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="reservationsensDatatable">
            <caption>Liste des Groupes</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Facture</th>
              <th scope="col">#Id_Enseignant</th>
              <th scope="col">#Id_Groupe</th>
              <th scope="col">#Nom_Prénom_Ens</th>
              <th scope="col">#Nom_Groupe</th>
              <th scope="col">#Nbre Séances</th>
              <th scope="col">#Prix des séances</th>
              <th scope="col">#Montant Payé</th>
              <th scope="col">#Montant a Payer </th>
              <th scope="col">#Date & heure </th>
              <th scope="col">#Action</th>
            </thead>
            <tbody id="tbodyGroupesEns">
            <tr>
              <td>#Id_Facture</td>
              <td>#Id_Enseignant</td>
              <td>#Id_Groupe</td>
              <td>#Nom_Prénom_Ens</td>
              <td>#Nom_Groupe</td>
              <td>#Nbre Séances</td>
              <td>#Prix des séances</td>
              <td>#Montant Payé</td>
              <td>#Montant a Payer </td>
              <td>#Date & heure </td>
              <td><div><button style="display:block;width:65px;" id="btnArchvens"type="button" class="btn btn-dark">Archv</button></div></td>
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
</main>

@endsection