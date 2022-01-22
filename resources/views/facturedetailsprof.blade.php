@extends('layout/master')

@section('title','Reservations App')

@section('content')
       
<main>


<!-- Start Groupes -->
<section class="geView" id="geView">
  <div class="container-fluid">
    <div class="special-heading">Facture</div>
      <p>Facture details</p>
  <div class="row">

    <div class="col-12 col-sm-12 col-lg-8 offset-2">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
          
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                      Facture informations #
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                     
                        <div class="card text-white bg-dark" style="width: 18rem;">
                            <div class="card-header">
                              Details
                            </div>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">Id:&nbsp; <strong>{{ $facture->id }}</strong></li>
                              <li class="list-group-item">Prix Total des séances:&nbsp;<strong>{{ $facture->prixtotalseances }}&nbsp;DT</strong></li>
                              <li class="list-group-item">Date début: &nbsp;<strong>{{ $facture->datedeb }}</strong></li>
                              <li class="list-group-item">Date fin: &nbsp;<strong>{{ $facture->datefin }}</strong></li>
                              <li class="list-group-item">Payé &nbsp;<strong>{{ $facture->paid }}&nbsp;DT</strong></li>
                              <li class="list-group-item">Montant restant:&nbsp;<strong>{{ $facture->topay }}&nbsp;DT</strong></li>
                            </ul>
                          </div>

                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                      Séances factures #
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                     
                        
<!-- Start Products -->
<section class="SeancesTable" id="SeancesTable">
    <div class="container-fluid">
      <div class="special-heading">Séances du facture</div>
        <p>Voir la liste des séances du facture</p>
    <div class="row">

      <div class="col-12 col-sm-12 col-lg-10 offset-2">
        
        <div class="locataires-table mt-5 mb-5">
          <div class="table-responsive">
            <table class="table display" id="seancesfacturesDatatable">
              <caption>Liste des Séances de l'enseignant</caption>
              <thead class="table-dark">
                <th scope="col">#Id_Seance</th>
                <th scope="col">#Date</th>
                <th scope="col">#Heure</th>
                <th scope="col">#prix unitaire</th>
                <th scope="col">#montant payé</th>
                <th scope="col">#Présence</th>
              </thead>
              <tbody id="tbodySeances">
                @foreach ($seanceslocataires as $key => $item)
                <tr>
                  <td><a href="/seances/view/{{  $item->seance_id  }}">{{ $item->seance_id }}</a></td>
                  <td>{{ $item->date }}</td>
                  <td>{{ $item->heure }}</td>
                  <td>{{ $item->prixUnitaire }}</td>
                  <td>{{ $item->payement }}</td>
                  <td>@if ( $item->absent == 0)
                      Présent
                  @else
                      Absent
                  @endif
                 </td>
                </tr>
                @endforeach
               
              </tbody>
            </table>
        
          </div>
      </div>
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

<script>
  $("#seancesfacturesDatatable").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','pageLength'
        ]
    });
</script>