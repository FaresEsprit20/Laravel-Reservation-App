@extends('layout/master')

@section('title','Reservations App')

@section('content')
       
<main>

<!-- Start Groupes -->
<section class="gView" id="gView">
  <div class="container-fluid">
    <div class="special-heading">Elèves</div>
      <p>Créer un élève</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
        <form class="row g-3" id="creategroup" action="{{ route('create.eleve') }}" method="POST" name="createEleve">
     @csrf
    
     <div class="col-md-12">
      <label for="group_id" class="form-label">Groupes</label>
      <select id="group_id" name="groupes[]" class="form-select"  multiple="multiple">
        
        @foreach ($groupes as $key => $item)
        <option value="{{ $item->id }}">{{ $item->group_name }}</option>         
        @endforeach
      </select>
      @error('groupes')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>

  <div class="col-md-6">
    <label for="ln_eleve" class="form-label" >Prénom Eleve</label>
    <input type="text" name="prenom" class="form-control"  id="ln_eleve">
    @error('prenom')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    
  </div>
  <div class="col-md-6">
    <label for="n_eleve" class="form-label" >Nom Eleve</label>
    <input type="text" name="nom" class="form-control"  id="n_eleve">
    @error('nom')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-6">
    <label for="c_eleve" class="form-label">Classe Eleve</label>
    <input type="text" name="classe" class="form-control" id="c_eleve">
    @error('classe')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-md-6">
    <label for="t_eleve" class="form-label" >Tel Eleve</label>
    <input type="number" name="tel" class="form-control" id="t_eleve">
    @error('tel')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" name="chk" type="checkbox" id="reservCheckss">
      <label class="form-check-label" for="reservCheckss">
        Cochez moi
      </label>
      @error('chk')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-dark">Créer Elève</button>
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
    <div class="special-heading">Eleves</div>
      <p>Voir la liste des éleves</p>
  <div class="row">
  <div class="col col-sm col-lg-2">
  </div>
    <div class="col-12 col-sm-12 col-lg-8">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="eleDatatable">
            <caption>Liste des Eleves</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Eleve</th>
              <th scope="col">#Prenom_Eleve</th>
              <th scope="col">#NomEleve</th>
              <th scope="col">#Classe</th>
              <th scope="col">#Tel</th>
              <th scope="col">Action</th>
            </thead>
            <tbody id="tbodyGroupes">
              @foreach ($eleves as $key => $item)
                  
              <tr>
                <td><a href="/eleves/view/{{  $item->id  }}" >{{ $item->id }}</a></td>
                <td>{{ $item->prenom_eleve }}</td>
                <td>{{ $item->nom_eleve }}</td>
                <td>{{ $item->classe }}</td>
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


@section('script')
<script>
   $("#eleDatatable").DataTable(
    {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','pageLength'
        ]
    }
   );
</script>
 @endsection