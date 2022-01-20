@extends('layout/master')

@section('title','Reservations App')

@section('content')
       
<main>
<a id="button-scroll-top"></a>

<!-- Start Groupes -->
<section class="geView" id="geView">
  <div class="container-fluid">
    <div class="special-heading">Seance</div>
      <p>Seance details</p>
  <div class="row">

    <div class="col-12 col-sm-12 col-lg-8 offset-2">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">



          
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                      Seance informations #
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                     
                        <div class="card text-white bg-dark" style="width: 18rem;">
                            <div class="card-header">
                              Details
                            </div>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">Id:&nbsp; <strong>{{ $seance->id }}</strong></li>
                              <li class="list-group-item">Locataire:&nbsp;<strong>{{ $locataire->prenom_locataire }}&nbsp;{{ $locataire->nom_locataire }}</strong></li>
                              <li class="list-group-item">Date: &nbsp;<strong>{{ $seance->date }}</strong></li>
                              <li class="list-group-item">Prix Unitaire &nbsp;<strong>{{ $seance->prixUnitaire }}&nbsp;DT</strong></li>
                              <li class="list-group-item">Groupe:&nbsp;<strong>{{ $groupe->group_name }}&nbsp;DT</strong></li>
                            </ul>
                          </div>

                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                      Séances eleves #
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                     
                        

<!-- Start Products -->
<section class="GroupesTable" id="GroupeTable">
  <div class="container-fluid">
    <div class="special-heading">Seance Eleves</div>
      <p>Voir la liste des éleves du seance</p>
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
              <th scope="col">Absence</th>
            </thead>
            <tbody id="tbodyGroupes">
              @foreach ($eleves as $key => $item)
                  
              <tr>
                <td><a href="/eleves/view/{{  $item->id  }}" >{{ $item->id }}</a></td>
                <td>{{ $item->prenom_eleve }}</td>
                <td>{{ $item->nom_eleve }}</td>
                <td>{{ $item->classe }}</td>
                <td>{{ $item->tel }}</td>
                <td>{{ $item->pivot->absent }}</td>
                
              </tr>

              @endforeach
              
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


              
       </div>
      </div>
    </div> 
  </div>
              

     </div>
  </div>
 </div>
</div>
</section>
<!-- End Groupes -->




</main>

@endsection