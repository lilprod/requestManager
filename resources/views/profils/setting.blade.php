@extends('layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Paramètres</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Compte</a></li>
                    <li class="breadcrumb-item">Paramètres</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->

<!-- [ Main Content ] start -->
<div class="row">
    <!-- subscribe start -->
    <div class="col-lg-8 offset-lg-2">

        @include('inc.messages')

        <div class="card">
            <div class="card-header">
                <h5>Changer mot de passe </h5>
            </div>

            <form method="POST" action="{{ route('updatepassword') }}">
                @csrf

                <div class="card-body">
                    <div class="row form-row">
                        

                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Mot de passe actuel <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Entrer votre mot de passe actuel" name="old_password">
                              </div>
                        </div>

                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Nouveau mot de passe <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Entrer Nouveau mot de passe" name="new_password">
                            </div>
                        </div>

                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Confirmation de mot de passe <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Entrer votre nouveau mot de passe de nouveau" name="confirm_password">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-danger" type="submit">Changer mot de passe</button>
                    <button class="btn btn-outline-dark ms-2" type="reset">Annuler</button>
                </div>

            </form>
    
    </div>
</div>
<!-- [ Main Content ] end -->

@endsection