@extends('admin.layouts.app')

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
                    <li class="breadcrumb-item">Edition</li>
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
                <h5>Edition Réclamation </h5>
            </div>

            <form method="POST" action="{{ route('complaints.update', $complaint->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="card-body">
                <!-- Add Blog -->
            

                    <div class="row form-row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Title <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="title" id="title" value="{{$complaint->title}}">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select" name="category_id">
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}" {{ ($complaint->type_id === $type->id) ? 'selected' : '' }}>{{$type->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                   

                    </div>

                <!-- /Basic Information -->
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Texte de l'offre <span class="text-danger">*</span></label>
                            <textarea id="classic-editor" class="form-control service-desc" rows="6" name="body">{{$complaint->body}}</textarea>
                        </div>
                    </div>
                </div>
                <br><br>

                    <!--<div class="col-md-6">
                        <div class="form-group">
                            <label class="display-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="blog_active" value="1" {{  $complaint->status == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="blog_active">
                                Active
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="blog_inactive" value="0" {{  $complaint->status == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="blog_inactive">
                                Inactive
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                    </div>-->
                </div>
            <!-- /Add Blog -->
            </div>

            <div class="card-footer">
                <div class="submit-section">
                    <button class="btn btn-primary btn-lg" type="submit" name="form_submit">Modifier</button>
                </div>
            </div>

        </form>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
@endsection