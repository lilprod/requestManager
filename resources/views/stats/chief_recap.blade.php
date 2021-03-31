@extends('layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Requêtes traitées</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Requêtes traitées</a></li>
                    <li class="breadcrumb-item">Liste requêtes traitées</li>
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
                <h5> Liste des requêtes traitées par agent</h5>
            </div>
            <div class="card-body">

                <div class="row">

                    <h5 class="text-center">Filtre par agent et par période</h5><hr>
                    <form method="POST" action="{{ route('chief.ressource.post_recap') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="ressource_id" class="col-md-1 col-form-label text-md-left">Agent :<span class="text-danger">*</span></label>

                            <div class="col-md-3 mb-3">
                                <select name="ressource_id" id="ressource_id" class="form-control mb-30" required>
                                    <option value = "">--Selectionner un agent--</option>
                                    @foreach ($agents as $agent)
                                        <option value="{{$agent->id}}">{{$agent->name}}</option>	
                                    @endforeach	
                                </select>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend1">De</span>
                                    <input type="date" class="form-control" name="from_date" id="from_date" aria-describedby="inputGroupPrepend1">
                                </div>
                            </div>
                                
                            <div class="col-md-3 mb-3">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">à</span>
                                    <input type="date" class="form-control" name="to_date" id="to_date" aria-describedby="inputGroupPrepend">
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <button type="submit" class="btn btn-primary">Filtrer</button>
                            </div>

                        </div>
                    </form>
                    
                </div>

                <div class="dt-responsive table-responsive">
                    <table id="basic-btn" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Types Requêtes</th>
                                <th>Requêtes</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">

                            @foreach ($complaints as $key=> $complaint)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$complaint->type->title}}</td>
                                    <td>{{$complaint->title}}</td>
                                    <td>
                                        @if($complaint->status)
                                            Traité
                                        @else
                                            En attente
                                        @endif
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