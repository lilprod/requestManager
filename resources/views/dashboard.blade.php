@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tableau de bord') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Vous êtes connecté!') }}
                </div>
            </div>
        </div>


        

        @can('Admin Permissions')
            <div class="col-sm-3">
                <div class="card prod-p-card background-pattern">
                    <div class="card-body">
                        <div class="row align-items-center m-b-0">
                            <div class="col">
                                <h6 class="m-b-5">Admin</h6>
                                <h3 class="m-b-0">{{$admins}}</h3>
                            </div>
                            <div class="col-auto">
                                <i class="material-icons-two-tone text-primary">account_circle</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card prod-p-card background-pattern">
                    <div class="card-body">
                        <div class="row align-items-center m-b-0">
                            <div class="col">
                                <h6 class="m-b-5">Partenaires</h6>
                                <h3 class="m-b-0">{{$partners}}</h3>
                            </div>
                            <div class="col-auto">
                                <i class="material-icons-two-tone text-primary">portrait</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card prod-p-card background-pattern">
                    <div class="card-body">
                        <div class="row align-items-center m-b-0">
                            <div class="col">
                                <h6 class="m-b-5">Personnels</h6>
                                <h3 class="m-b-0">{{$ressources}}</h3>
                            </div>
                            <div class="col-auto">
                                <i class="material-icons-two-tone text-primary">portrait</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card prod-p-card background-pattern">
                    <div class="card-body">
                        <div class="row align-items-center m-b-0">
                            <div class="col">
                                <h6 class="m-b-5">Opérateurs</h6>
                                <h3 class="m-b-0">{{$operators}}</h3>
                            </div>
                            <div class="col-auto">
                                <i class="material-icons-two-tone text-primary">home</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Graphes des requêtes') }}</div>
    
                    <div class="card-body">
                        <h5>{{ $chart1->options['chart_title'] }}</h5>
                        {!! $chart1->renderHtml() !!}
                    </div>
                </div>
            </div>
        @endcan

        @can('Chief Service Permissions')

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                        <div class="col-auto">
                            <i class="fas fa-clock f-36 text-info"></i>
                        </div>
                        <div class="col-auto">
                            <h6 class="text-muted m-b-10">Total Requêtes en attente</h6>
                            <h2 class="m-b-0">{{$pendingcomplaints}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                        <div class="col-auto">
                            <i class="fas fa-book-open f-36 text-danger"></i>
                        </div>
                        <div class="col-auto">
                            <h6 class="text-muted m-b-10">Total Requêtes traitées</h6>
                            <h2 class="m-b-0">{{$archivedcomplaints}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                        <div class="col-auto">
                            <i class="fas fa-clock f-36 text-success"></i>
                        </div>
                        <div class="col-auto">
                            <h6 class="text-muted m-b-10">Requêtes de la journée</h6>
                            <h2 class="m-b-0">{{$todaypendingcomplaints}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                        <div class="col-auto">
                            <i class="fas fa-book-open f-36 text-primary"></i>
                        </div>
                        <div class="col-auto">
                            <h6 class="text-muted m-b-10">Requêtes traitées dans la journée</h6>
                            <h2 class="m-b-0">{{$todayproceedcomplaints}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Graphes des requêtes') }}</div>

                <div class="card-body">
                    <h5>{{ $chart1->options['chart_title'] }}</h5>
                    {!! $chart1->renderHtml() !!}
                </div>
            </div>
        </div>
        
        @endcan

        @can('Ressource Permissions')

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                        <div class="col-auto">
                            <i class="fas fa-clock f-36 text-primary"></i>
                        </div>
                        <div class="col-auto">
                            <h6 class="text-muted m-b-10">Mes Requêtes en attente</h6>
                            <h2 class="m-b-0">{{$pendingcomplaints}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                        <div class="col-auto">
                            <i class="fas fa-book-open f-36 text-success"></i>
                        </div>
                        <div class="col-auto">
                            <h6 class="text-muted m-b-10">Mes Requêtes traitées</h6>
                            <h2 class="m-b-0">{{$archivedcomplaints}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endcan

        @can('Partner Permissions')
            <div class="col-sm-6">
                <div class="card prod-p-card background-pattern">
                    <div class="card-body">
                        <div class="row align-items-center m-b-0">
                            <div class="col">
                                <h6 class="m-b-5">Total Requêtes en attente</h6>
                                <h3 class="m-b-0">{{$pendingcomplaints}}</h3>
                            </div>
                            <div class="col-auto">
                                <i class="material-icons-two-tone text-primary">local_offer</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card prod-p-card bg-primary background-pattern-white">
                    <div class="card-body">
                        <div class="row align-items-center m-b-0">
                            <div class="col">
                                <h6 class="m-b-5 text-white">Total Requêtes traités</h6>
                                <h3 class="m-b-0 text-white">{{$archivedcomplaints}}</h3>
                            </div>
                            <div class="col-auto">
                                <i class="material-icons-two-tone text-white">local_mall</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        <!--<div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-4">Daily Sales</h6>
                    <div class="row d-flex align-items-center">
                        <div class="col-9">
                            <h3 class="f-w-300 d-flex align-items-center "><i class="feather icon-arrow-up text-success f-30 m-r-10"></i>$249.95</h3>
                        </div>
                        <div class="col-3 text-end">
                            <p class="">67%</p>
                        </div>
                    </div>
                    <div class="progress m-t-30" style="height: 7px;">
                        <div class="progress-bar bg-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>-->

       <!-- <div class="col-sm-6">
            <div class="card prod-p-card bg-primary background-pattern-white">
                <div class="card-body">
                    <div class="row align-items-center m-b-0">
                        <div class="col">
                            <h6 class="m-b-5 text-white">Average Price</h6>
                            <h3 class="m-b-0 text-white">$6,780</h3>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons-two-tone text-white">monetization_on</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card prod-p-card background-pattern">
                <div class="card-body">
                    <div class="row align-items-center m-b-0">
                        <div class="col">
                            <h6 class="m-b-5">Product Sold</h6>
                            <h3 class="m-b-0">6,784</h3>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons-two-tone text-primary">local_offer</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
</div>
@endsection

@push('javascript')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@endpush
