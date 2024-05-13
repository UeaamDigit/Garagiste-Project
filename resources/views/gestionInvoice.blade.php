<?php
use Illuminate\Support\Facades\Auth;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Garage Car</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <style>
        .search-container {
            text-align: center;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <img src="dist/img/car.png" alt="car" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Garage Car</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/userRed.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">User : {{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Gestion de Clients
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gestionVoiture') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Gestion de Voitures
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gestionCharts') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Gestion de Charts
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gestionReparations') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Gestion de Réparations
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-5">
                            <div class="row">
                                <div class="col">
                                    <a href="" class="btn btn-success">Import Excel</a>
                                </div>
                                <div class="col">
                                    <a href="{{ route('export_user_pdf') }}" class="btn btn-danger">Import PDF</a>
                                </div>
                                <div class="col">
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Language
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="locale/ar">Arabic</a>
                                            <a class="dropdown-item" href="locale/en">English</a>
                                            <a class="dropdown-item" href="locale/fr">French</a>
                                            <a class="dropdown-item" href="locale/es">Spanish</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Facture</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="container mt-5">
                <div class="search-container mb-3">
                    <input id="searchInput" type="text" class="form-control w-50 d-inline"
                        placeholder="Search...">

                    <button id="searchButton" class="btn btn-warning"> <i class="fas fa-search"></i></button>
                    <a href="{{ route('createUser') }}" class="btn btn-info">+ Create a User </a>
                </div>


                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Détails de la Facture</div>

                                <div class="card-body">
                                    <h5>Facture N° {{ $invoice->id }}</h5>
                                    <p>Date de création: {{ $invoice->created_at }}</p>
                                    <p>Réparation associée: {{ $invoice->reparation->id }}</p>
                                    <p>Client: {{ $invoice->client->name }}</p>

                                    <h6>Détails de la Réparation:</h6>
                                    <ul>
                                        <li>Statut: {{ $invoice->reparation->status }}</li>
                                        <!-- Ajoutez d'autres détails de la réparation ici -->
                                    </ul>

                                    <h6>Pièces de Rechange:</h6>
                                    <ul>
                                        @foreach ($invoice->spareParts as $sparePart)
                                            <li>{{ $sparePart->name }} - {{ $sparePart->price }}</li>
                                        @endforeach
                                    </ul>

                                    <h6>Services Supplémentaires:</h6>
                                    <ul>
                                        @foreach ($invoice->additionalServices as $service)
                                            <li>{{ $service->name }} - {{ $service->price }}</li>
                                        @endforeach
                                    </ul>

                                    <p>Total: {{ $invoice->total_amount }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>

    @include('modals.showUserModal')
    @include('modals.deleteUserModal')

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <script>
        document.getElementById("searchButton").addEventListener("click", function() {
            var searchText = document.getElementById("searchInput").value.toLowerCase();

            var rows = document.querySelectorAll("tbody tr");

            rows.forEach(function(row) {
                var cells = row.querySelectorAll("td");

                var matchFound = false;

                cells.forEach(function(cell) {
                    if (cell.textContent.toLowerCase().includes(searchText)) {
                        matchFound = true;
                        return;
                    }
                });

                if (matchFound) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>



</body>

</html>
