@extends('layouts.app')

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Réclamations</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#!">Réclamations</a></li>
                    <li class="breadcrumb-item">Nouveau</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->

<!-- [ Main Content ] start -->
<div class="row">

    <div class="col-sm-12">
        @include('inc.messages')
        <div class="card">
            <div class="card-header">
                <h5>Nouvelle Réclamation </h5>
            </div>

            <form method="POST" enctype="multipart/form-data" autocomplete="off" id="store_complaint" action="{{ route('complaints.store') }}">
                {{csrf_field()}}

                <div class="card-body">
                <!-- Add Blog -->
            
                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date de l'incident <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="incident_date" id="incident_date" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type requête <span class="text-danger">*</span></label>
                                <select class="form-control select" name="type_complaint_id">
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}">{{$type->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Titre <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="title" id="title">
                            </div>
                        </div>
                    </div>

                    <!-- /Basic Information -->
          
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Commentaire <span class="text-danger">*</span></label>
                                <textarea id="classic-editor" class="form-control service-desc" rows="6" name="body"></textarea>
                            </div>
                        </div>
                    </div>
      
                </div>
            <!-- /Add Blog -->
       

                <div class="card-footer">
                    <div class="submit-section">
                        <button class="btn btn-primary btn-lg" type="submit" name="form_submit">Enregister</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
<!-- [ Main Content ] end -->

@endsection