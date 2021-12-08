@extends('layout/master')

@section('title','Reservations App')


@section('content')

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
      
<form action="{{ route('paiement.eleve.payer') }}" method="POST" class="row g-3" id="creategroup">
      @csrf     
      <div class="col-md-8">
        <label for="id_seance" class="form-label">#Séance_ID</label>
        <input name="seance" type="number" class="form-control" id="id_seance" >
        @error('seance')
      <span class="text-danger">{{ $message }}</span>
      @enderror
      </div>
       <div class="col-md-8">
        <label for="eleve_id" class="form-label">#Eleve_ID</label>
        <input name="eleve" type="number" class="form-control" id="eleve_id" >
        @error('eleve')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-8">
        <label for="payement_id" class="form-label">Payement</label>
        <input name="montant" type="number" class="form-control"  step="any" id="payement_id">
        @error('montant')
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
      
<form action="{{ route('paiement.ens.payer') }}" method="POST" class="row g-3" id="creategroupenss">
    @csrf
      <div class="col-md-8">
        <label for="id_seanceens" class="form-label">#Séance_ID</label>
        <input name="seancee" type="number" class="form-control" id="id_seanceens">
        @error('seancee')
        <span class="text-danger">{{ $message }}</span>
        @enderror    
      </div>
      <div class="col-md-8">
        <label for="groupe_id" class="form-label">#Groupe_ID</label>
        <input name="groupee" type="number" class="form-control" id="groupe_id">
        @error('groupee')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
       <div class="col-md-8">
        <label for="eleve_ids" class="form-label">#Locataire_ID</label>
        <input name="locataire" type="number" class="form-control" id="eleve_ids">
        @error('locataire')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-8">
        <label for="payement_idens" class="form-label">Payement</label>
        <input name="montante" type="number" class="form-control"  step="any" id="payement_idens">
        @error('montante')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <div class="form-checkm">
          <input name="chke" class="form-check-input" type="checkbox" id="reservCheckm">
          <label class="form-check-label" for="reservCheck">
            Cochez moi
          </label>
          @error('chke')
          <span class="text-danger">{{ $message }}</span>
          @enderror
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
      
 <form action="{{ route('paiement.groupes') }}" method="POST" class="row g-3" id="facturergroupv">
         @csrf  
    <div class="col-md-8">
        <label for="ev_id" class="form-label">#ID_Groupe</label>
        <input name="groupeg" type="number" class="form-control" id="ev_id">
        @error('groupeg')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-8">
        <label for="payement_ids" class="form-label">Prix Unitaire de chaque séance</label>
        <input name="prixunitaire" type="number" class="form-control"  step="any" id="payement_ids">
        @error('prixunitaire')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <div class="form-check">
          <input name="chkg" class="form-check-input" type="checkbox" id="reservChecke">
          <label class="form-check-label" for="reservChecke">
            Cochez moi
          </label>
          @error('chkg')
          <span class="text-danger">{{ $message }}</span>
          @enderror
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
                  <tr>
                    <td>#Id_Elève</td>
                    <td>#Nom_Prénom_Elève</td>
                    <td>#Nbre Séances</td>
                    <td>#Prix des séances</td>
                    <td>#Montant Payé</td>
                    <td>#Montant a Payer </td>
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
    
   <form action="{{ route('paiement.ens') }}" method="POST" class="row g-3" id="facturerens">
       @csrf
         <div class="col-md-8">
         <label for="eleve_idss" class="form-label">#Groupe_ID</label>
         <input name="groupeens" type="number" class="form-control" id="eleve_idss">
        @error('groupeens')
         <span class="text-danger">{{ $message }}</span>
         @enderror
        </div>
        <div class="col-md-8">
        <label for="ens_ids" class="form-label">#Enseignant_ID</label>
        <input name="loc" type="number" class="form-control" id="ens_ids">
        @error('loc')
        <span class="text-danger">{{ $message }}</span>
        @enderror
       </div>
      <div class="col-md-8">
        <label for="payement_idss" class="form-label">Prix Unitaire de chaque séance</label>
        <input name="prixUens" type="number" class="form-control"  step="any" id="payement_idss">
        @error('prixUens')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <div class="form-check">
          <input name="chkens" class="form-check-input" type="checkbox" id="reservCheckee">
          <label class="form-check-label" for="reservCheckee">
            Cochez moi
          </label>
          @error('chkens')
          <span class="text-danger">{{ $message }}</span>
          @enderror
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
                  <tr>
                  <td>#Id_Enseignant</td>
                  <td>#Nom_Prénom_Enseignant</td>
                  <td>#Nbre Séances</td>
                  <td>#Prix des séances</td>
                  <td>#Montant Payé</td>
                  <td>#Montant a Payer </td>
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