@extends('layout/master')

@section('title','Reservations App')


@section('content')

<main>
<a id="button-scroll-top"></a>
<!-- Start Groupes -->
<section class="gView" id="gView">
  <div class="container-fluid">
    <div class="special-heading">Groupes</div>
      <p>Créer un groupe</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
        <form class="row g-3" action="{{ route('create.group') }}" method="POST" id="creategroup" name="creategroup">
       @csrf
  <div class="col-md-8">
    <label for="nom_groupe" class="form-label">Nom Groupe</label>
    <input type="text" name="groupe" class="form-control" id="nom_groupe">
    @error('groupe')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  <div class="col-12">
    <div class="form-check">
      <input name="chk" class="form-check-input" type="checkbox" id="reservCheck">
      <label  class="form-check-label" for="chk">
        Cochez moi
      </label>
      @error('chk')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Créer le Groupe</button>
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
<!-- Start Groupes -->
<section class="geView" id="geView">
  <div class="container-fluid">
    <div class="special-heading">Groupes</div>
      <p>Modifier un groupe</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
        <form action="{{ route('update.group') }}" method="POST" class="row g-3" id="editgroup">
       @method('PUT')
       @csrf
  <div class="col-md-8">
  <label for="group_id" class="form-label">Groupe</label>
    <select name="groupeu" id="group_id" class="form-select">
      <option selected  disabled value="nil">Sélectionner un groupe...</option>
      @foreach ($groupes as $key => $item)
          
      <option value="{{ $item->id }}">{{ $item->group_name }}</option>

      @endforeach
    </select>
    @error('groupeu')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-8">
    <label for="group_name" class="form-label">Nom Groupe</label>
    <input type="text" name="nomgroupe" class="form-control" id="group_name">
    @error('nomgroupe')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  <div class="col-12">
    <div class="form-check">
      <input  name="chku" class="form-check-input" type="checkbox" id="reservChecks" >
      <label class="form-check-label" for="reservChecks">
        Cochez moi
      </label>
      @error('chku')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Modifier le Groupe</button>
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
    <div class="special-heading">Groupes</div>
      <p>Voir la liste des groupes</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="reservationsDatatable">
            <caption>Liste des Groupes</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Groupe</th>
              <th scope="col">#Nom_Groupe</th>
              <th scope="col">Action</th>
            </thead>
            <tbody id="tbodyGroupes">
              @foreach ($groupes as $key => $item)
          
              <tr>
                <td class="id_groupe">{{$item->id }}</td>
                <td>{{$item->group_name }}</td>
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
<!-- Start Groupes -->
<section class="geView" id="geView">
  <div class="container-fluid">
    <div class="special-heading">Elèves</div>
      <p>Trouver les groupes d'un élève</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
        <form action="{{ route('find.eleve.groups') }}" method="POST" class="row g-3" id="editeleve">
       @csrf
  <div class="col-md-8">
  <label for="eleve_id" class="form-label">Elèves</label>
    <select name="elevef" id="eleve_id" class="form-select" >
      <option selected disabled value="nil" disabled>Sélectionner un éleve...</option>
      @foreach ($eleves as $key => $item)
          
      <option value="{{ $item->id }}" disabled>{{ $item->nom }}<br>{{ $item->prenom }}</option>
    
      @endforeach
     
    </select>
    @error('elevef')
    <span class="text-danger">{{  $message }}</span>
    @enderror
   
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Trouver les Groupes</button>
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
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="egDatatable">
            <caption>Liste des Groupes</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Groupe</th>
              <th scope="col">#Nom_Groupe</th>
            </thead>
            <tbody id="tbodyEG">
              @foreach ($groupes as $key => $item)
          
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
  <div class="col col-sm col-lg-2">
  </div>
  </div>
 
</section>
<!-- End Products -->
</main>

@endsection