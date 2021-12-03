<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Internship Project</title>
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
        <form class="row g-3" id="creategroup">
  
    <div class="col-md-12">
      <label for="group_id" class="form-label">Groupe</label>
      <select id="group_id" class="form-select"  multiple>
      </select>
    <div id="ig" style="visibility:hidden">
      
    </div>
  </div>
  <div class="col-md-6">
    <label for="ln_eleve" class="form-label" >Prénom Eleve</label>
    <input type="text" class="form-control" pattern="[a-zA-Z ]+" id="ln_eleve">
    <div id="iln" style="visibility:hidden">
    </div>
  </div>
  <div class="col-md-6">
    <label for="n_eleve" class="form-label" >Nom Eleve</label>
    <input type="text" class="form-control" pattern="[a-zA-Z ]+" id="n_eleve">
    <div id="in" style="visibility:hidden">
  </div>
  </div>
  <div class="col-md-6">
    <label for="c_eleve" class="form-label">Classe Eleve</label>
    <input type="text" class="form-control" id="c_eleve">
    <div id="ic" style="visibility:hidden">
    </div>
  </div>
  <div class="col-md-6">
    <label for="t_eleve" class="form-label" >Tel Eleve</label>
    <input type="number" class="form-control" id="t_eleve">
    <div id="it" style="visibility:hidden">
    </div>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="reservCheckss" required>
      <label class="form-check-label" for="reservCheckss">
        Cochez moi
      </label>
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
  
        <form class="row g-3" id="editgroup">
       
        <div class="col-md-12">
      <label for="group_ide" class="form-label">Groupe</label>
      <select id="group_ide" class="form-select" multiple>
      </select>
    <div id="ige" style="visibility:hidden">
      
    </div>
  </div>
  <div class="col-md-12">
      <label for="eleve_ide" class="form-label">Eleve</label>
      <select id="eleve_ide" class="form-select" required >
          <option value="nil">Selectionner un Eleve ...</option>
      </select>
    <div id="iee" style="visibility:hidden">
      
    </div>
  </div>
  <div class="col-md-6">
    <label for="ln_elevee" class="form-label" >Prénom Eleve</label>
    <input type="text" class="form-control" pattern="[a-zA-Z ]+" id="ln_elevee">
    <div id="ilne" style="visibility:hidden">
    </div>
  </div>
  <div class="col-md-6">
    <label for="n_elevee" class="form-label" >Nom Eleve</label>
    <input type="text" class="form-control" pattern="[a-zA-Z ]+" id="n_elevee">
    <div id="ine" style="visibility:hidden">
  </div>
  </div>
  <div class="col-md-6">
    <label for="c_elevee" class="form-label">Classe Eleve</label>
    <input type="text" class="form-control" id="c_elevee">
    <div id="ice" style="visibility:hidden">
    </div>
  </div>
  <div class="col-md-6">
    <label for="t_elevee" class="form-label" >Tel Eleve</label>
    <input type="number" class="form-control" id="t_elevee">
    <div id="ite" style="visibility:hidden">
    </div>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="reservChecksse" required>
      <label class="form-check-label" for="reservChecksse">
        Cochez moi
      </label>
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