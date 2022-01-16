@extends('layout/master')

@section('title','Reservations App')


@section('content')
       
<main>
<a id="button-scroll-top"></a>
<!-- Start Professeur -->
<section class="ensView" id="ensView">
  <div class="container-fluid">
    <div class="special-heading">Enseignant</div>
      <p>Modifier un Enseignant</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
        <form action="{{ route('update.professeur') }}" method="POST" class="row g-3" id="createens">
       @csrf
       @method('PUT')
  <div class="col-md-4">
    <label for="nom_ens" class="form-label">Nom Enseignant</label>
    <input name="nom" value="{{ $locataire->nom_locataire }}" type="text" class="form-control" id="nom_ens">
    @error('nom')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="prenom_ens" class="form-label">Prénom Enseignant</label>
    <input name="prenom" value="{{ $locataire->prenom_locataire }}" type="text" class="form-control" id="prenom_ens">
    @error('prenom')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="cin_ens" class="form-label">CIN Enseignant</label>
    <input name="cin" value="{{ $locataire->cin }}" type="number" class="form-control" id="cin_ens">
    @error('cin')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="ville_ens" class="form-label">Ville</label>
    <input name="ville" value="{{ $locataire->ville }}" type="text" class="form-control" id="ville_ens">
    @error('ville')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="rue_ens" class="form-label">Rue</label>
    <input name="rue" value="{{ $locataire->ville }}" type="text" class="form-control" id="rue_ens" >
    @error('rue')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-4">
    <label for="postal_ens" class="form-label">Code Postal</label>
    <input name="postal" value="{{ $locataire->codepostal }}" type="number" max="9999" class="form-control" id="postal_ens">
    @error('postal')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="col-md-4">
    <label for="email_ens" class="form-label">Email Enseignant</label>
    <input name="email" value="{{ $locataire->email }}" type="email" class="form-control" id="email_ens">
    @error('email')
    <span class="text-danger">{{ $message }}</span>
    @enderror

  </div>
  <div class="col-md-4">
    <label for="tel_ens" class="form-label">Tel Enseignant</label>
    <input name="tel" value="{{ $locataire->tel }}" type="number" class="form-control" id="tel_ens" >
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
    <button type="submit" class="btn btn-dark">Modifier Enseignant</button>
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
<section class="GroupesTable" id="GroupeTable">
  <div class="container-fluid">
    <div class="special-heading">Enseignant Groupes</div>
      <p>Voir la liste des groupes de l'enseignant</p>
  <div class="row">

    <div class="col-12 col-sm-12 col-lg-8 offset-2">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="egDatatable">
            <caption>Liste des Groupes</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Groupe</th>
              <th scope="col">#Nom_Groupe</th>
            </thead>
            <tbody id="tbodyEG">
              @foreach ($groupeslocataire as $key => $item)
            
              <tr>
                <td class="id_group">{{$item->id }}</td>
                <td>{{$item->group_name }}</td>
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
            <caption>Liste des Séances de l'éleve</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Seance</th>
              <th scope="col">#Date</th>
              <th scope="col">#Heure</th>
              <th scope="col">#prix unitaire</th>
              <th scope="col">#montant payé</th>
              <th scope="col">#Présence</th>
              <th scope="col">Action</th>
            </thead>
            <tbody id="tbodySeances">
              @foreach ($seanceslocataire as $key => $item)
              <tr>
                <td><a href="/seances/view/{{  $item->id  }}">{{ $item->id }}</a></td>
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
                <td><div><a id="btnDelete"  href="/professeurs/view/{{ $locataire->id }}/payerseance/{{ $item->id }}" type="button" class="btn btn-primary">Payer</a>
                  @if ( $item->absent == 1)
                  <a id="btnDelete"  href="/professeurs/view/{{ $locataire->id }}/present/{{ $item->id }}" type="button" class="btn btn-dark">Présent</a>
                  @endif
                  @if ( $item->absent == 0)
                    <a id="btnDelete"  href="/professeurs/view/{{ $locataire->id }}/absent/{{ $item->id }}" type="button" class="btn btn-warning">Absent</a>
                    @endif
                  </div></td>
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