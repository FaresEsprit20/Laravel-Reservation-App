@include('head')
       
<main>
<a id="button-scroll-top"></a>
<!-- Modal -->
<div class="modal fade" id="reservmodalerr" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Erreur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Votre Réservation n'a pas été crée car la Salle est déja reservée a cette date !
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">OK!</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Modal -->
<!-- Start Reservation -->
<section class="reservations" id="reservations">
  <div class="container-fluid">
    <div class="special-heading">Réservations</div>
      <p>Créer une réservation</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5 pt-5 pb-5">
        <div class="table-reservations">
  
        <form class="row g-3" id="createreservation">
        <div class="col-md-10">
    <label for="inputSalle" class="form-label">Choisir Salle</label>
    <select id="inputSalle" class="form-select" required>
      <option selected  value="nil">Salle...</option>
    </select>
    <div id="is" style="visibility:hidden">
      
    </div>
  </div>
  <div class="col-md-3">
    <label for="inputHeure" class="form-label">Début de réservation</label>
    <input type="time" id="inputHeure" class="form-control" required>
    <div id="ih" style="visibility:hidden">
      
    </div>
  </div>
  <div class="col-md-3">
  <label for="inputJour" style="visibility:hidden" class="form-label">Début de réservation</label>
    <select id="inputJour" class="form-select" required>
      <option selected  value="nil">Jour...</option>
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
    <div id="ij" style="visibility:hidden">
      
    </div>
  </div>
  <div class="col-md-3">
  <label for="inputMois" style="visibility:hidden" class="form-label">Début de réservation</label>
    <select id="inputMois" class="form-select" required>
      <option selected  value="nil">Mois...</option>
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
    <div id="im" style="visibility:hidden">
      
    </div>
  </div>
  <div class="col-md-3">
  <label for="inputAndeb" style="visibility:hidden" class="form-label">Début de réservation</label>
    <select id="inputAndeb" class="form-select" required>
      <option selected  value="nil">An début...</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
      <option value="2023">2023</option>
      <option value="2024">2024</option>  
    </select>
    <div id="ia" style="visibility:hidden">
      
    </div>
  </div>
  <!-- Partie Fin de Réservation -->
  <div class="col-md-3">
    <label for="inputHeureFin" class="form-label">Fin de réservation</label>
    <input type="time" id="inputHeureFin" class="form-control" required>
    <div id="ihf" style="visibility:hidden">
      
    </div>
  </div>
  <div class="col-md-3">
  <label for="inputJourFin" style="visibility:hidden" class="form-label">Fin de réservation</label>
    <select id="inputJourFin" class="form-select"required>
      <option selected  value="nil" >Jour...</option>
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
    <div id="ijf" style="visibility:hidden">
      
    </div>
  </div>
  <div class="col-md-3">
  <label for="inputMoisFin" style="visibility:hidden" class="form-label">Fin de réservation</label>
    <select id="inputMoisFin" class="form-select">
      <option selected  value="nil" required>Mois...</option>
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
    <div id="imf" style="visibility:hidden">
      
    </div>
  </div>
  <div class="col-md-3">
  <label for="inputAnFin" style="visibility:hidden" class="form-label">Fin de réservation</label>
    <select id="inputAnFin" class="form-select" required>
      <option selected  value="nil">An Fin...</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
      <option value="2023">2023</option>
      <option value="2024">2024</option>  
    </select>
    <div id="iaf" style="visibility:hidden">
      
    </div>
  </div>
<!-- Fin Partie Fin de Réservation -->
<div class="col-md-6">
  <label for="inputens" class="form-label">Enseignant</label>
    <select id="inputens" class="form-select" required>
      <option selected value="nil">Sélectionner un Enseignant...</option>
    </select>
    <div id="iens" style="visibility:hidden">
      
    </div>
  </div>
  <div class="col-md-6">
  <label for="inputreservgroup" class="form-label">Groupe</label>
    <select id="inputreservgroup" class="form-select" required>
      <option selected  value="nil">Sélectionner un groupe...</option>
    </select>
    <div id="igrp" style="visibility:hidden">
      
    </div>
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
<!-- Modal -->
<div class="modal fade" id="reservmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Succés</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Votre Réservation a été crée avec Succés!
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
              <th scope="col">Heure début</th>
              <th scope="col">Heure fin</th>
              <th scope="col">Action</th>
              
            </thead>
            <tbody id="tbodyReservations">
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><div><button id="btnDelete" style="display:block;width:65px;margin-bottom:5px;" type="button" class="btn btn-info">Del</button><button style="display:block;width:65px;" id="btnArchv"type="button" class="btn btn-dark">Archv</button></div></td>
              </tr>
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

@include('footer')