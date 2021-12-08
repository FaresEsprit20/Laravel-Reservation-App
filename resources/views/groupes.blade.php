@include('head')
       
<main>
<a id="button-scroll-top"></a>
<!-- Start Groupes -->
<section class="gView" id="gView">
  <div class="container-fluid">
    <div class="special-heading">Groupes</div>
      <p>Créer un groupe</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
        <form class="row g-3" action="{{ route('create.group') }}" method="POST" id="creategroup" name="creategroup">
       @csrf
  <div class="col-md-8">
    <label for="nom_groupe" class="form-label">Nom Groupe</label>
    <input type="text" name="groupe" class="form-control" id="nom_groupe">
    @error('groupe')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="reservCheck">
      <label name="chk" class="form-check-label" for="reservCheck">
        Cochez moi
      </label>
      @error('chk')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Créer le Groupe</button>
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
<section class="geView" id="geView">
  <div class="container-fluid">
    <div class="special-heading">Groupes</div>
      <p>Modifier un groupe</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
        <form action="{{ route('update.group') }}" method="POST" class="row g-3" id="editgroup">
       @method('PUT')
       @csrf
  <div class="col-md-8">
  <label for="group_id" class="form-label">Groupe</label>
    <select name="groupeu" id="group_id" class="form-select">
      <option selected  disabled value="nil">Sélectionner un groupe...</option>
    </select>
    @error('groupeu')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-8">
    <label for="group_name" class="form-label">Nom Groupe</label>
    <input type="text" name="nomgroupe" class="form-control" id="group_name">
    @error('nomgroupe')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  <div class="col-12">
    <div class="form-check">
      <input  name="chku" class="form-check-input" type="checkbox" id="reservChecks" >
      <label class="form-check-label" for="reservChecks">
        Cochez moi
      </label>
      @error('chku')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Modifier le Groupe</button>
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
    <div class="special-heading">Groupes</div>
      <p>Voir la liste des groupes</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="reservationsDatatable">
            <caption>Liste des Groupes</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Groupe</th>
              <th scope="col">#Nom_Groupe</th>
              <th scope="col">Action</th>
            </thead>
            <tbody id="tbodyGroupes">
              <tr>
                <td class="id_groupe">1</td>
                <td>aa</td>
                <td><div><button id="btnDelete" style="display:block;width:65px;margin-bottom:5px;" type="button" class="btn btn-info">Del</button><button style="display:block;width:65px;" id="btnArchv"type="button" class="btn btn-dark">Archv</button></div></td>
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
<!-- Start Groupes -->
<section class="geView" id="geView">
  <div class="container-fluid">
    <div class="special-heading">Elèves</div>
      <p>Trouver les groupes d'un élève</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
        <form action="{{ route('find.eleve.groups') }}" method="POST" class="row g-3" id="editeleve">
       @csrf
  <div class="col-md-8">
  <label for="eleve_id" class="form-label">Elèves</label>
    <select name="elevef" id="eleve_id" class="form-select" >
      <option selected  value="nil" disabled>Sélectionner un éleve...</option>
    </select>
    @error('elevef')
    <span class="text-danger">{{  $message }}</span>
    @enderror
   
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Trouver les Groupes</button>
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
    <div class="special-heading">Eleve Groupes</div>
      <p>Voir la liste des groupes de l'éleve</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="egDatatable">
            <caption>Liste des Groupes</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Groupe</th>
              <th scope="col">#Nom_Groupe</th>
            </thead>
            <tbody id="tbodyEG">
              <tr>
                <td class="id_group">1</td>
                <td>aaa</td>
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

@include('footer')