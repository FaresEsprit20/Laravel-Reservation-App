@extends('layout/master')

@section('title','Reservations App')

@section('content')
       
<main>
<a id="button-scroll-top"></a>

<!-- Start Groupes -->
<section class="geView" id="geView">
  <div class="container-fluid">
    <div class="special-heading">Eleves</div>
      <p>Modifier un eleve</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
        <form action="{{ route('update.eleve') }}" method="POST" class="row g-3" id="editgroup" name="updateEleve">
          @method('PUT')
          @csrf
          <input type="hidden" name="id" value="{{  $eleve->id  }}">
          <div class="col-md-12">
            <label for="group_ide" class="form-label">Groupes</label>
            <select id="group_ide" name="groupesu[]" class="form-select"  multiple="multiple">
              
              @foreach ($groupes as $key => $item)
              <option value="{{ $item->id }}">{{ $item->group_name }}</option>         
              @endforeach
            </select>
            @error('groupesu')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

  <div class="col-md-6">
    <label for="ln_elevee" class="form-label" >Prénom Eleve</label>
    <input type="text" value="{{ $eleve->prenom_eleve }}" name="prenomu" class="form-control" pattern="[a-zA-Z ]+" id="ln_elevee">
    @error('prenomu')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="col-md-6">
    <label for="n_elevee" class="form-label" >Nom Eleve</label>
    <input type="text" value="{{ $eleve->nom_eleve }}" name="nomu" class="form-control" pattern="[a-zA-Z ]+" id="n_elevee">
    @error('nomu')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="col-md-6">
    <label for="c_elevee" class="form-label">Classe Eleve</label>
    <input type="text" value="{{ $eleve->classe }}" name="classeu" class="form-control" id="c_elevee">
    @error('classeu')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="col-md-6">
    <label for="t_elevee" class="form-label" >Tel Eleve</label>
    <input type="number" name="telu" value="{{ $eleve->tel }}" class="form-control" id="t_elevee">
    @error('telu')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" name="chku" type="checkbox" id="reservChecksse" >
      <label class="form-check-label" for="reservChecksse">
        Cochez moi
      </label>
      @error('chku')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Modifier Elève</button>
  </div>
    </form>
      
        </div>
    </div>
  </div>
  <div class="col col-sm col-lg-2">
  </div>
  </div>
 
</section>
<!-- End Groupes -->


<!-- Start Products -->
<section class="GroupesTable" id="GroupeTable">
  <div class="container-fluid">
    <div class="special-heading">Eleve Groupes</div>
      <p>Voir la liste des groupes de l'éleve</p>
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
              @foreach ($groupeseleve as $key => $item)
            
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
              @foreach ($seanceseleve as $key => $item)
              <tr>
                <td><a href="/seances/view/{{  $item->id  }}">{{ $item->id }}</a></td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->heure }}</td>
                <td>{{ $item->prixUnitaire }}</td>
                <td>{{ $item->pivot->payement }}</td>
                <td>@if ( $item->pivot->absent == 0)
                    Présent
                @else
                    Absent
                @endif
               </td>
                <td><div><a id="btnDelete"  href="/eleves/view/{{ $eleve->id }}/payerseance/{{ $item->id }}" type="button" class="btn btn-primary">Voir</a>
                  @if ( $item->pivot->absent == 1)
                  <a id="btnDelete"  href="/eleves/view/{{ $eleve->id }}/present/{{ $item->id }}" type="button" class="btn btn-dark">Présent</a>
                  @endif
                  @if ( $item->pivot->absent == 0)
                    <a id="btnDelete"  href="/eleves/view/{{ $eleve->id }}/absent/{{ $item->id }}" type="button" class="btn btn-warning">Absent</a>
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
      <p>Facturer un éleve</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">

        <form class="row g-3" action="{{ route('eleve.facturer') }}" method="POST" id="facturer">
         @csrf
         <input type="hidden" name="ide" value="{{  $eleve->id  }}">
          <div class="col-md-12">
            <label for="group_ide" class="form-label">Groupes</label>
            <select id="group_ide" name="groupeseleves" class="form-select">
              <option value="0">All</option>
              @foreach ($groupeseleve as $key => $item)
              <option value="{{ $item->id }}">{{ $item->group_name }}</option>         
              @endforeach
            </select>
            @error('groupeseleves')
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
    <button type="submit" class="btn btn-dark">Facturer Eleve</button>
  </div>

</form>


      
        </div>

    </div>
  </div>
  <div class="col col-sm col-lg-2">
  </div>
  </div>
 
</section>

<!-- End Groupes -->



<!-- Start Products -->
<section class="GroupesTable" id="GroupeTable">
  <div class="container-fluid">
    <div class="special-heading">Factures</div>
      <p>Voir la liste des factures éleves</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="reservationsDatatable">
            <caption>Liste des Groupes</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Facture</th>
              <th scope="col">#Id_Elève</th>
              <th scope="col">#Id_Groupe</th>
              <th scope="col">#Nom_Prénom_Elève</th>
              <th scope="col">#Nom_Groupe</th>
              <th scope="col">#Nbre Séances</th>
              <th scope="col">#Prix des séances</th>
              <th scope="col">#Montant Payé</th>    
              <th scope="col">#Montant a Payer </th>
              <th scope="col">#Date & heure </th>
              <th scope="col">#Action</th>
            </thead>
            <tbody id="tbodyGroupes">
              <tr>
                <td>#Id_Facture</td>
                <td>#Id_Elève</td>
                <td>#Id_Groupe</td>
                <td>#Nom_Prénom_Elève</td>
                <td>#Nom_Groupe</td>
                <td>#Nbre Séances</td>
                <td>#Prix des séances</td>
                <td>#Montant Payé</td>
                <td>#Montant a Payer </td>
                <td>#Date & heure </td>
                <td><div><button style="display:block;width:65px;" id="btnArchv"type="button" class="btn btn-dark">Archv</button></div></td>  
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


</main>

@endsection