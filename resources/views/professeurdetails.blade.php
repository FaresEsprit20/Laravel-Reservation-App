@extends('layout/master')

@section('title','Reservations App')


@section('content')
       
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
  
        <form action="{{ route('create.professeur') }}" method="POST" class="row g-3" id="createens">
       @csrf
  <div class="col-md-4">
    <label for="nom_ens" class="form-label">Nom Enseignant</label>
    <input name="nom" type="text" class="form-control" id="nom_ens">
    @error('nom')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="prenom_ens" class="form-label">Prénom Enseignant</label>
    <input name="prenom" type="text" class="form-control" id="prenom_ens">
    @error('prenom')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="cin_ens" class="form-label">CIN Enseignant</label>
    <input name="cin" type="number" class="form-control" id="cin_ens">
    @error('cin')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="ville_ens" class="form-label">Ville</label>
    <input name="ville" type="text" class="form-control" id="ville_ens">
    @error('ville')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="rue_ens" class="form-label">Rue</label>
    <input name="rue" type="text" class="form-control" id="rue_ens" >
    @error('rue')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="postal_ens" class="form-label">Code Postal</label>
    <input name="postal" type="number" max="9999" class="form-control" id="postal_ens">
    @error('postal')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="col-md-4">
    <label for="email_ens" class="form-label">Email Enseignant</label>
    <input name="email" type="email" class="form-control" id="email_ens">
    @error('email')
    <span class="text-danger">{{ $message }}</span>
    @enderror

  </div>
  <div class="col-md-4">
    <label for="tel_ens" class="form-label">Tel Enseignant</label>
    <input name="tel" type="number" class="form-control" id="tel_ens" >
    @error('tel')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  <div class="col-12">
    <div class="form-check">
      <input name="chk" class="form-check-input" type="checkbox" id="reservCheck">
      <label class="form-check-label" for="reservCheck">
        Cochez moi
      </label>
      @error('chk')
      <span class="text-danger">{{ $message }}</span>
      @enderror
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
              <th scope="col">Action</th>
              
            </thead>
            <tbody id="tbodyEns">
             
              @foreach ($locataires as $key => $item)
                
              <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nom_locataire }}</td>
                <td>{{ $item->prenom_locataire }}</td>
                <td>{{ $item->cin }}</td>
                <td>{{ $item->ville }}</td>
                <td>{{ $item->rue }}</td>
                <td>{{ $item->codepostal }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->tel }}</td>
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
</main>

@endsection