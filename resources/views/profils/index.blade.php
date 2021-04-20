@extends('layouts.app')

@section('content')

        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Profil</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#!">Compte</a></li>
                            <li class="breadcrumb-item">Profil</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-lg-4">
                <div class="card user-card user-card-1">
                    <div class="card-body pb-0">
                        <div class="media user-about-block align-items-center mt-0 mb-3">
                            <div class="position-relative d-inline-block">
                                <img class="img-radius img-fluid wid-80" src="{{url('/storage/profile_images/'.auth()->user()->profile_picture ) }}" alt="User image">
                                <div class="certificated-badge">
                                    <i class="fas fa-certificate text-primary bg-icon"></i>
                                    <i class="fas fa-check front-icon text-white"></i>
                                </div>
                            </div>
                            <div class="media-body ms-3">
                                <h6 class="mb-1">{{$user->name}} {{$user->firstname}}</h6>
                                <p class="mb-0 text-muted">{{ $user->id == 1 ? 'Admin' : ''}}</p>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span class="f-w-500"><i class="feather icon-mail m-r-10"></i>Adressee email</span>
                            <a href="mailto:demo@sample" class="float-end text-body">{{$user->email}}</a>
                        </li>
                        <li class="list-group-item">
                            <span class="f-w-500"><i class="feather icon-phone-call m-r-10"></i>Phone</span>
                            <a href="#" class="float-end text-body">{{$user->phone_number}}</a>
                        </li>
                        <li class="list-group-item border-bottom-0">
                            <span class="f-w-500"><i class="feather icon-map-pin m-r-10"></i>Ville</span>
                            <span class="float-end">{{$user->city}}</span>
                        </li>
                    </ul>
         
                    <div class="nav flex-column nav-pills list-group list-group-flush list-pills" id="user-set-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link list-group-item list-group-item-action active" id="user-set-profile-tab" data-bs-toggle="pill" href="#user-set-profile" role="tab" aria-controls="user-set-profile" aria-selected="true">
                            <span class="f-w-500"><i class="feather icon-user m-r-10 h5 "></i>Aperçu du profil</span>
                            <span class="float-end"><i class="feather icon-chevron-right"></i></span>
                        </a>
                        <a class="nav-link list-group-item list-group-item-action" id="user-set-information-tab" data-bs-toggle="pill" href="#user-set-information" role="tab" aria-controls="user-set-information" aria-selected="false">
                            <span class="f-w-500"><i class="feather icon-file-text m-r-10 h5 "></i>Informations personnelles</span>
                            <span class="float-end"><i class="feather icon-chevron-right"></i></span>
                        </a>
                      
                        <a class="nav-link list-group-item list-group-item-action" id="user-set-passwort-tab" data-bs-toggle="pill" href="#user-set-passwort" role="tab" aria-controls="user-set-passwort" aria-selected="false">
                            <span class="f-w-500"><i class="feather icon-shield m-r-10 h5 "></i>Changement de mot de passe</span>
                            <span class="float-end"><i class="feather icon-chevron-right"></i></span>
                        </a>
                        
                    </div>
                </div>
    
            </div>
            <div class="col-lg-8">
                <div class="tab-content" id="user-set-tabContent">
                    <div class="tab-pane fade show active" id="user-set-profile" role="tabpanel" aria-labelledby="user-set-profile-tab">
                   
                        <div class="card">
                            <div class="card-header">
                                <h5><i data-feather="user" class="icon-svg-primary wid-20"></i><span class="p-l-5">A propos de moi</span></h5>
                            </div>
                            <div class="card-body">
                                <p>
                                    {{$user->biography}}
                                </p>
                                <h5 class="mt-5 mb-3">Détails personnelles</h5>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="">Nom complet</td>
                                            <td class="">:</td>
                                            <td class="">{{$user->name}} {{$user->firstname}}</td>
                                        </tr>
                                        <!--<tr>
                                            <td class="">Father's Name</td>
                                            <td class="">:</td>
                                            <td class="">Mr. Deepak Handge</td>
                                        </tr>-->
                                        <tr>
                                            <td class="">Adresse</td>
                                            <td class="">:</td>
                                            <td class="">{{$user->address}}</td>
                                        </tr>
                                        <tr>
                                            <td class="">Code postal</td>
                                            <td class="">:</td>
                                            <td class="">{{$user->postal_code}}</td>
                                        </tr>
                                        <tr>
                                            <td class="">Téléphone</td>
                                            <td class="">:</td>
                                            <td class="">{{$user->phone_number}}</td>
                                        </tr>
                                        <tr>
                                            <td class="">Adresse email</td>
                                            <td class="">:</td>
                                            <td class="">{{$user->email}}</td>
                                        </tr>
                                        <!--<tr>
                                            <td class="">Website</td>
                                            <td class="">:</td>
                                            <td class="">http://example.com</td>
                                        </tr>-->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="user-set-information" role="tabpanel" aria-labelledby="user-set-information-tab">
                        <div class="card">
                            <div class="card-header">
                                <h5><i data-feather="user" class="icon-svg-primary wid-20"></i><span class="p-l-5">Informations personnelles</span></h5>
                            </div>

                        <form method="POST" action="{{ route('profils.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Nom <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$user->name}}" name="name" required>
                                        </div>
                                    </div>

                                    @if($user->role_id == 1 || $user->role_id == 4 || $user->role_id == 5)
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Prénom(s) <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$user->firstname}}" name="firstname">
                                        </div>
                                    </div>
                                    @endif

                                    @if($user->role_id == 4 || $user->role_id == 5)

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="focus-label">Date de naissance </label>
                                            <input class="form-control floating" type="date" value="{{$user->birth_date}}" name="birth_date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="focus-label">Civilité </label>
                                            <select class="select form-control" name="gender">
                                                <option value="M" {{  $user->gender == "M" ? 'selected' : '' }}>Mr</option>
                                                <option value="F" {{  $user->gender == "F" ? 'selected' : '' }}>Mme</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    @endif

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Ville <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$user->city}}" name="city" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Code postal <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$user->postal_code}}" name="postal_code" required>
                                        </div>
                                    </div>

                                   <!-- <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Bio </label>
                                            <textarea class="form-control" name="biography">{{$user->biography}}</textarea>
                                        </div>
                                    </div>-->

                                </div>
                            </div>
                            <!--<div class="card-header" <h5><i data-feather="share" class="icon-svg-primary wid-20"></i><span class="p-l-5">Social Information</span></h5>
                            </div>-->
                            <!--<div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Facebook</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-facebook text-white">
                                            <i class="fab fa-facebook-f"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Profile Url">
                                        <button class="btn btn-primary bg-facebook" type="button">Connect</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Twitter</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-twitter text-white">
                                            <i class="fab fa-twitter"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Profile Url">
                                        <button class="btn btn-info bg-twitter" type="button">Connect</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Google Plus</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-googleplus text-white">
                                            <i class="fab fa-google-plus-g"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Profile Url">
                                        <button class="btn btn-danger bg-googleplus" type="button">Connect</button>
                                    </div>
                                </div>
                            </div>-->
                            <div class="card-header">
                                <h5><i data-feather="map-pin" class="icon-svg-primary wid-20"></i><span class="p-l-5">Informations de Contact </span></h5>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Téléphone <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$user->phone_number}}" name="phone_number">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$user->email}}" name="email" required>
                                        </div>
                                    </div>

                                    <!--<div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Portfolio Url</label>
                                            <input type="text" class="form-control" value="https://demo.com/">
                                        </div>
                                    </div>-->

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Image de profil</label>
                                            <input type="file" class="form-control" name="profile_picture">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Adresse</label>
                                            <textarea class="form-control" name="address">{{$user->address}}</textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">Modifier Profil</button>
                                <button class="btn btn-outline-dark ms-2" type="reset">Effacer</button>
                            </div>
                        </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="user-set-passwort" role="tabpanel" aria-labelledby="user-set-passwort-tab">
                      
                        <div class="card">
                            <div class="card-header">
                                <h5><i data-feather="lock" class="icon-svg-primary wid-20"></i><span class="p-l-5">Changement de mot de passe</span></h5>
                            </div>

                            <form method="POST" action="{{ route('updatepassword') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Mot de passe actuel <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Entrer votre mot de passe actuel" name="old_password">
                                                <!--<small class="form-text text-muted">Mot de passe oublié? <a href="#!">Cliquer ici</a></small>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Nouveau mot de passe <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Entrer Nouveau mot de passe" name="new_password">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Confirmation de mot de passe <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Entrer votre nouveau mot de passe de nouveau" name="confirm_password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            <div class="card-footer text-end">
                                <button class="btn btn-danger" type="submit">Changer mot de passe</button>
                                <button class="btn btn-outline-dark ms-2" type="reset">Annuler</button>
                            </div>
                        </form>
                        </div>
                    </div>
                
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
@endsection