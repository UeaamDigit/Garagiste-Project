@extends('layout')
@section('title', 'Edit Profile')
@section('content')
    <div class="container">
        <h1 class="text-center mt-5 alert alert-success w-25 m-auto">Profile</h1>
        <div class="mt-5">
            @if ($errors->any())
                <div class="col-12">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>

        <form action="{{ route('profile.update') }}" method="POST" class="m-auto rounded p-5 shadow-lg" style="width: 400px"
            style="max-width: 400px;">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}"
                    required>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
