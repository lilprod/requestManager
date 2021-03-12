@extends('layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Requêtes</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Requêtes</a></li>
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
                <h5> Liste des requêtes </h5>
            </div>
            <div class="card-body">
                <div class="row align-items-center m-l-0">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 text-end">
                        <a href="{{ route('complaints.create') }}" class="btn btn-primary btn-sm mb-3 btn-round" data-toggle="" data-target=""> <i class="fa fa-plus"></i>
                            Ajouter Requête</a>
                    </div>
                </div>
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Types Requêtes</th>
                                <th>Requêtes</th>
                                <th style="width: 10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($complaints as $key=> $complaint)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$complaint->type->title}}</td>
                                <td>{{$complaint->title}}</td>
                                <td>
                                    <a href="{{ route('complaints.show', $complaint->id) }}" class="btn btn-info btn-sm">Voir</a>
                                    <a href="{{ route('complaints.edit', $complaint->id) }}" class="btn btn-info btn-sm">Editer</a>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" onclick="deleteData({{ $complaint->id}})" data-target="#confirm" data-original-title="Supprimer">Supprimer</button>
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

<div class="modal fade" id="exampleModalLive" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" id="InactiveForm" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">Confirmation de suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <p id="acc_msg">Etes-vous sûre de vouloir supprimer cette requête?</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-bs-dismiss="modal">Non, Fermer</a>
                    <button type="submit" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Oui, Supprimer</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('complaint')
<script>
	function postData(id)
     {
         var id = id;
         var url = '{{ route("complaints.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#InactiveForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#InactiveForm").submit();
     }
</script>
@endpush