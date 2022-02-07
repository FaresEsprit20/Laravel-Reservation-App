@extends('layout/master')

@section('title','Reservations App')


@section('content')

<main>
  <!-- Start Landing Section -->
<section class="landing" id="landing">

</section>
<!-- End Landing Section -->
<!-- Start Features Section -->
<!-- Start Features Section -->
<section class="features" id="features">
  <div class="container-fluid">
    <h2 class="special-heading">Fonctionnalités</h2>
      <p>Ce que nous offrons</p>
      <div class="row">
<div class="col-12  col-lg-4 col-sm-12">
<div class="feat">
  <i class="fa fa-mobile-phone fa-3x"></i>
<h3>Mobile First App</h3>
<p>Application responsive et adaptée aux terminaux mobiles. Cette application offre une meilleure expérience utilisateur et elle est trés facile a utiliser.</p>
</div>
</div>
<div class="col-12  col-lg-4 col-sm-12">
<div class="feat">
  <i class="fa fa-product-hunt fa-3x"></i>
<h3>Effectuer et Suivre les réservations</h3>
<p>Nous vous proposons une plateforme de réservation et de suivie chaque jour et chaque heure avec un simple click!</p>
</div>
</div>
<div class="col-12  col-lg-4 col-sm-12">
<div class="feat">
  <i class="fa fa-pie-chart fa-3x"></i>
<h3>Statistiques Réservations Dashboard</h3>
<p>Vous pouvez suivre les réservations grâce à nos superbes chartes graphiques et tableaux de bord que nous vous proposons pour un meilleur service.</p>
</div>
</div>
</div>
      
  </div>
</section>
<!-- End Features Section -->
<!-- Start Products -->
<section class="reservationsstats" id="reservationsstats">
<div class="container-fluid">
  <div class="special-heading">Réservations</div>
    <p>Statistiques des réservations</p>
<div class="row">
<div class="col col-sm col-lg-2">
</div>
 
<div class="col-12 col-sm-12 col-lg-8">  
    <div class="reservations-table mt-5 mb-5">
 
 
    <ul class="list-group">

      <li class="list-group-item d-flex justify-content-between align-items-start list-group-item-action">
        <div class="ms-2 me-auto">
          <div class="fw-bold text-secondary">Active Seances</div>
          Nombre de seances
        </div>
        <span style="width:34px;" id="loc" class="badge bg-primary rounded-pill text-center">{{ $IndexedSeances }}</span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-start list-group-item-action">
        <div class="ms-2 me-auto ">
          <div class="fw-bold text-secondary">Seances</div>
          Nombre de seances archivées
        </div>
        <span style="width:34px;" id="locarchv" class="badge bg-primary rounded-pill text-center">{{ $IndexedSeancesarchv }}</span>
      </li>

<li class="list-group-item d-flex justify-content-between align-items-start list-group-item-action">
  <div class="ms-2 me-auto">
    <div class="fw-bold text-secondary">Active Professeurs</div>
    Nombre de locataires
  </div>
  <span style="width:34px;" id="loc" class="badge bg-primary rounded-pill text-center">{{ $IndexedLocataires }}</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-start list-group-item-action">
  <div class="ms-2 me-auto ">
    <div class="fw-bold text-secondary">Professeurs</div>
    Nombre de locataires archivés
  </div>
  <span style="width:34px;" id="locarchv" class="badge bg-primary rounded-pill text-center">{{ $IndexedSeancesarchv }}</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-start list-group-item-action">
  <div class="ms-2 me-auto">
    <div class="fw-bold text-secondary">Active Eleves</div>
    Nombre de eleves
  </div>
  <span style="width:34px;" id="loc" class="badge bg-primary rounded-pill text-center">{{ $IndexedEleves }}</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-start list-group-item-action">
  <div class="ms-2 me-auto ">
    <div class="fw-bold text-secondary">Eleves</div>
    Nombre de eleves archivés
  </div>
  <span style="width:34px;" id="locarchv" class="badge bg-primary rounded-pill text-center">{{ $IndexedElevesarchv }}</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-start list-group-item-action">
  <div class="ms-2 me-auto">
    <div class="fw-bold text-secondary">Active Groupes</div>
    Nombre de groupes
  </div>
  <span style="width:34px;" id="grp" class="badge bg-primary rounded-pill text-center">{{ $IndexedGroupes }}</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-start list-group-item-action">
  <div class="ms-2 me-auto">
    <div class="fw-bold text-secondary" >Groupes</div>
    Nombre de groupes archivés
  </div>
  <span style="width:34px;" id="grparchv" class="badge bg-primary rounded-pill text-center">{{ $IndexedGroupesarchv }}</span>
</li>

</ul>
  </div>
</div>

<div class="col col-sm col-lg-2">
</div>
<!--End Row -->
</div>

</section>



<!-- End Products -->
<!-- Start Stats -->
<!--
<section class="stats" id="stats">
  <div class="container-fluid">
    <h2 class="special-heading">Statistiques</h2>
      <p>Suivre les statistiques journalières</p>
      <div class="row">
      <div class="col col-lg-2 col-sm-1">
      </div>
      <div class="col-12 col-lg-8 col-sm-10">
        <div class="stat">
     <canvas id="myChartOne"></canvas>
     </div>
    </div>
    <div class="col col-lg-2 col-sm-1">
      </div>
      </div>
      <div class="row">
      <div class="col col-lg-2 col-sm-1">
      </div>
      <div class="col-12 col-lg-8 col-sm-10">
        <div class="stat">
          <select id="selectlignes">
          </select>
     <canvas id="myChartTwo"></canvas>
     </div>
    </div>
    <div class="col col-lg-2 col-sm-1">
      </div>
      </div>
      
      <div class="row">
      <div class="col col-lg-2 col-sm-1">
      </div>
      <div class="col-12 col-lg-8 col-sm-10">
        <div class="stat">
          <select id="selectligness">
          </select>
     <canvas id="myChartThree" height="200px"></canvas>
     </div>
    </div>
    <div class="col col-lg-2 col-sm-1">
      </div>
      </div>
      <div class="row">
      <div class="col col-lg-2 col-sm-1">
      </div>
      <div class="col-12 col-lg-8 col-sm-10">
        <div class="stat">
          <select id="selectlignesbar">
          </select>
     <canvas id="myChartFour" height="250px"></canvas>
     </div>
    </div>
    <div class="col col-lg-2 col-sm-1">
      </div>
      </div>
      
      
  </div>
</section>
-->
<!-- End Stats -->
</div>
</main>

@endsection






