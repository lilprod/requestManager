<!DOCTYPE html>
<html lang="fr">
   <head>
      <title>Request Manager | Admin</title>
      <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 11]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Request Manager Administration."/>
      <meta name="keywords" content="Request Manager, Admin"/>
      <meta name="author" content="Request Manager"/>
      <!-- Favicon icon -->
      <link rel="icon" href="{{asset('assets/images/favicon.ico') }}" type="image/x-icon">
      <!-- data tables css -->
      <link rel="stylesheet" href="{{asset('assets/css/plugins/dataTables.bootstrap4.min.css') }}">
      <link rel="stylesheet" href="{{asset('assets/fonts/cryptofont.css') }}">
      <!-- font css -->
      <link rel="stylesheet" href="{{asset('assets/fonts/feather.css') }}">
      <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome.css') }}">
      <link rel="stylesheet" href="{{asset('assets/fonts/material.css') }}">
      <!-- vendor css -->
      <link rel="stylesheet" href="{{asset('assets/css/style.css') }}" id="main-style-link">
      <link rel="stylesheet" href="{{asset('assets/css/customizer.css') }}">
      <link rel="stylesheet" href="{{asset('css/intlTelInput.css') }}">
      {{-- <!-- Jquery css -->
      <link rel="stylesheet" href="{{asset('css/jquery-ui.css') }}">
      
      <!-- Jquery Script -->
      <script src="{{asset('js/jquery.js') }}"></script>
      <script src="{{asset('js/jquery-ui.min.js') }}"></script> --}}

      <style>
        .iti { width: 100%; }

        .iti__flag {background-image: url("{{asset('images/flags.png') }}");}

        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
        .iti__flag {background-image: url("{{asset('images/flags@2x.png') }}");}
        }
      </style>
      
   </head>

   <body class="">

      <!-- [ Pre-loader ] start -->
      <div class="loader-bg">
         <div class="loader-track">
            <div class="loader-fill"></div>
         </div>
      </div>
      <!-- [ Pre-loader ] End -->

      <!-- [ Mobile header ] start -->
      <div class="pc-mob-header pc-header">
         <div class="pcm-logo">
            <img src="{{asset('assets/images/moovafrica.png') }}" alt="" class="logo logo-lg">
         </div>
         <div class="pcm-toolbar">
            <a href="#!" class="pc-head-link" id="mobile-collapse">
               <div class="hamburger hamburger--arrowturn">
                  <div class="hamburger-box">
                     <div class="hamburger-inner"></div>
                  </div>
               </div>
               <!-- <i data-feather="menu"></i> -->
            </a>
            <a href="#!" class="pc-head-link" id="headerdrp-collapse">
            <i data-feather="align-right"></i>
            </a>
            <a href="#!" class="pc-head-link" id="header-collapse">
            <i data-feather="more-vertical"></i>
            </a>
         </div>
      </div>
      <!-- [ Mobile header ] End -->

      <!-- [ navigation menu ] start -->
      <nav class="pc-sidebar ">
         <div class="navbar-wrapper">
            <div class="m-header">
               <a href="{{route('dashboard')}}" class="b-brand">
                  <!-- ========   change your logo hear   ============ -->
                  <img src="{{asset('assets/images/moovafrica.png') }}" alt="" class="logo logo-lg">
                  <img src="{{asset('assets/images/moovafrica.png') }}" alt="" class="logo logo-sm">
               </a>
            </div>
            <div class="navbar-content">
               <ul class="pc-navbar">
                  <li class="pc-item pc-caption">
                     <label>Navigation</label>
                  </li>

                  <li class="pc-item"><a href="{{route('dashboard')}}" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">home</i></span><span class="pc-mtext">Tableau de bord</span></a></li>

                  <!-- Operator-->
                  @can('Operator Permissions')

                  <li class="pc-item pc-caption">
                     <label>Types Rêquetes</label>
                  </li>

                  <li class="pc-item pc-hasmenu">
                     <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">edit</i></span><span class="pc-mtext">Types Requêtes</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                     <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.typecomplaints.index')}}">Liste</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.typecomplaints.create')}}">Ajouter</a></li>
                     </ul>
                  </li>

                  <li class="pc-item pc-caption">
                     <label>Rêquetes</label>
                  </li>
 
                  <li class="pc-item pc-hasmenu">
                     <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">library_add_check</i></span><span class="pc-mtext">Requêtes</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                     <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('complaints.index')}}">Liste</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('complaints.create')}}">Ajouter</a></li>
                     </ul>
                  </li>

                  <li class="pc-item pc-caption">
                     <label>Partenaires</label>
                  </li>

                  <li class="pc-item pc-hasmenu">
                     <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">portrait</i></span><span class="pc-mtext">Partenaires</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                     <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.partners.index')}}">Liste</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.partners.create')}}">Ajouter</a></li>
                     </ul>
                  </li>

                  <li class="pc-item pc-caption">
                     <label>Personnel</label>
                  </li>
   
                  <li class="pc-item pc-hasmenu">
                     <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">portrait</i></span><span class="pc-mtext">Personnel</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                     <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.ressources.index')}}">Liste</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.ressources.create')}}">Ajouter</a></li>
                     </ul>
                  </li>

                  @endcan

                  <!-- /Operator-->

                  <!-- Partners-->

                  @can('Partner Permissions')

                  <li class="pc-item pc-caption">
                     <label>Rêquetes</label>
                  </li>

                  <li class="pc-item pc-hasmenu">
                     <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">library_add_check</i></span><span class="pc-mtext">Mes Requêtes</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                     <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('complaints.create')}}">Nouvelle Requête</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('partner.partner_pending_complaints')}}">Requêtes en attente</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('partner.partner_archived_complaints')}}">Requêtes archivés</a></li>
                     </ul>
                  </li>
                  @endcan

               <!-- /Partners-->

               <!-- Ressources-->
                  @can('Ressource Permissions')

                  <li class="pc-item pc-caption">
                     <label>Rêquetes</label>
                  </li>

                  <li class="pc-item pc-hasmenu">
                     <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">library_add_check</i></span><span class="pc-mtext">Mes Requêtes</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                     <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('ressource.ressource_pending_complaints')}}">Requêtes en attente</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('ressource.myprocessed_complaints')}}">Mes Requêtes traités</a></li>
                     </ul>
                  </li>

                  <li class="pc-item pc-caption">
                     <label>Etats</label>
                  </li>

                  <li class="pc-item pc-hasmenu">
                     <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">edit</i></span><span class="pc-mtext">Etats</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                     <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('ressource.complaint_partner')}}">Requêtes par Partenaire</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('ressource.complaint_type')}}">Requêtes par Type</a></li>
                     </ul>
                  </li>

                 <!-- 
                  <li class="pc-item"><a href="{{route('ressource.complaint_recap')}}" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">chrome_reader_mode</i></span><span class="pc-mtext">Recap</span></a></li>
                  -->
               @endcan

               <!-- /Ressources-->

               <!-- Chief Service Permissions -->

               @can('Chief Service Permissions')
                  
                  <li class="pc-item pc-caption">
                     <label>Rêquetes</label>
                  </li>

                  <li class="pc-item pc-hasmenu">
                     <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">library_add_check</i></span><span class="pc-mtext">Mes Requêtes</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                     <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('chief.ressource.ressource_pending_complaints')}}">Requêtes en attente</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('chief.ressource.myprocessed_complaints')}}">Requêtes traités</a></li>
                     </ul>
                  </li>

                  <li class="pc-item pc-caption">
                     <label>Etats</label>
                  </li>

                  <li class="pc-item pc-hasmenu">
                     <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">edit</i></span><span class="pc-mtext">Etats</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                     <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('ressource.complaint_partner')}}">Requêtes par Partenaire</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('ressource.complaint_type')}}">Requêtes par Type</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('chief.ressource.recap')}}">Traitement par Agent/Période</a></li>
                     </ul>
                  </li>

                  <!-- 
                  <li class="pc-item"><a href="{{route('ressource.complaint_recap')}}" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">chrome_reader_mode</i></span><span class="pc-mtext">Recap</span></a></li>
                  -->
               @endcan
               <!-- /Chief Service Permissions -->

               <!-- Admin -->
                  
                  @can('Admin Permissions')

                  <li class="pc-item pc-caption">
                     <label>Administration</label>
                  </li>

                  <li class="pc-item pc-hasmenu">
                     <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">account_circle</i></span><span class="pc-mtext">Administrateurs</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                     <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.admins.index')}}">Administrateurs</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.admins.create')}}">Ajouter</a></li>
                     </ul>
                  </li>
                  
                  <li class="pc-item pc-hasmenu">
                     <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">https</i></span><span class="pc-mtext">Permissions</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                     <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.permissions.index')}}">Permissions</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{route('admin.permissions.create')}}">Ajouter</a></li>
                     </ul>
                  </li>

                  <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">lock</i></span><span class="pc-mtext">Rôles</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                       <li class="pc-item"><a class="pc-link" href="{{route('admin.roles.index')}}">Rôles</a></li>
                       <li class="pc-item"><a class="pc-link" href="{{route('admin.roles.create')}}">Ajouter</a></li>
                    </ul>
                 </li>

                 <li class="pc-item pc-caption">
                  <label>Villes</label>
                 </li>

                 <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">map</i></span><span class="pc-mtext">Villes</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                       <li class="pc-item"><a class="pc-link" href="{{route('admin.villes.index')}}">Liste</a></li>
                       <li class="pc-item"><a class="pc-link" href="{{route('admin.villes.create')}}">Ajouter</a></li>
                    </ul>
                 </li>

                 <li class="pc-item pc-caption">
                  <label>Types Rêquetes</label>
                 </li>

                 <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">edit</i></span><span class="pc-mtext">Types Requêtes</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                       <li class="pc-item"><a class="pc-link" href="{{route('admin.typecomplaints.index')}}">Liste</a></li>
                       <li class="pc-item"><a class="pc-link" href="{{route('admin.typecomplaints.create')}}">Ajouter</a></li>
                    </ul>
                 </li>

                 <li class="pc-item pc-caption">
                   <label>Rêquetes</label>
                 </li>

                 <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">library_add_check</i></span><span class="pc-mtext">Requêtes</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                       <li class="pc-item"><a class="pc-link" href="{{route('complaints.index')}}">Liste</a></li>
                       <!--<li class="pc-item"><a class="pc-link" href="{{route('complaints.create')}}">Ajouter</a></li>-->
                    </ul>
                 </li>

                 <li class="pc-item pc-caption">
                  <label>Partenaires</label>
                 </li>

                 <li class="pc-item pc-hasmenu">
                  <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">portrait</i></span><span class="pc-mtext">Partenaires</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                  <ul class="pc-submenu">
                     <li class="pc-item"><a class="pc-link" href="{{route('admin.partners.index')}}">Liste</a></li>
                     <li class="pc-item"><a class="pc-link" href="{{route('admin.partners.create')}}">Ajouter</a></li>
                  </ul>
                </li>

               <li class="pc-item pc-caption">
                  <label>Personnel</label>
               </li>

               <li class="pc-item pc-hasmenu">
                  <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">portrait</i></span><span class="pc-mtext">Personnel</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                  <ul class="pc-submenu">
                     <li class="pc-item"><a class="pc-link" href="{{route('admin.ressources.index')}}">Liste</a></li>
                     <li class="pc-item"><a class="pc-link" href="{{route('admin.ressources.create')}}">Ajouter</a></li>
                  </ul>
               </li>

               <li class="pc-item pc-caption">
                  <label>Opérateurs</label>
               </li>

               <li class="pc-item pc-hasmenu">
                  <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">healing</i></span><span class="pc-mtext">Opérateurs</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                  <ul class="pc-submenu">
                     <li class="pc-item"><a class="pc-link" href="{{route('admin.operators.index')}}">Liste</a></li>
                     <li class="pc-item"><a class="pc-link" href="{{route('admin.operators.create')}}">Ajouter</a></li>
                  </ul>
               </li>

                 @endcan

                 <!-- /Admin-->

                </ul>
            </div>
         </div>
      </nav>
      <!-- [ navigation menu ] end -->

      <!-- [ Header ] start -->
      <header class="pc-header ">
         <div class="header-wrapper">
            <div class="me-auto pc-mob-drp">
               <ul class="list-unstyled">
                  
               </ul>
            </div>
            <div class="ms-auto">
               <ul class="list-unstyled">
                  <li class="dropdown pc-h-item">
                     <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                     <i class="material-icons-two-tone">search</i>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end pc-h-dropdown drp-search">
                        <!--<form class="px-3">
                           <div class="form-group mb-0 d-flex align-items-center">
                              <i data-feather="search"></i>
                              <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
                           </div>
                        </form>-->
                     </div>
                  </li>
                  
                  
                  <li class="dropdown pc-h-item">
                     <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                     <img src="{{url('/storage/profile_images/'.auth()->user()->profile_picture ) }}" alt="user-image" class="user-avtar">
                     <span>
                     <span class="user-name">{{Auth()->user()->name}} {{Auth()->user()->firstname}}</span>
                     <span class="user-desc">{{  Auth()->user()->roles()->pluck('name')->implode(' ') }}</span>
                     </span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                        <!--<div class=" dropdown-header">
                           <h5 class="text-overflow m-0"><span class="badge bg-light-success">Pro</span></h5>
                        </div>-->
                        <a href="{{ route('profils.index') }}" class="dropdown-item">
                        <i class="material-icons-two-tone">account_circle</i>
                        <span>Profil</span>
                        </a>

                        <!--<a href="#" class="dropdown-item">
                        <i class="material-icons-two-tone">https</i>
                        <span>Lock Screen</span>
                        </a>-->
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="material-icons-two-tone">chrome_reader_mode</i>
                        <span>Déconnexion</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </header>

      
      <!-- [ Header ] end -->

      <!-- [ Main Content ] start -->
      <div class="pc-container">
         <div class="pcoded-content">

            @yield('content')

         </div>
      </div>
      <!-- [ Main Content ] end -->
     
      <!-- Required Js -->
      <script src="{{asset('assets/js/vendor-all.min.js') }}"></script> 

      <script>
         /* // CSRF Token
         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

         $(function () {
            $('#city').autocomplete({
               source:function(request,response){
                  
                     // Fetch data
                     $.ajax({
                        url:"{{route('api_cities')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                           _token: CSRF_TOKEN,
                           search: request.term
                        },
                        success: function( data ) {
                           response( data );
                        }
                     });
               },
               minLength:1,
               delay:500,
               select:function(event,ui){
                    // $('#city').val(ui.item.title)
                     // Set selection
                     $('#city').val(ui.item.label); // display the selected text
                     $('#city').val(ui.item.label); // save selected id to input
                     //$('#city').val(ui.item.value); // save selected id to input
                     return false;
               }
            })
         }) */

         // keyup function looks at the keys typed on the search box
         $('#city').on('keyup',function() {
            // the text typed in the input field is assigned to a variable 
            var query = $(this).val();
            // call to an ajax function
            if(query ==''){

               $('#city_list').html("");
               $('#city').val() = '';
            }else{

               $.ajax({
                  // assign a controller function to perform search action - route name is search
                  url:"{{ route('getCities') }}",
                  // since we are getting data methos is assigned as GET
                  type:"GET",
                  // data are sent the server
                  data:{'ville':query},
                  // if search is succcessfully done, this callback function is called
                  success:function (data) {
                     // print the search results in the div called country_list(id)
                     $('#city_list').html(data);
                  }
               })
               // end of ajax call
            }
         });


         // initiate a click function on each search result
         $(document).on('click', 'li', function(){
            // declare the value in the input field to a variable
            var value = $(this).text();
            // assign the value to the search box
            $('#city').val($(this).attr('data-id'))
            //console.log($('#city').val());
           // $('#collector').val(value);
            // after click is done, search results segment is made empty
            $('#city_list').html("");
         });

      </script>
      <script>
         $('#name').keyup(function(){
            $(this).val($(this).val().toUpperCase());
         });

         $('#nif').keyup(function(){
            $(this).val($(this).val().toUpperCase());
         });

         $('#firstname').keyup(function() 
         {
               var str = $('#firstname').val();
            
               
               var spart = str.split(" ");
               for ( var i = 0; i < spart.length; i++ )
               {
                  var j = spart[i].charAt(0).toUpperCase();
                  spart[i] = j + spart[i].substr(1);
               }

            $('#firstname').val(spart.join(" "));
         
         });
      </script>
      <script src="{{asset('assets/js/plugins/bootstrap.min.js') }}"></script>
      <script src="{{asset('assets/js/plugins/feather.min.js') }}"></script>
      <script src="{{asset('assets/js/pcoded.min.js') }}"></script>

      <script src="{{asset('js/intlTelInput.js') }}"></script>
      <script>
         var input = document.querySelector("#phone");
         output = document.querySelector("#output");
         var iti = window.intlTelInput(input, {
               // allowDropdown: false,
               // autoHideDialCode: false,
               // autoPlaceholder: "off",
               // dropdownContainer: document.body,
               // excludeCountries: ["us"],
               // formatOnDisplay: false,
               initialCountry: "auto",
               geoIpLookup: function(success, failure) {
                  $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "tg";
                  success(countryCode);
                  });
               },
               // hiddenInput: "full_number",
               // initialCountry: "auto",
               // localizedCountries: { 'de': 'Deutschland' },
               // nationalMode: false,
               // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
               onlyCountries: ['tg'],
               // placeholderNumberType: "MOBILE",
               // preferredCountries: ['cn', 'jp'],
               separateDialCode: true,
               utilsScript: "{{asset('js/utils.js') }}" // just for formatting/placeholders etc
         });
         
         var handleChange = function() {
            var text = iti.getNumber();
            //var text = iti.getNumber(intlTelInputUtils.numberFormat.E164);
            
            var textNode = document.createTextNode(text);
            output.innerHTML = "";
            output.appendChild(textNode);
            document.getElementById("output").value=text;
         };
         
         // listen to "keyup", but also "change" to update when the user selects a country
         input.addEventListener('change', handleChange);
         input.addEventListener('keyup', handleChange);

         $('#phone').on('keyup', function() {
            limitText(this, 8)
        });

        function limitText(field, maxChar){
            var ref = $(field),
                val = ref.val();
            if ( val.length >= maxChar ){
                ref.val(function() {
                    console.log(val.substr(0, maxChar))
                    return val.substr(0, maxChar);       
                });
            }
        } 

        $('#phone').keypress(function (e) {    
            var charCode = (e.which) ? e.which : event.keyCode    
            if (String.fromCharCode(charCode).match(/[^0-9]/g))    
                return false;                        
        }); 
      </script>

      <!-- Ckeditor js -->
      <script src="{{asset('assets/js/plugins/ckeditor.js') }}"></script>
      <script type="text/javascript">
        $(window).on('load', function() {
            $(function() {
                  ClassicEditor.create(document.querySelector('#classic-editor'))
                     .catch(error => {
                        console.error(error);
                     });
            });
         });
      </script>


      <!-- datatable Js -->
      <script src="{{asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
      <script src="{{asset('assets/js/plugins/dataTables.bootstrap4.min.js') }}"></script>
      <script src="{{asset('assets/js/pages/data-basic-custom.js') }}"></script>
      <script src="{{asset('assets/js/plugins/buttons.colVis.min.js') }}"></script>
      <script src="{{asset('assets/js/plugins/buttons.print.min.js') }}"></script>
      <script src="{{asset('assets/js/plugins/pdfmake.min.js') }}"></script>
      <script src="{{asset('assets/js/plugins/jszip.min.js') }}"></script>
      <script src="{{asset('assets/js/plugins/dataTables.buttons.min.js') }}"></script>
      <script src="{{asset('assets/js/plugins/buttons.html5.min.js') }}"></script>
      <script src="{{asset('assets/js/plugins/buttons.bootstrap4.min.js') }}"></script>
      <script src="{{asset('assets/js/pages/data-export-custom.js') }}"></script>

      <script>

         $.extend( true, $.fn.dataTable.defaults, {
             //"order" : [[0, "desc"]],
             "language": {
             "search" : "Recherche:",
             "oPaginate":{
               "sFirst":"Premier",
               "sLast":"Dernier",
               "sNext":"Suivant",
               "sPrevious":"Précédent"
             },
               "sInfo" : "Afficher _START_ à _END_ des _TOTAL_ lignes",
               "sInfoEmpty" : "Afficher 0 à 0 des 0 données",
               "sInfoFiltered" : "Trié de _MAX_ lignes totales",
               "sEmptyTable" : "Pas de données disponible dans la table",
               "sLengthMenu" : "Afficher _MENU_ lignes",
               "sZeroRecords" : "Aucune donnée correspondante trouvée",
               "sProcessing": "Traitement en cours ...",
               "oAria": {
                     "sSortAscending":  ": Activer pour trier la colonne par ordre croissant ",
                     "sSortDescending": ": Activer pour trier la colonne par ordre décroissant"
               },
               "select": {
                  "rows": {
                     "_": "%d lignes sélectionnées",
                     "0": "Aucune ligne sélectionnée",
                     "1": "1 ligne sélectionnée"
                  }
               }
           }
         });
 
         $(document).ready(function () {
             $('#simpletable').DataTable();
         });
     </script>

      @stack('javascript')
      @stack('role')
      @stack('permission')
      @stack('admin')
      @stack('complaint')
      @stack('typecomplaint')
      @stack('operator')
      @stack('ressource')
      @stack('partner')
      @stack('range')
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script> -->
      <!-- <script src="assets/js/plugins/clipboard.min.js"></script> -->
      <!-- <script src="assets/js/uikit.min.js"></script> -->
      <div class="pct-customizer">
         <div class="pct-c-btn">
            <button class="btn btn-light-danger" id="pct-toggler">
            <i data-feather="settings"></i>
            </button>
           <!-- <button class="btn btn-light-primary" data-bs-toggle="tooltip" title="Document" data-placement="left">
            <i data-feather="book"></i>
            </button>
            <button class="btn btn-light-success" data-bs-toggle="tooltip" title="Buy Now" data-placement="left">
            <i data-feather="shopping-bag"></i>
            </button>
            <button class="btn btn-light-info" data-bs-toggle="tooltip" title="Support" data-placement="left">
            <i data-feather="headphones"></i>
            </button>-->
         </div>
         <div class="pct-c-content ">
            <div class="pct-header bg-primary">
               <h5 class="mb-0 text-white f-w-500">RequestManager Customizer</h5>
            </div>
            <div class="pct-body">
               <h6 class="mt-2"><i data-feather="credit-card" class="me-2"></i>Header settings</h6>
               <hr class="my-2">
               <div class="theme-color header-color">
                  <a href="#!" class="" data-value="bg-default"><span></span><span></span></a>
                  <a href="#!" class="" data-value="bg-primary"><span></span><span></span></a>
                  <a href="#!" class="" data-value="bg-danger"><span></span><span></span></a>
                  <a href="#!" class="" data-value="bg-warning"><span></span><span></span></a>
                  <a href="#!" class="" data-value="bg-info"><span></span><span></span></a>
                  <a href="#!" class="" data-value="bg-success"><span></span><span></span></a>
                  <a href="#!" class="" data-value="bg-dark"><span></span><span></span></a>
               </div>
               <h6 class="mt-4"><i data-feather="layout" class="me-2"></i>Sidebar settings</h6>
               <hr class="my-2">
               <div class="form-check form-switch">
                  <input type="checkbox" class="form-check-input" id="cust-sidebar">
                  <label class="form-check-label f-w-600 pl-1" for="cust-sidebar">Light Sidebar</label>
               </div>
               <div class="form-check form-switch mt-2">
                  <input type="checkbox" class="form-check-input" id="cust-sidebrand">
                  <label class="form-check-label f-w-600 pl-1" for="cust-sidebrand">Color Brand</label>
               </div>
               <div class="theme-color brand-color d-none">
                  <a href="#!" class="active" data-value="bg-primary"><span></span><span></span></a>
                  <a href="#!" class="" data-value="bg-danger"><span></span><span></span></a>
                  <a href="#!" class="" data-value="bg-warning"><span></span><span></span></a>
                  <a href="#!" class="" data-value="bg-info"><span></span><span></span></a>
                  <a href="#!" class="" data-value="bg-success"><span></span><span></span></a>
                  <a href="#!" class="" data-value="bg-dark"><span></span><span></span></a>
               </div>
               <h6 class="mt-4"><i data-feather="sun" class="me-2"></i>Layout settings</h6>
               <hr class="my-2">
               <div class="form-check form-switch mt-2">
                  <input type="checkbox" class="form-check-input" id="cust-darklayout">
                  <label class="form-check-label f-w-600 pl-1" for="cust-darklayout">Dark Layout</label>
               </div>
            </div>
         </div>
      </div>
      <script>
         $('#pct-toggler').on('click', function() {
             $('.pct-customizer').toggleClass('active');
         });
         $('#cust-sidebrand').change(function() {
             if ($(this).is(":checked")) {
                 $('.theme-color.brand-color').removeClass('d-none');
                 $('.m-header').addClass('bg-dark');
             } else {
                 $('.m-header').removeClassPrefix('bg-');
                 $('.m-header > .b-brand > .logo-lg').attr('src', '{{asset('assets/images/moovafrica.png') }}');
                 $('.theme-color.brand-color').addClass('d-none');
             }
         });
         $('.brand-color > a').on('click', function() {
             var temp = $(this).attr('data-value');
             if (temp == "bg-default") {
                 $('.m-header').removeClassPrefix('bg-');
             } else {
                 $('.m-header').removeClassPrefix('bg-');
                 $('.m-header > .b-brand > .logo-lg').attr('src', '{{asset('assets/images/moovafrica.png') }}');
                 $('.m-header').addClass(temp);
             }
         });
         $('.header-color > a').on('click', function() {
             var temp = $(this).attr('data-value');
             if (temp == "bg-default") {
                 $('.pc-header').removeClassPrefix('bg-');
             } else {
                 $('.pc-header').removeClassPrefix('bg-');
                 $('.pc-header').addClass(temp);
             }
         });
         $('#cust-sidebar').change(function() {
             if ($(this).is(":checked")) {
                 $('.pc-sidebar').addClass('light-sidebar');
                 $('.pc-horizontal .topbar').addClass('light-sidebar');
             } else {
                 $('.pc-sidebar').removeClass('light-sidebar');
                 $('.pc-horizontal .topbar').removeClass('light-sidebar');
             }
         });
         $('#cust-darklayout').change(function() {
             if ($(this).is(":checked")) {
                 $("#main-style-link").attr("href", "{{asset('assets/css/style-dark.css') }}");
             } else {
                 $("#main-style-link").attr("href", "{{asset('assets/css/style.css') }}");
             }
         });
         $.fn.removeClassPrefix = function(prefix) {
             this.each(function(i, it) {
                 var classes = it.className.split(" ").map(function(item) {
                     return item.indexOf(prefix) === 0 ? "" : item;
                 });
                 it.className = classes.join(" ");
             });
             return this;
         };
      </script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
     <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q8H86P6FK7"></script>
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());
         gtag('config', 'G-Q8H86P6FK7');
      </script>
      <script src="{{asset('assets/js/%c3%a1%c2%b9%c2%adrack.html') }}"></script>-->
   </body>
</html>