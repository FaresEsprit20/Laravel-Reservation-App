@extends('layout/master')

@section('title','Reservations App')


@section('content')

<main>
  
  <!-- Start Reservation -->
  <section class="reservations" id="reservations">
    <div class="container-fluid">
      <div class="special-heading">Suite Vides</div>
        <p>Choisir la date de début et de fin pour chercher les suites vides</p>
    <div class="row">
    <div class="col col-sm col-lg-2">
    </div>
      <div class="col-12 col-sm-12 col-lg-8">
        
        <div class="products-table mt-5 mb-5 pt-5 pb-5">
          <div class="table-reservations">
    
   <form action="{{ route('suitesvides.list.get') }}" method="POST" class="row g-3" id="createloc">
     @csrf
     <div class="col-md-4">
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
    <div class="col-md-4">
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
    <div class="col-md-4">
    <label for="inputAndeb" style="visibility:hidden" class="form-label">Début de réservation</label>
      <select name="andeb" id="inputAndeb" class="form-select">
        <option selected disabled value="nil">An début...</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>  
      </select>
      @error('andeb')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-md-9">
    <label for="hour_id" class="form-label">Heure</label>
      <input name="heuredeb" type="time" id="hour_id" class="form-control" >
      @error('heuredeb')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <!-- Partie Fin de Réservation -->
    
    <div class="col-md-4">
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
    <div class="col-md-4">
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
    <div class="col-md-4">
    <label for="inputAnFin" style="visibility:hidden" class="form-label">Fin de réservation</label>
      <select name="anfin" id="inputAnFin" class="form-select">
        <option selected disabled value="nil">An début...</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>  
      </select>
      @error('anfin')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-md-9">
    <label for="hour_ids" class="form-label">Heure Fin</label>
      <input name="heurefin" type="time" id="hour_ids" class="form-control" >
      @error('heurefin')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  <!-- Fin Partie Fin de Réservation -->
    
  <div class="col-md-8">
    <div style="visibility: hidden">
    <label  class="form-label">Date Début</label>
      <input type="text"  >
    </div>
      @error('datedeb')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

  <div class="col-md-8">
    <div style="visibility: hidden">
    <label class="form-label">Datefin</label>
      <input type="text"  >
    </div>
      @error('datefin')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="col-12">
      <div class="form-check">
        <input name="chks" class="form-check-input" type="checkbox" id="reservCheck" >
        <label class="form-check-label" for="reservCheck">
          Cochez moi
        </label>
        @error('chk')
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
    <div class="col col-sm col-lg-2">
    </div>
    </div>
   
  </section>
  <!-- End Reservation-->

  
  </main>
  
  

@endsection
       
