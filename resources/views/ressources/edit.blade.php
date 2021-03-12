@extends('layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Personnels</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Personnels</a></li>
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
                <h5>Editer Personnel </h5>
            </div>

            <form method="POST" action="{{ route('admin.ressources.update', $staff->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="card-body">

                   <div class="row form-row">

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Nom <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Nom" value="{{ $staff->name }}" required autofocus>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Prénom(s) <span class="text-danger">*</span></label>
                            <input type="text" name="firstname" class="form-control" placeholder=" Prénom(s)" value="{{ $staff->firstname}}" required>
                        </div> 
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="birth_date">Date de naissance <span class="text-danger">*</span></label>
                            <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{ $staff->birth_date }}" required>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Civilité <span class="text-danger">*</span></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M" {{  $staff->gender === 'M' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Mr</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F" {{  $staff->gender === 'F' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Mme</label>
                            </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Adresse <span class="text-danger">*</span></label>
                            <input type="text" name="address" class="form-control" placeholder="Adresse" value="{{ $staff->address }}" required>
                        </div>
                        
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Ville <span class="text-danger">*</span></label>
                            <input type="text" name="city" class="form-control" placeholder="Ville" value="{{ $staff->city }}" required>
                        </div>  
                      </div>

                      <div class="col-md-4">
                        <div class="form-goup">
                            <label>Code postal <span class="text-danger">*</span></label>
                            <input type="text" name="postal_code" class="form-control" placeholder="Code postal" value="{{ $staff->postal_code }}" required>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Adresse email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" placeholder="Adresse email" value="{{ $staff->email }}" required>
                        </div>
                        
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Téléphone <span class="text-danger">*</span></label>
                            <input id="output" type="hidden" name="phone_number" value=""/>
                            <input type="tel" id="phone" name="" class="form-control" value="{{ $staff->phone_number }}" required>
                        </div>
                        
                     </div>

                   </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block" id="submit">Editer Personnel</button>
                </div>

            </form>

         </div>
     </div>
</div>
 <!-- [ Main Content ] end -->

@endsection