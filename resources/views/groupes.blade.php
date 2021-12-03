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
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
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
    <div class="special-heading">Groupes</div>
      <p>Créer un groupe</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
        <form class="row g-3" id="creategroup">
       
  <div class="col-md-8">
    <label for="nom_groupe" class="form-label">Nom Groupe</label>
    <input type="text" class="form-control" id="nom_groupe">
    <div id="is" style="visibility:hidden">
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
  
        <form class="row g-3" id="editgroup">
       
  <div class="col-md-8">
  <label for="group_id" class="form-label">Groupe</label>
    <select id="group_id" class="form-select" required>
      <option selected  value="nil">Sélectionner un groupe...</option>
    </select>
    <div id="ig" style="visibility:hidden">
      
    </div>
  </div>
  <div class="col-md-8">
    <label for="group_name" class="form-label">Nom Groupe</label>
    <input type="text" class="form-control" id="group_name">
    <div id="iss" style="visibility:hidden">
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="reservChecks" required>
      <label class="form-check-label" for="reservChecks">
        Cochez moi
      </label>
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
      <p>Trouver les élèves d'un groupe</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
        <form class="row g-3" id="editeleve">
       
  <div class="col-md-8">
  <label for="eleve_id" class="form-label">Elèves</label>
    <select id="eleve_id" class="form-select" required>
      <option selected  value="nil">Sélectionner un éleve...</option>
    </select>
    <div id="ie" style="visibility:hidden">
      
    </div>
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
<x-bootstrapdt />   
    <script src="assets/js/Groupes/datatableGroupes.js" ></script> 

  </body>
</html>