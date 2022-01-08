@extends('layout/master')

@section('title','Reservations App')


@section('content')
       
<main>
<a id="button-scroll-top"></a>

<!-- Start Reservation -->
<section class="reservations" id="reservations">
  <div class="container-fluid">
    <div class="special-heading">Réservations</div>
      <p>Créer une réservation</p>
  <div class="row">

    <div class="col-12 col-sm-12 col-lg-8 offset-3">
      
      <div class="products-table mt-5 mb-5 pt-5 pb-5">
        <div class="table-reservations">
  
    <form action="{{ route('create.reservation') }}" method="POST" class="row g-3" id="createreservation">
      @csrf
      <div class="col-md-8">
        <label for="loca_id" class="form-label">Salle</label>
          <select name="location" id="loca_id" class="form-select">
            <option  disabled value="nil">Sélectionner une salle...</option>
            @foreach ( $locations as $key => $item)
      
            <option  value="{{ $item->id }}">{{ $item->location_name }}</option>              
            @endforeach
          </select>
          @error('location')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-md-8">
          <label for="hour_id" class="form-label">Heure début</label>
            <input name="heuredeb" type="time" id="hour_id" class="form-control">
            @error('heuredeb')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
  </div>
  <div class="col-md-8">
    <label for="inputJour"  class="form-label">Début de réservation</label>
     <select name="jourdeb" id="inputJour" class="form-select">
       <option selected  disabled value="nil">Jour...</option>
           <option value="01">1</option>
           <option value="02">2</option>
           <option value="03">3</option>
           <option value="04">4</option>
           <option value="05">5</option>
           <option value="06">6</option>
           <option value="07">7</option>
           <option value="08">9</option>
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
           <option value="13">13</option>
           <option value="14">14</option>
           <option value="15">15</option>
           <option value="16">16</option>
           <option value="17">17</option>
           <option value="18">18</option>
           <option value="19">19</option>
           <option value="20">20</option>
           <option value="21">21</option>
           <option value="22">22</option>
           <option value="23">23</option>
           <option value="24">24</option>
           <option value="25">25</option>
           <option value="26">26</option>
           <option value="27">27</option>
           <option value="28">28</option>
           <option value="29">29</option>
           <option value="30">30</option>
           <option value="31">31</option>
     </select>
     @error('jourdeb')
     <span class="text-danger">{{ $message }}</span>
     @enderror
   </div>
   <div class="col-md-8">
    <label for="inputMois" style="visibility:hidden" class="form-label">Début de réservation</label>
      <select name="moisdeb" id="inputMois" class="form-select">
        <option selected disabled value="nil">Mois...</option>
            <option value="01">Janvier</option>
            <option value="02">Février</option>
            <option value="03">Mars</option>
            <option value="04">Avril</option>
            <option value="05">Mai</option>
            <option value="06">Juin</option>
            <option value="07">Juillet</option>
            <option value="08">Aout</option>
            <option value="09">Séptembre</option>
            <option value="10">Octobre</option>
            <option value="11">Novembre</option>
            <option value="12">Décembre</option>
      </select>
      @error('moisdeb')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-md-8">
      <label for="inputAndeb" style="visibility:hidden" class="form-label">Début de réservation</label>
        <select name="andeb" id="inputAndeb" class="form-select">
          <option selected disabled value="nil">An début...</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>  
          <option value="2024">2025</option>  
          <option value="2024">2026</option>  
          <option value="2024">2027</option>  
          <option value="2024">2028</option>  
        </select>
        @error('andeb')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
  <!-- Partie Fin de Réservation -->
  <div class="col-md-8">
    <label for="hour_ids" class="form-label">Heure Fin</label>
      <input name="heurefin" type="time" id="hour_ids" class="form-control" >
      @error('heurefin')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="col-md-8">
      <label for="inputJourFin" class="form-label">Fin de réservation</label>
        <select name="jourfin" id="inputJourFin" class="form-select">
          <option selected  disabled value="nil">Jour...</option>
              <option value="01">1</option>
              <option value="02">2</option>
              <option value="03">3</option>
              <option value="04">4</option>
              <option value="05">5</option>
              <option value="06">6</option>
              <option value="07">7</option>
              <option value="08">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
        </select>
        @error('jourfin')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-8">
      <label for="inputMoisFin" style="visibility:hidden" class="form-label">Fin de réservation</label>
        <select name="moisfin" id="inputMoisFin" class="form-select">
          <option selected disabled value="nil">Mois...</option>
              <option value="01">Janvier</option>
              <option value="02">Février</option>
              <option value="03">Mars</option>
              <option value="04">Avril</option>
              <option value="05">Mai</option>
              <option value="06">Juin</option>
              <option value="07">Juillet</option>
              <option value="08">Aout</option>
              <option value="09">Séptembre</option>
              <option value="10">Octobre</option>
              <option value="11">Novembre</option>
              <option value="12">Décembre</option>
        </select>
        @error('moisfin')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-md-8">
      <label for="inputAnFin" style="visibility:hidden" class="form-label">Fin de réservation</label>
        <select name="anfin" id="inputAnFin" class="form-select">
          <option selected disabled value="nil">An fin...</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>  
          <option value="2024">2025</option>  
          <option value="2024">2026</option>  
          <option value="2024">2027</option>  
          <option value="2024">2028</option>  
        </select>
        @error('anfin')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>


<!-- Fin Partie Fin de Réservation -->
<div class="col-md-8">
  <label for="loc_id" class="form-label">Enseignant</label>
    <select name="locataire" id="loc_id" class="form-select">
      <option selected disabled value="nil">Sélectionner un locataire...</option>
      @foreach ($locataires as $key => $item)

      <option  value="{{ $item->id }}">{{ $item->prenom_locataire }}<br>{{ $item->nom_locataire }}</option>              
      @endforeach
    </select>
    @error('locataire')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-8">
    <label for="group_ides" class="form-label">Groupe</label>
      <select name="groupe" id="group_ides" class="form-select">
        <option selected  disabled value="nil">Sélectionner un groupe...</option>
        @foreach ($groupes as $key => $item)
  
        <option value="{{ $item->id }}">{{ $item->group_name }}</option>              
        @endforeach
      </select>
      @error('groupe')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-12">

        @error('dha')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        @error('dhf')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

  <div class="col-12">
    <div class="form-check">
      <input name="chks" class="form-check-input" type="checkbox" id="reservChecks">
      <label class="form-check-label" for="reservChecks">
        Cochez moi
      </label>
      @error('chks')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Confirmer Réservation</button>
  </div>
</form>
      
        </div>
    </div>
 
  </div>
 
</section>
<!-- End Reservation-->

  
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
              <th scope="col">Date début Location</th>
              <th scope="col">Date fin Location</th>
              <th scope="col">Action</th>
              
            </thead>
            <tbody id="tbodyReservations">
              
              @foreach ($reservations as $key => $item)
                 
              <tr>
                <td><a href="/reservations/view/{{  $item->id  }}" class="stretched-link">{{ $item->id }}</a></td>
                <td><a href="/locations/view/{{  $item->location_id  }}" class="stretched-link">{{ $item->location_id }}</a></td>
                <td><a href="/professeurs/view/{{  $item->locataire_id  }}" class="stretched-link">{{ $item->locataire_id }}</a></td>
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