@extends('layout/master')

@section('title','Reservations App')

@section('content')


<main>

  <!-- Start Products -->
  <section class="reservationsView" id="reservationsView">
  
  @if ($message = Session::get('empty_locations'))
  <x-bootstrapalertsiconssvg />
 <div class="alert alert-primary d-flex align-items-center alert-dismissible fade show" role="alert">
   <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#info-fill"/></svg>
   <div>
     {{ $message }}
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
 </div>
 @endif
    <div class="container-fluid">
      <div class="special-heading">Suites Vides</div>
        <p>Voir les Locations vides</p>
    <div class="row">
    <div class="col col-sm col-lg-2">
    </div>
      <div class="col-12 col-sm-12 col-lg-8">
        <div class="locataires-table mt-5 mb-5">
          <div class="table-responsive">
            <table class="table display" id="locationsDatatable">
              <caption>Liste des Locations Vides</caption>
              <thead class="table-dark">
                <th scope="col">#id_loc</th>
                <th scope="col">#Nom_salle</th>   
              </thead>
              <tbody id="tbodyL">
                  @foreach ($suites as $item)
                  <tr>
                    <td><a href="/locations/view/{{  $item->id  }}">{{ $item->id }}</a></td>
                    <td>{{ $item->location_name }}</td>   
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
  </main>
  
  

@endsection
       
<script>
  $("#locationsDatatable").DataTable(
    {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','pageLength'
        ]
    }
  );
</script>
