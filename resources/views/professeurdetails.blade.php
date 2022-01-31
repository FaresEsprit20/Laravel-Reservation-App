@extends('layout/master')

@section('title','Reservations App')


@section('content')
       
<main>

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
       <input type="hidden" name="id" value="{{  $locataire->id  }}">
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
    <input name="rue" value="{{ $locataire->rue }}" type="text" class="form-control" id="rue_ens" >
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
  @if ($message = Session::get('update_locataire_success'))
  <x-bootstrapalertsiconssvg />
 <div class="alert alert-primary d-flex align-items-center alert-dismissible fade show" role="alert">
   <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#info-fill"/></svg>
   <div>
     {{ $message }}
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
 </div>
 @endif
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
          <table class="table display" id="ensgrpDatatable">
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
          <table class="table display" id="ensseancesDatatable">
            <caption>Liste des Séances de l'énseignant</caption>
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



<!-- Start Groupes -->

<section class="gView" id="gView">
  <div class="container-fluid">
    <div class="special-heading">Facture</div>
      <p>Facturer un enseignant</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">

        <form class="row g-3" action="{{ route('professeur.facturer') }}" method="POST" id="facturer">
         @csrf
         <input type="hidden" name="ides" value="{{  $locataire->id  }}">
          <div class="col-md-12">
            <label for="group_ide" class="form-label">Groupes</label>
            <select id="group_ide" name="groupeslocataire" class="form-select">
              <option value="0">All</option>
              @foreach ($groupeslocataire as $key => $item)
              <option value="{{ $item->id }}">{{ $item->group_name }}</option>         
              @endforeach
            </select>
            @error('groupeslocataire')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="col-md-12">
            <div>
            <label  class="form-label">Date Début</label>
              <input name="datedeb" type="date" class="form-control" >
            </div>
              @error('datedeb')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
              <div class="col-md-12">
           
           <label  class="form-label">Date Fin</label>
           <input name="datefin" type="date"  class="form-control">
      @error('datefin')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="col-md-12">
           
      <label for="group_ide" class="form-label">Compter les absences ?</label>
      <div class="form-check form-switch">
        <input name="absence" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
        <label class="form-check-label" for="flexSwitchCheckChecked">Oui</label>
      </div>
            @error('absence')
            <span class="text-danger">{{ $message }}</span>
            @enderror
</div>
  <div class="col-12">
    <div class="form-check">
      <input name="chkf" class="form-check-input" type="checkbox" id="reservCheckee">
      <label class="form-check-label" for="reservCheckee">
        Cochez moi
      </label>
    </div>
    @error('chkf')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-dark">Facturer Enseignant</button>
  </div>

</form>

   </div>
  </div>
 </div>
<div class="col col-sm col-lg-2">
  </div>
  </div>
  @if ($message = Session::get('locataire_seance_facturer'))
  <x-bootstrapalertsiconssvg />
 <div class="alert alert-primary d-flex align-items-center alert-dismissible fade show" role="alert">
   <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#info-fill"/></svg>
   <div>
     {{ $message }}
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
 </div>
 @endif
</section>

<!-- End Groupes -->



<!-- Start Products -->
<section class="GroupesTable" id="GroupeTable">
  <div class="container-fluid">
    <div class="special-heading">Factures</div>
      <p>Voir la liste des factures énseignants</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="ensfacDatatable">
            <caption>Liste des Groupes</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Facture</th>
              <th scope="col">#Prix des séances</th>
              <th scope="col">#Montant Payé</th>    
              <th scope="col">#Montant a Payer </th>
              <th scope="col">#Date début </th>
              <th scope="col">#Date fin </th>
              <th scope="col">#Action</th>
            </thead>
            <tbody id="tbodyGroupes">
             
              @foreach ($factures as $item)
              <tr>
                <td><a href="/facturesprofesseurs/view/{{  $item->id  }}" >{{ $item->id }}</a></td>
                <td>{{ $item->prixtotalseances }}</td>
                <td>{{ $item->paid }}</td>
                <td>{{ $item->topay }}</td>
                <td>{{ $item->datedeb }}</td>
                <td>{{ $item->datefin }}</td>
                <td><div><button style="display:block;width:65px;" id="btnArchv"type="button" class="btn btn-dark">Archv</button></div></td>  
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

@section('script')
<script>
  $("#ensgrpDatatable").DataTable(
    {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','pageLength'
        ]
    }
  );
  $("#ensseancesDatatable").DataTable(
    {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','pageLength'
        ]
    }
  );
  $("#ensfacDatatable").DataTable(
    {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','pageLength'
        ]
    }
  );
 
</script>
@endsection