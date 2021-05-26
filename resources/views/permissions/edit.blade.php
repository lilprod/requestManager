@extends('layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Permissions</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Permissions</a></li>
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
    <div class="col-lg-5 col-lg-offset-4">
        @include('inc.messages')

        <div class="card">
            <div class="card-header">
                <h5>Editer Permission </h5>
            </div>

            {{ Form::model($permission, array('route' => array('admin.permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

            <div class="card-body">

                <div class="form-group">
                    {{ Form::label('name', 'Nom de la permission') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

           </div>

            <div class="card-footer">
                {{ Form::submit('Editer permission', array('class' => 'btn btn-primary btn-block')) }}
                <button class="btn btn-danger ms-2" type="reset">Effacer</button>
                <a class="btn btn-primary btn-block ms-2" href="{{url()->previous()}}"> Retour </a>
			</div>
		    {{ Form::close() }}
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

@endsection