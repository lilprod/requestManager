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
                <h5> Liste des partenaires </h5>
            </div>
            <div class="card-body">
                <div class="row align-items-center m-l-0">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="{{ route('admin.partners.create') }}" class="btn btn-primary btn-sm mb-3 btn-round"> <i class="fa fa-plus"></i>
                            Ajouter Partenaire
                        </a>
                    </div>
                </div>
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Nom et Prénom(s)</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Date/Heure d'ajout</th>
                                <th>Rôle</th>
                                <th style="width: 10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($institutions as $institution)
                            <tr>
                                <td>{{ $institution->name }} {{ $institution->firstname }}</td>
                                <td>{{ $institution->email }}</td>
                                <td>{{ $institution->phone_number }}</td>
                                <td>{{ $institution->created_at->format('F d, Y h:ia') }}</td>
                                <td>{{ $institution->user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                                <td>
                                    <a href="{{ route('admin.partners.edit', $institution->id) }}" class="btn btn-info btn-sm">Editer</a>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" onclick="deleteData({{ $institution->id}})" data-target="#confirm" data-original-title="Supprimer">Supprimer</button>
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

@push('partner')
<script>
    function deleteData(id)
    {
        var id = id;
        var url = '{{ route("admin.partners.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }

    function formSubmit()
    {
        $("#deleteForm").submit();
    }
</script>
@endpush