@extends('layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Régions</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Régions</a></li>
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
    <div class="col-lg-8 offset-lg-2">

        @include('inc.messages')

        <div class="card">
            <div class="card-header">
                <h5>Nouvelle Région </h5>
            </div>

            <form method="POST" action="{{ route('admin.regions.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="row form-row">
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Titre</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                        </div>
        
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea cols="30" rows="4" class="form-control" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Ajouter région</button>
                    <button class="btn btn-danger ms-2" type="reset">Effacer</button>
                    <a class="btn btn-primary btn-block ms-2" href="{{url()->previous()}}"> Retour </a>
                </div>

            </form>
    
    </div>
</div>
<!-- [ Main Content ] end -->

@endsection