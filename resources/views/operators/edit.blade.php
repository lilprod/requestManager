@extends('layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Opérateurs</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Opérateurs</a></li>
                    <li class="breadcrumb-item">Edition</li>
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
                <h5>Editer Opérateur </h5>
            </div>

            <form method="POST" action="{{ route('admin.operators.update', $institution->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="card-body">

                    <div class="row form-row">
                
                          <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nom <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control mb-30" placeholder="Nom de l'opérateur" value="{{$institution->name}}" required>
    
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
                                <input type="text" name="nif" id="nif" class="form-control mb-30" placeholder="NIF" value="{{$institution->nif}}" required>
    
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
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Adresse" value="{{$institution->address}}" required>
                                
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
                                <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" placeholder="Ville" value="{{$institution->city}}" required autocomplete="city">
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
                                <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" placeholder="Code postal" value="{{$institution->postal_code}}" required>
    
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
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Adresse email" value="{{$institution->email}}" required>

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
                            <input type="tel" id="phone" name="" class="form-control @error('phone_number') is-invalid @enderror" value="{{ $institution->phone_number }}" required autocomplete="phone_number">

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
                    <button type="submit" class="btn btn-primary btn-block" id="submit">Editer opérateur</button>
                    <button class="btn btn-danger ms-2" type="reset">Effacer</button>
                    <a class="btn btn-primary btn-block ms-2" href="{{url()->previous()}}"> Retour </a>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

@endsection