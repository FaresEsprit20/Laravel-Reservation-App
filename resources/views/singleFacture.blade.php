@include('head')
       
<main>
<a id="button-scroll-top"></a>
<!-- Start Groupes -->
<section class="gView" id="gView">
  <div class="container-fluid">
    <div class="special-heading">Facture</div>
      <p>Payer une séance d'un éleve</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
        <form class="row g-3" id="creategroup">
       
  <div class="col-md-8">
    <label for="id_seance" class="form-label">#Séance_ID</label>
    <input type="number" class="form-control" id="id_seance" required>
    <div id="is" style="visibility:hidden">
  </div>
  </div>
   <div class="col-md-8">
    <label for="eleve_id" class="form-label">#Eleve_ID</label>
    <input type="number" class="form-control" id="eleve_id" required>
    <div id="ie" style="visibility:hidden">
  </div>
  </div>
  <div class="col-md-8">
    <label for="payement_id" class="form-label">Payement</label>
    <input type="number" class="form-control"  step="any" id="payement_id" required>
    <div id="ip" style="visibility:hidden">
  </div>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="reservCheck" required>
      <label class="form-check-label" for="reservCheck">
        Cochez moi
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Payer la séance</button>
  </div>
</form>
      
        </div>
    </div>
  </div>
  <div class="col col-sm col-lg-2">
  </div>
  </div>
 
</section>
<!-- End Groupes -->
<!-- Start Groupes -->
<section class="gView" id="gView">
  <div class="container-fluid">
    <div class="special-heading">Facture</div>
      <p>Payer une séance d'un Enseignant</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
        <form class="row g-3" id="creategroupenss">
       
  <div class="col-md-8">
    <label for="id_seanceens" class="form-label">#Séance_ID</label>
    <input type="number" class="form-control" id="id_seanceens" required>
    <div id="isens" style="visibility:hidden">
  </div>
  </div>
  <div class="col-md-8">
    <label for="groupe_id" class="form-label">#Groupe_ID</label>
    <input type="number" class="form-control" id="groupe_id" required>
    <div id="ieenss" style="visibility:hidden">
  </div>
  </div>
   <div class="col-md-8">
    <label for="eleve_ids" class="form-label">#Locataire_ID</label>
    <input type="number" class="form-control" id="eleve_ids" required>
    <div id="ieens" style="visibility:hidden">
  </div>
  </div>
  <div class="col-md-8">
    <label for="payement_idens" class="form-label">Payement</label>
    <input type="number" class="form-control"  step="any" id="payement_idens" required>
    <div id="ipens" style="visibility:hidden">
  </div>
  </div>
  <div class="col-12">
    <div class="form-checkm">
      <input class="form-check-input" type="checkbox" id="reservCheckm" required>
      <label class="form-check-label" for="reservCheck">
        Cochez moi
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Payer la séance</button>
  </div>
</form>
      
        </div>
    </div>
  </div>
  <div class="col col-sm col-lg-2">
  </div>
  </div>
 
</section>
<!-- End Groupes -->
<!-- Modal -->
<div class="modal fade" id="reservmodalens" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Succés</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Votre Enseignant(locataire) Séance a été payée avec Succés!
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
<!-- Modal -->
<div class="modal fade" id="reservmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Succés</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Votre Etudiant Séance a été payée avec Succés!
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
<!-- Modal -->
<div class="modal fade" id="reservmodalgrp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Succés</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Votre Groupe a été facturé avec Succés!
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
<!-- Modal -->
<div class="modal fade" id="reservmodalerr" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Erreur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Votre Etudiant Séance n'a pas été payée car ID séance ou ID éleve est incorrect ou n'existe pas!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">OK!</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Modal -->
<!-- Modal -->
<div class="modal fade" id="reservmodalerrens" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Erreur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Votre Enseignant Séance n'a pas été payée car ID séance ou ID enseignant est incorrect ou n'existe pas!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">OK!</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Modal -->
<!-- Modal -->
<div class="modal fade" id="reservmodalerrgrp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Erreur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Votre Groupe n'a pas été facturé car ID groupe est incorrect ou n'existe pas!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">OK!</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Modal -->
<!-- Start Groupes -->
<section class="gView" id="gView">
  <div class="container-fluid">
    <div class="special-heading">Facture</div>
      <p>Facturer un groupe</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
        <form class="row g-3" id="facturergroupv">
       
        <div class="col-md-8">
    <label for="ev_id" class="form-label">#ID_Groupe</label>
    <input type="number" class="form-control" id="ev_id" required>
    <div id="ipsvvv" style="visibility:hidden">
  </div>
  </div>
  <div class="col-md-8">
    <label for="payement_ids" class="form-label">Prix Unitaire de chaque séance</label>
    <input type="number" class="form-control"  step="any" id="payement_ids" required>
    <div id="ips" style="visibility:hidden">
  </div>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="reservChecke" required>
      <label class="form-check-label" for="reservChecke">
        Cochez moi
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Facturer Groupe</button>
  </div>
</form>
      
        </div>
    </div>
  </div>
  <div class="col col-sm col-lg-2">
  </div>
  </div>
 
</section>
<!-- End Groupes -->
<!-- Start Products -->
<section class="GroupesTable" id="GroupeTable">
  <div class="container-fluid">
    <div class="special-heading">Groupes</div>
      <p>Voir la liste des groupes</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="reservationsDatatable">
            <caption>Liste des Factures Des éleves du Groupe</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Elève</th>
              <th scope="col">#Nom_Prénom_Elève</th>
              <th scope="col">#Nbre Séances</th>
              <th scope="col">#Prix des séances</th>
              <th scope="col">#Montant Payé</th>
              <th scope="col">#Montant a Payer </th>
            </thead>
            <tbody id="tbodyGroupes">
              
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
<!-- section facturer ENseignant -->
<!-- Start Groupes -->
<section class="gView" id="gView">
  <div class="container-fluid">
    <div class="special-heading">Facture</div>
      <p>Facturer un Enseignant</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
        <form class="row g-3" id="facturerens">
       
   <div class="col-md-8">
    <label for="eleve_idss" class="form-label">#Groupe_ID</label>
    <input type="number" class="form-control" id="eleve_idss" required>
    <div id="iess" style="visibility:hidden">
  </div>
  </div>
  <div class="col-md-8">
    <label for="ens_ids" class="form-label">#Enseignant_ID</label>
    <input type="number" class="form-control" id="ens_ids" required>
    <div id="ensids" style="visibility:hidden">
  </div>
  </div>
  <div class="col-md-8">
    <label for="payement_idss" class="form-label">Prix Unitaire de chaque séance</label>
    <input type="number" class="form-control"  step="any" id="payement_idss" required>
    <div id="ips" style="visibility:hidden">
  </div>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="reservCheckee" required>
      <label class="form-check-label" for="reservCheckee">
        Cochez moi
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Facturer Enseignant</button>
  </div>
</form>
      
        </div>
    </div>
  </div>
  <div class="col col-sm col-lg-2">
  </div>
  </div>
 
</section>
<!-- End Groupes -->
<!-- Start Products -->
<section class="GroupesTable" id="GroupeTable">
  <div class="container-fluid">
    <div class="special-heading">Factures</div>
      <p>Voir la facture enseignant de ce groupe</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="reservationsDatatableens">
            <caption>Facture Enseignant du groupe</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Enseignant</th>
              <th scope="col">#Nom_Prénom_Enseignant</th>
              <th scope="col">#Nbre Séances</th>
              <th scope="col">#Prix des séances</th>
              <th scope="col">#Montant Payé</th>
              <th scope="col">#Montant a Payer </th>
            </thead>
            <tbody id="tbodyGroupesEns">
              
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

@include('footer')