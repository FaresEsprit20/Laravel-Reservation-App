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
<!-- Start Professeur -->
<section class="ensView" id="ensView">
  <div class="container-fluid">
    <div class="special-heading">Enseignant</div>
      <p>Créer un Enseignant</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
        <form class="row g-3" id="createens">
       
  <div class="col-md-4">
    <label for="nom_ens" class="form-label">Nom Enseignant</label>
    <input type="text" class="form-control" id="nom_ens" pattern="[a-zA-Z ]+">
    <div id="enom" style="visibility:hidden">
      
      </div>
  </div>
  <div class="col-md-4">
    <label for="prenom_ens" class="form-label">Prénom Enseignant</label>
    <input type="text" class="form-control" id="prenom_ens" pattern="[a-zA-Z ]+">
    <div id="eprenom" style="visibility:hidden">
      
      </div>
  </div>
  <div class="col-md-4">
    <label for="cin_ens" class="form-label">CIN Enseignant</label>
    <input type="number" class="form-control" max="99999999" id="cin_ens">
    <div id="ecin" style="visibility:hidden">
      
      </div>
  </div>
  <div class="col-md-4">
    <label for="ville_ens" class="form-label">Ville</label>
    <input type="text" class="form-control" id="ville_ens" pattern="[a-zA-Z ]+">
    <div id="eville" style="visibility:hidden">
      
      </div>
  </div>
  <div class="col-md-4">
    <label for="rue_ens" class="form-label">Rue</label>
    <input type="text" class="form-control" id="rue_ens" >
    <div id="erue" style="visibility:hidden">
      
      </div>
  </div>
  <div class="col-md-4">
    <label for="postal_ens" class="form-label">Code Postal</label>
    <input type="number" max="9999" class="form-control" id="postal_ens" minlength="4" maxlength="4">
    <div id="epostal" style="visibility:hidden">
      
      </div>
  </div>
  <div class="col-md-4">
    <label for="email_ens" class="form-label">Email Enseignant</label>
    <input type="email" class="form-control" id="email_ens" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}">
    <div id="eemail" style="visibility:hidden">
      
      </div>
  </div>
  <div class="col-md-4">
    <label for="tel_ens" class="form-label">Tel Enseignant</label>
    <input type="number" class="form-control" id="tel_ens" >
    <div id="etel" style="visibility:hidden">
      
      </div>
  </div>
  <div class="col-md-4">
    <label for="portable_ens" class="form-label">Portable Enseignant</label>
    <input type="number" class="form-control" id="portable_ens">
    <div id="eprotable" style="visibility:hidden">
      
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
    <button type="submit" class="btn btn-dark">Créer Enseignant</button>
  </div>
</form>
        </div>
    </div>
  </div>
  <div class="col col-sm col-lg-2">
  </div>
  </div>
 
</section>
<!-- End Professseur -->
<!-- Start Products -->
<section class="reservationsView" id="reservationsView">
  <div class="container-fluid">
    <div class="special-heading">Enseignants</div>
      <p>Voir les Enseignants</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="reservationsDatatable">
            <caption>Liste des Enseignants</caption>
            <thead class="table-dark">
              <th scope="col">#id_ens</th>
              <th scope="col">#Nom</th>
              <th scope="col">#Prénom</th>
              <th scope="col">CIN</th>
              <th scope="col">Ville</th>
              <th scope="col">Rue</th>
              <th scope="col">Code Postal</th>
              <th scope="col">Email</th>
              <th scope="col">Tel</th>
              <th scope="col">Portable</th>
              <th scope="col">Action</th>
              
            </thead>
            <tbody id="tbodyEns">
              
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
   <x-bootsrapdt />
    <script src="assets/js/Locataires/datatableLocataires.js" ></script> 
    
    
  </body>
</html>