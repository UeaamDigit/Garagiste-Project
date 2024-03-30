@extends('layout')
@section('title', 'Home Page')
@section('content')
    <style>
        .card {
            height: 100%;
        }

        .card-img-top {
            height: 200px;
            /* Adjust as needed */
            object-fit: cover;
        }

        .card-body {
            padding: 1.25rem;
        }
    </style>


    <div class="container-fluid p-5">
        <div class="row container">
            <div class="col-md-6 d-flex justify-content-center align-items-center mb-5">
                <img src="{{ asset('mechanic.png') }}" alt="" class="img-fluid">
            </div>

            <div class="col-md-6">
                <div class="card bg-light shadow p-5">
                    <div class="card-body">
                        <h1 class="card-title text-danger">YOUR CAR</h1>
                        <h2 class="bg-dark text-center text-white rounded p-2">In Good Hands</h2>
                        <p class="card-text">
                            Welcome to our car service platform! We offer expert automotive care for all your needs. From
                            routine maintenance to specialized repairs, trust us to keep your car running smoothly.
                        </p>
                        <a href="#" class="btn btn-danger">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 text-center ">
        <h2 class="border-bottom border-danger d-inline-block border-3">Our Services</h2>
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card bg-light shadow p-3">
                    <img src="{{ asset('oil.png') }}" class="card-img-top" alt="Oil Change">
                    <div class="card-body">
                        <h5 class="card-title">Oil Change</h5>
                        <a href="#" class="btn btn-danger">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light shadow p-3">
                    <img src="{{ asset('wash.png') }}" class="card-img-top" alt="Tire Rotation">
                    <div class="card-body">
                        <h5 class="card-title">The Car Washing</h5>
                        <a href="#" class="btn btn-danger">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light shadow p-3">
                    <img src="{{ asset('wheel.png') }}" class="card-img-top" alt="Brake Inspection">
                    <div class="card-body">
                        <h5 class="card-title">Changing Car Wheels</h5>
                        <a href="#" class="btn btn-danger">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card bg-light shadow p-3">
                    <img src="{{ asset('maintenance.png') }}" class="card-img-top" alt="Fluid Checks">
                    <div class="card-body">
                        <h5 class="card-title">Repair and Maintenance</h5>
                        <a href="#" class="btn btn-danger">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light shadow p-3">
                    <img src="{{ asset('client.png') }}" class="card-img-top" alt="Air Filter Replacement">
                    <div class="card-body">
                        <h5 class="card-title">Customer Service</h5>
                        <a href="#" class="btn btn-danger">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light shadow p-3">
                    <img src="{{ asset('battery.png') }}" class="card-img-top" alt="Battery Inspection">
                    <div class="card-body">
                        <h5 class="card-title">Battery Inspection and Testing</h5>
                        <a href="#" class="btn btn-danger">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endSection
