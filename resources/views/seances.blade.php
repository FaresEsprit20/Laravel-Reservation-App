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
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
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
        <form class="row g-3" id="editseance">
       
  <div class="col-md-8">
  <label for="group_ides" class="form-label">Groupe</label>
    <select id="group_ides" class="form-select">
      <option selected  value="nil">Sélectionner un groupe...</option>
    </select>
    <div id="ige" style="visibility:hidden">
      
    </div>
  </div>
  <div class="col-md-8">
  <label for="loc_id" class="form-label">Locataire</label>
    <select id="loc_id" class="form-select">
      <option selected  value="nil">Sélectionner un locataire...</option>
    </select>
    <div id="il" style="visibility:hidden">
      
    </div>
  </div>
  <div class="col-md-8">
  <label for="hour_id" class="form-label">Heure</label>
    <input type="time" id="hour_id" class="form-control" required>
    <div id="ih" style="visibility:hidden">
      
    </div>
  </div>
  <div class="col-md-8">
  <label for="date_id" class="form-label">Date</label>
    <input type="date" id="date_id" class="form-control" required>
    <div id="id" style="visibility:hidden">
      
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
    <script src="assets/js/Seances/datatableSeances.js" ></script> 
    
    
  </body>
</html>