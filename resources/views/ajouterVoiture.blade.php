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
                            <a href="{{ route('gestionClients') }}" class="nav-link active">
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
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> Gestion de Voitures</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Table</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">


                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">{{ __('Gestion des Véhicules par Client') }}</div>

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('addCar') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="marque"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Marque du véhicule') }}</label>

                                                <div class="col-md-6">
                                                    <input id="marque" type="text" class="form-control"
                                                        name="marque" required autofocus>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="modele"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Modèle du véhicule') }}</label>

                                                <div class="col-md-6">
                                                    <input id="modele" type="text" class="form-control"
                                                        name="modele" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="carburant"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Type de carburant') }}</label>

                                                <div class="col-md-6">
                                                    <select id="carburant" class="form-control" name="carburant"
                                                        required>
                                                        <option value="essence">{{ __('Essence') }}</option>
                                                        <option value="diesel">{{ __('Diesel') }}</option>
                                                        <option value="hybride">{{ __('Hybride') }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="immatriculation"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Numéro d\'immatriculation') }}</label>

                                                <div class="col-md-6">
                                                    <input id="immatriculation" type="text" class="form-control"
                                                        name="immatriculation" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="photos"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('Photos du véhicule') }}</label>

                                                <div class="col-md-6">
                                                    <input id="photos" type="file" class="form-control"
                                                        name="photos[]" multiple required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Ajouter') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


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


</body>

</html>
