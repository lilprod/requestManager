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
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Allo Medic Assistance Administration."/>
      <meta name="keywords" content="Allo Medic Assistance, Admin"/>
      <meta name="author" content="Allo Medic Assistance"/>
      <!-- Favicon icon -->
      <link rel="icon" href="{{asset('assets/images/favicon.svg') }}" type="image/x-icon">
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
            <img src="{{asset('assets/images/logo.svg') }}" alt="" class="logo logo-lg">
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
                  <img src="{{asset('assets/images/logo.svg') }}" alt="" class="logo logo-lg">
                  <img src="{{asset('assets/images/logo-sm.svg') }}" alt="" class="logo logo-sm">
               </a>
            </div>
            <div class="navbar-content">
               <ul class="pc-navbar">
                  <li class="pc-item pc-caption">
                     <label>Navigation</label>
                  </li>

                  <li class="pc-item"><a href="{{route('dashboard')}}" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">home</i></span><span class="pc-mtext">Dashboard</span></a></li>

                
                  
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
                 
                 <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">account_circle</i></span><span class="pc-mtext">Administrateurs</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                       <li class="pc-item"><a class="pc-link" href="{{route('admin.admins.index')}}">Administrateurs</a></li>
                       <li class="pc-item"><a class="pc-link" href="{{route('admin.admins.create')}}">Ajouter</a></li>
                    </ul>
                 </li>

                 <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">edit</i></span><span class="pc-mtext">Types Requêtes</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                       <li class="pc-item"><a class="pc-link" href="{{route('admin.typecomplaints.index')}}">Liste</a></li>
                       <li class="pc-item"><a class="pc-link" href="{{route('admin.typecomplaints.create')}}">Ajouter</a></li>
                    </ul>
                 </li>

                 <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">library_add_check</i></span><span class="pc-mtext">Requêtes</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                       <li class="pc-item"><a class="pc-link" href="{{route('admin.complaints.index')}}">Liste</a></li>
                       <li class="pc-item"><a class="pc-link" href="{{route('admin.complaints.create')}}">Ajouter</a></li>
                    </ul>
                 </li>

                 <li class="pc-item pc-hasmenu">
                  <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">portrait</i></span><span class="pc-mtext">Partenaires</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                  <ul class="pc-submenu">
                     <li class="pc-item"><a class="pc-link" href="{{route('admin.partners.index')}}">Liste</a></li>
                     <li class="pc-item"><a class="pc-link" href="{{route('admin.partners.create')}}">Ajouter</a></li>
                  </ul>
               </li>


                 <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">portrait</i></span><span class="pc-mtext">Personnels</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                       <li class="pc-item"><a class="pc-link" href="{{route('admin.ressources.index')}}">Liste</a></li>
                       <li class="pc-item"><a class="pc-link" href="{{route('admin.ressources.create')}}">Ajouter</a></li>
                    </ul>
                 </li>

                 <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">healing</i></span><span class="pc-mtext">Opérateurs</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                       <li class="pc-item"><a class="pc-link" href="{{route('admin.operators.index')}}">Liste</a></li>
                       <li class="pc-item"><a class="pc-link" href="{{route('admin.operators.create')}}">Ajouter</a></li>
                    </ul>
                 </li>

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
                     <span class="user-desc">Administrator</span>
                     </span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                        <!--<div class=" dropdown-header">
                           <h5 class="text-overflow m-0"><span class="badge bg-light-success">Pro</span></h5>
                        </div>-->
                        <a href="{{ route('profils.index') }}" class="dropdown-item">
                        <i class="material-icons-two-tone">account_circle</i>
                        <span>Profile</span>
                        </a>

                        <!--<a href="#" class="dropdown-item">
                        <i class="material-icons-two-tone">https</i>
                        <span>Lock Screen</span>
                        </a>-->
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="material-icons-two-tone">chrome_reader_mode</i>
                        <span>Logout</span>
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
               // geoIpLookup: function(callback) {
               //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
               //     var countryCode = (resp && resp.country) ? resp.country : "";
               //     callback(countryCode);
               //   });
               // },
               // hiddenInput: "full_number",
               // initialCountry: "auto",
               // localizedCountries: { 'de': 'Deutschland' },
               // nationalMode: false,
               // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
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
             //"sInfo" : "Afficher START à END des TOTAL lignes",
             "sInfoEmpty" : "Afficher 0 à 0 des 0 données",
             //"sInfoFiltered" : "Trié de MAX lignes totales",
             "sEmptyTable" : "Pas de données disponible dans la table",
             //"sLengthMenu" : "Afficher MENU lignes",
             "sZeroRecords" : "Aucune donnée correspondante trouvée"
           }
         });
 
         $(document).ready(function () {
             $('#simpletable').DataTable();
         });
     </script>

      @stack('role')
      @stack('permission')
      @stack('admin')
      @stack('offer')
      @stack('institution')
      @stack('staff')
      @stack('category')
      @stack('service')
      @stack('structure')
      @stack('speciality')
      @stack('scripts')
      @stack('slug')
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script> -->
      <!-- <script src="assets/js/plugins/clipboard.min.js"></script> -->
      <!-- <script src="assets/js/uikit.min.js"></script> -->
      <div class="pct-customizer">
         <div class="pct-c-btn">
            <button class="btn btn-light-danger" id="pct-toggler">
            <i data-feather="settings"></i>
            </button>
            <button class="btn btn-light-primary" data-bs-toggle="tooltip" title="Document" data-placement="left">
            <i data-feather="book"></i>
            </button>
            <button class="btn btn-light-success" data-bs-toggle="tooltip" title="Buy Now" data-placement="left">
            <i data-feather="shopping-bag"></i>
            </button>
            <button class="btn btn-light-info" data-bs-toggle="tooltip" title="Support" data-placement="left">
            <i data-feather="headphones"></i>
            </button>
         </div>
         <div class="pct-c-content ">
            <div class="pct-header bg-primary">
               <h5 class="mb-0 text-white f-w-500">DashboardKit Customizer</h5>
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
                 $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo-dark.svg');
                 $('.theme-color.brand-color').addClass('d-none');
             }
         });
         $('.brand-color > a').on('click', function() {
             var temp = $(this).attr('data-value');
             if (temp == "bg-default") {
                 $('.m-header').removeClassPrefix('bg-');
             } else {
                 $('.m-header').removeClassPrefix('bg-');
                 $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo.svg');
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
                 $("#main-style-link").attr("href", "assets/css/style-dark.css");
             } else {
                 $("#main-style-link").attr("href", "assets/css/style.css");
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
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q8H86P6FK7"></script>
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());
         gtag('config', 'G-Q8H86P6FK7');
      </script>
      <script src="{{asset('assets/js/%c3%a1%c2%b9%c2%adrack.html') }}"></script>
   </body>
</html>