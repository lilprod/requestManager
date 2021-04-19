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
                    <li class="breadcrumb-item">Détails</li>
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
                <h5>Détails Réclamation </h5>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-12">
                                <h6><i class="feather icon-user"></i> Emis par :</h6>
                            </div>

                            <div class="w-100">
                                <div class="row mb-2">
                                    <div class="col-4 f-w-500"><h6>Partenaire:</h6></div>
                                    <div class="col-8">{{$complaint->user->name}} {{$complaint->user->firstname}}</div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h6>Type de requête:</h6>
                            <p class="mb-1">{{$complaint->type->title}}</p>
                        </div>

                        <div class="mt-4">
                            <h6>Titre :</h6>
                            <p class="mb-1">{{$complaint->title}}</p>
                            <!--<h3>$139.58 <del class="text-danger font-weight-normal h5"> <small>$322.53</small></del> <small class="text-success h5">86% off</small></h3>
                            <h5><span class="badge bg-success">3.8 <i class="feather icon-star-on"></i></span> 179 ratings and 43 reviews</h5>
                            -->
                        </div>
                        <!--<h6 class="text-muted">Jolyecart logistic</h6>
                        <h3 class="mt-0">Women Purple Sling Bag <a href="javascript: void(0);" class="text-muted"><i class="mdi mdi-square-edit-outline ms-2"></i></a> </h3>
                        -->

                        <div class="mt-4">
                            <h6>Date de l'incident :</h6>
                            <p class="mb-1"> {{\Carbon\Carbon::parse($complaint->incident_date)->format('d/m/Y')}}</p>
                        </div>

                        <div class="mt-4">
                            <h6>Date de soumission :</h6>
                            <p class="mb-1"> {{$complaint->created_at->format('d/m/Y')}}</p>
                        </div>

                        <div class="mt-4">
                            <h6>Statut :</h6>
                            @if($complaint->status)
                                <h5><span class="badge bg-success">Traité</span></h5>
                            @else
                                <h5><span class="badge bg-warning">En attente</span></h5>
                            @endif
                        </div>
                        
                        <!--<div class="mt-4">
                            <ul class="list-unstyled">
                                <li>
                                    <div class="media">
                                        <i class="fas fa-tag text-success me-2 mt-2"></i>
                                        <div class="media-body">
                                            <strong class="">Bank Offer</strong>
                                            <span>10% Instant Discount on ABCD Bank Credit &amp; Debit Cards</span>
                                            <a href="#!">T&amp;C</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>-->
                        @if($complaint->status)
                        <div class="row">
                            <div class="col-12">
                                <h6><i class="feather icon-user"></i> Traité par :</h6>
                            </div>

                            <div class="w-100">
                                <div class="row mb-2">
                                    <div class="col-4 f-w-500">Nom et Prénomm(s)</div>
                                    <div class="col-8">{{$complaint->ressource->name}} {{$complaint->ressource->firstname}}</div>
                                </div>
                            </div>
                            <!--<div class="col-sm-6 mt-md-0 mt-2">
                                <div class="form-group">
                                    <label class="form-label" for="pincode">Enter delivery pincode</label>
                                    <input type="password" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-sm-6 text-sm-end mt-md-0 mt-2">
                                <div class="form-group">
                                    <label class="form-label" for="pincode">Quantity</label>
                                    <input type="number" min="1" value="1" class="form-control" placeholder="Qty">
                                </div>
                            </div>-->
                        </div>
                        @endif
                        <div class="col-lg-12">
                            <div class="mt-4">
                                <h6>Commentaire:</h6>
                                <p>{!! \Illuminate\Support\Str::limit($complaint->description) !!}</p>
                                    <!--<div class="w-100">
                                        <div class="row mb-2">
                                            <div class="col-4 f-w-500">Material</div>
                                            <div class="col-8">PU</div>
                                        </div>
                                    </div>
                                    <h6><a href="#!">Manufacturing, Packaging and Import Info</a></h6>-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm mb-3 btn-round"> <i class="fa fa-arrow-left"></i>
                                    Retour</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- [ Main Content ] end -->

@endsection