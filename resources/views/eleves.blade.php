<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reservations Project</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
          <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    
    <body>
        <a id="button-scroll-top"></a>
        <header>
            <x-header />
</header>
       
<main>
<a id="button-scroll-top"></a>
<!-- Start Groupes -->
<section class="gView" id="gView">
  <div class="container-fluid">
    <div class="special-heading">Elèves</div>
      <p>Créer un élève</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
        <form class="row g-3" id="creategroup" action="{{ route('create.eleve') }}" method="POST" name="createEleve">
     @csrf
    <div class="col-md-12">
      <label for="group_id" class="form-label">Groupes</label>
      <select id="group_id" name="groupes" class="form-select"  multiple>
      </select>
      @error('groupes')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="col-md-6">
    <label for="ln_eleve" class="form-label" >Prénom Eleve</label>
    <input type="text" name="prenom" class="form-control"  id="ln_eleve">
    @error('prenom')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    
  </div>
  <div class="col-md-6">
    <label for="n_eleve" class="form-label" >Nom Eleve</label>
    <input type="text" name="nom" class="form-control"  id="n_eleve">
    @error('nom')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-6">
    <label for="c_eleve" class="form-label">Classe Eleve</label>
    <input type="text" name="classe" class="form-control" id="c_eleve">
    @error('classe')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-6">
    <label for="t_eleve" class="form-label" >Tel Eleve</label>
    <input type="number" name="tel" class="form-control" id="t_eleve">
    @error('tel')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" name="chk" type="checkbox" id="reservCheckss">
      <label class="form-check-label" for="reservCheckss">
        Cochez moi
      </label>
      @error('chk')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Créer Elève</button>
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
    <div class="special-heading">Eleves</div>
      <p>Modifier un eleve</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
        <form action="{{ route('update.eleve') }}" method="POST" class="row g-3" id="editgroup" name="updateEleve">
          @method('PUT')
          @csrf
        <div class="col-md-12">
      <label for="group_ide" class="form-label">Groupes</label>
      <select name="groupesu" id="group_ide" class="form-select" multiple>
      </select>
      @error('groupesu')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="col-md-12">
      <label for="eleve_ide" class="form-label">Eleve</label>
      <select name="eleve" id="eleve_ide" class="form-select"  >
          <option value="nil" disabled>Selectionner un Eleve ...</option>
      </select>
      @error('eleve')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="col-md-6">
    <label for="ln_elevee" class="form-label" >Prénom Eleve</label>
    <input type="text" name="prenomu" class="form-control" pattern="[a-zA-Z ]+" id="ln_elevee">
    @error('prenomu')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="col-md-6">
    <label for="n_elevee" class="form-label" >Nom Eleve</label>
    <input type="text" name="nomu" class="form-control" pattern="[a-zA-Z ]+" id="n_elevee">
    @error('nomu')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="col-md-6">
    <label for="c_elevee" class="form-label">Classe Eleve</label>
    <input type="text" name="classeu" class="form-control" id="c_elevee">
    @error('classeu')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="col-md-6">
    <label for="t_elevee" class="form-label" >Tel Eleve</label>
    <input type="number" name="telu" class="form-control" id="t_elevee">
    @error('telu')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" name="chk" type="checkbox" id="reservChecksse" >
      <label class="form-check-label" for="reservChecksse">
        Cochez moi
      </label>
      @error('chku')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Modifier Elève</button>
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
       Votre Elève a été crée avec Succés!
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
      <p>Voir la liste des éleves</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="eleDatatable">
            <caption>Liste des Eleves</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Eleve</th>
              <th scope="col">#Prenom_Eleve</th>
              <th scope="col">#NomEleve</th>
              <th scope="col">#Classe</th>
              <th scope="col">#Tel</th>
              <th scope="col">Action</th>
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
</main>
<footer>
    <div class="bg-light">
        <div class="container">
          <div class="row pt-4 pb-3">
            <div class="col">
              <ul class="list-inline text-center">
                <li class="list-inline-item"><a href="#">À propos</a></li>
                <li class="list-inline-item">&middot;</li>
                <li class="list-inline-item"><a href="#">Vie privée</a></li>
                <li class="list-inline-item">&middot;</li>
                <li class="list-inline-item"><a href="#">Conditions d'utilisations</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
</footer>
 <!-- Popper.js first, then Bootstrap JS -->
 <x-bootstrap-dt />
    <script src="assets/js/Eleves/datatableEleves.js" ></script> 
   
  </body>
</html>