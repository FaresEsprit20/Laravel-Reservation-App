@extends('layout/master')

@section('title','Reservations App')


@section('content')

<main>
<a id="button-scroll-top"></a>


<!-- Start Groupes -->
<section class="geView" id="geView">
  <div class="container-fluid">
    <div class="special-heading">Groupes</div>
      <p>Modifier un groupe</p>
  <div class="row">

    <div class="col-12 col-sm-12 col-lg-8 offset-3">
      
      <div class="products-table mt-5 mb-5">
        <div class="table-reservations">
  
        <form action="{{ route('update.group') }}" method="POST" class="row g-3" id="editgroup">
       @method('PUT')
       @csrf
       <input type="hidden" name="groupeu" value="{{  $groupe->id  }}">

  <div class="col-md-8">
    <label for="group_name" class="form-label">Nom Groupe</label>
    <input type="text"  value="{{ $groupe->group_name }}" name="nomgroupe" class="form-control" id="group_name">
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

  </div>
 
</section>
<!-- End Groupes -->




<!-- Start Products -->
<section class="GroupesTable" id="GroupeTable">
  <div class="container-fluid">
    <div class="special-heading">Eleves</div>
      <p>Voir la liste des éleves du groupe</p>
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
             
            </thead>
            <tbody id="tbodyGroupes">
              @foreach ($eleves as $key => $item)
                  
              <tr>
                <td><a href="/eleves/view/{{  $item->id  }}" >{{ $item->id }}</a></td>
                <td>{{ $item->prenom_eleve }}</td>
                <td>{{ $item->nom_eleve }}</td>
                <td>{{ $item->classe }}</td>
                <td>{{ $item->tel }}</td>
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



</main>

@endsection