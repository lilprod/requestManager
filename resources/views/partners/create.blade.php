@extends('layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Partenaires</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Partenaires</a></li>
                    <li class="breadcrumb-item">Ajout</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->

<!-- [ Main Content ] start -->
<div class="row">
    <!-- subscribe start -->
    <div class="col-sm-12">
        @include('inc.messages')
        <div class="card">
            <div class="card-header">
                <h5>Nouvel Partenaire </h5>
            </div>

            <form method="POST" action="{{ route('admin.partners.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                   <div class="row form-row">

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nom <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control mb-30" placeholder="Nom du partenaire" required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="form-group">
                            <label>NIF <span class="text-danger">*</span></label>
                            <input type="text" name="nif" id="nif" class="form-control mb-30" placeholder="NIF" required>

                            @error('nif')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>

                      
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Adresse <span class="text-danger">*</span></label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Adresse" value="{{ old('address') }}" required autocomplete="address">
                            
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Ville <span class="text-danger">*</span></label>
                            <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" required>
                            <div id="city_list"></div> 
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        
                      </div>

                      <div class="col-md-4">
                        <div class="form-goup">
                            <label>Code postal <span class="text-danger">*</span></label>
                            <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" placeholder="Code postal" value="{{ old('postal_code') }}" required autocomplete="postal_code">

                            @error('postal_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Adresse email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Adresse email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Téléphone <span class="text-danger">*</span></label>
                            <input id="output" type="hidden" name="phone_number" value=""/>
                            <input type="tel" id="phone" name="" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                     </div>

                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block" id="submit">Ajouter partenaire</button>
                    <button class="btn btn-danger ms-2" type="reset">Effacer</button>
                    <a class="btn btn-primary btn-block ms-2" href="{{url()->previous()}}"> Retour </a>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

@endsection


{{-- @push('add_partner')
    <!-- Jquery css -->
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css') }}">
      
    <!-- Jquery Script -->
    <script src="{{asset('js/jquery.js') }}"></script>
    <script src="{{asset('js/jquery-ui.min.js') }}"></script>

    <script>
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(function () {
           $('#city').autocomplete({
              source:function(request,response){
                 
                    // Fetch data
                    $.ajax({
                       url:"{{route('api_cities')}}",
                       type: 'post',
                       dataType: "json",
                       data: {
                          _token: CSRF_TOKEN,
                          search: request.term
                       },
                       success: function( data ) {
                          response( data );
                       }
                    });
              },
              minLength:1,
              delay:500,
              select:function(event,ui){
                   // $('#city').val(ui.item.title)
                    // Set selection
                    $('#city').val(ui.item.label); // display the selected text
                    $('#city').val(ui.item.label); // save selected id to input
                    //$('#city').val(ui.item.value); // save selected id to input
                    return false;
              }
           })
        })
     </script>
@endpush --}}
