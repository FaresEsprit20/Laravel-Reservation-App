@extends('layout/master')

@section('title','Reservations App')


@section('content')

<main>

<!-- Start Groupes -->
<section class="gView" id="gView">
  <div class="container-fluid">
    <div class="special-heading">Groupes</div>
      <p>Créer un groupe</p>
  <div class="row">

    <div class="col-12 col-sm-12 col-lg-8 offset-3">
      
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

  </div>
  @if ($message = Session::get('create_group_success'))
   <x-bootstrapalertsiconssvg />
  <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
      {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
  
  @if ($message = Session::get('edit_group_success'))
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
    <div class="special-heading">Groupes</div>
      <p>Voir la liste des groupes</p>
  <div class="row">

    <div class="col-12 col-sm-12 col-lg-8 offset-2">
      
      <div class="locataires-table mt-5 mb-5">
        <div class="table-responsive">
          <table class="table display" id="groupesDatatable">
            <caption>Liste des Groupes</caption>
            <thead class="table-dark">
              <th scope="col">#Id_Groupe</th>
              <th scope="col">#Nom_Groupe</th>
              <th scope="col">Action</th>
            </thead>
            <tbody id="tbodyGroupes">
              @foreach ($groupes as $key => $item)
             
              <tr>
                <td class="id_groupe"> <a href="/groupes/view/{{  $item->id  }}">{{$item->id }}</a></td>
                <td>{{$item->group_name }}</td>
                <td><div><button id="btnDelete" style="display:block;width:65px;margin-bottom:5px;" type="button" class="btn btn-info">Del</button><button style="display:block;width:65px;" id="btnArchv"type="button" class="btn btn-dark">Archv</button></div></td>
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
@section('script')
<script>
   $("#groupesDatatable").DataTable(
    {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','pageLength'
        ]
    }
   );
</script>
 @endsection