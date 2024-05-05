@extends('layout')
@section('title', 'Login ')
@section('content')
    <div class="container">
        <h1 class="text-center mt-5 alert alert-danger w-25 m-auto">Login</h1>
        <div class="mt-5 w-50 m-auto">
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
        <form action="{{ route('login.post') }}" method="POST" class="m-auto rounded p-5 shadow-lg" style="width: 400px">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                <label class="form-check-label" for="remember_me">Remember Me</label>
            </div>
            <a class="text-decoration-none text-primary mb-3 d-block" href="{{ route('registration') }}">Create New Account,
                Click Here</a>
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
@endsection
