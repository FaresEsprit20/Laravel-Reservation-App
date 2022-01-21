@extends('layout/master')

@section('title','Reservations App')

@section('content')
       
<main>



  
<!-- Start Products -->
<section class="reservationsView" id="reservationsView">
  <div class="container-fluid">
    <div class="special-heading">Réservations</div>
      <p>Voir les Réservations par location</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="reservationsDatatable">
            <caption>Liste des Réservations par location</caption>
            <thead class="table-dark">
              <th scope="col">#id_reserv</th>
              <th scope="col">#id_loc</th>
              <th scope="col">#id_locataire</th>
              <th scope="col">#Nom_salle</th>
              <th scope="col">#Nom groupe</th>
              <th scope="col">CIN Locataire</th>
              <th scope="col">Nom & Prenom</th>
              <th scope="col">Ville</th>
              <th scope="col">Email</th>
              <th scope="col">Portable</th>
              <th scope="col">Date début Location</th>
              <th scope="col">Date fin Location</th>
              <th scope="col">Action</th>
              
            </thead>
            <tbody id="tbodyReservations">
              
              @foreach ($reservations as $key => $item)
                 
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->location_id }}</td>
                <td>{{ $item->locataire_id }}</td>
                <td>{{ $item->location_name }}</td>
                <td>{{ $item->nom_groupe }}</td>
                <td>{{ $item->cin }}</td>
                <td>{{ $item->ville }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->tel }}</td>
                <td>{{ $item->datetimedeb }}</td>
                <td>{{ $item->datetimefin }}</td>
                <td><div><button id="btnDelete" style="display:block;width:65px;margin-bottom:5px;" type="button" class="btn btn-info">Del</button><button style="display:block;width:65px;" id="btnArchv"type="button" class="btn btn-dark">Archv</button></div></td>
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
</main>

@endsection