@extends('layout/master')

@section('title','Reservations App')

@section('content')
       
<main>



   <!-- Start Groupes -->
   <section class="gView" id="gView">
    <div class="container-fluid">
      <div class="special-heading">Paiement</div>
        <p>Payer une séance d'un éleve</p>
    <div class="row">
    
      <div class="col-12 col-sm-12 col-lg-8 offset-3">
        
        <div class="products-table mt-5 mb-5">
          <div class="table-reservations">
    
<form action="{{ route('payer.eleve.update') }}" method="POST" class="row g-3" id="creategroup">
    @method('PUT')
    @csrf     
      <input name="eleve" type="hidden" value="{{ $eleve }}" class="form-control" id="id_eleve" >
      <input name="seance" type="hidden" value="{{ $seance }}" class="form-control" id="id_seance" >
      <input name="prix" type="hidden" value="{{ $prix }}" class="form-control" id="id_seance" >
 
    <div class="col-md-8">
      <label for="payement_id" class="form-label">Payement</label>
      <input name="montant" type="number" class="form-control"  step="any" id="payement_id">
      @error('montant')
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
      <button type="submit" class="btn btn-dark">Payer la séance</button>
    </div>
  </form>
        
          </div>
      </div>
    </div>
 
    </div>
    @if ($message = Session::get('seance_eleve_paid_success'))
    <x-bootstrapalertsiconssvg />
   <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
     <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
     <div>
       {{ $message }}
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
   </div>
   @endif

  </section>
  <!-- End Groupes -->


</main>

@endsection