@extends('layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Traitements Requêtes</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Traitements</a></li>
                    <li class="breadcrumb-item">Récap des traitements par période</li>
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
                <h5> Récap des traitements de requête par période</h5>
            </div>
            <div class="card-body">

                <div class="row">

                    <h5 class="text-center">Filtre par période</h5><hr>
                    <form method="POST" action="{{ route('post_complaint_recap') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="periode" class="col-md-2 col-form-label text-md-left">Période<span class="text-danger">*</span></label>

                            <div class="col-md-4">
                                <select name="periode" id="periode" class="form-control mb-30" required>
                                    <option value = "">--Selectionner la période--</option>
                                    <option value = "">--Selectionner la période--</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Filtrer</button>
                                <!--<button type="button" name="filter" id="filter" class="btn btn-info">Filtrer</button>-->
                                <!--<button type="button" name="refresh" id="refresh" class="btn btn-warning">Actualiser</button>-->
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