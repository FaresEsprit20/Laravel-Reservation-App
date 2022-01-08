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

</main>

@endsection