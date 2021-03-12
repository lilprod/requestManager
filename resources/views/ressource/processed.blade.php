@extends('layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Mes Requêtes traitées</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Mes Requêtes traitées</a></li>
                    <li class="breadcrumb-item">Liste</li>
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
                <h5> Liste des requêtes traitées</h5>
            </div>
            <div class="card-body">
                <div class="row align-items-center m-l-0">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 text-end">
                        <!--<a href="{{ route('complaints.create') }}" class="btn btn-primary btn-sm mb-3 btn-round" data-toggle="" data-target=""> <i class="fa fa-plus"></i>
                            Ajouter Requête</a>-->
                    </div>
                </div>
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Types Requêtes</th>
                                <th>Requêtes</th>
                                <th>Statut</th>
                                <th style="width: 10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($complaints as $key=> $complaint)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$complaint->type->title}}</td>
                                <td>{{$complaint->title}}</td>
                                <td><span class="badge bg-success">Traité</span></td>
                                <td>
                                    <a href="{{ route('complaints.show', $complaint->id) }}" class="btn btn-info btn-sm">Voir</a>
                                  </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- subscribe end -->
</div>
<!-- [ Main Content ] end -->
@endsection
