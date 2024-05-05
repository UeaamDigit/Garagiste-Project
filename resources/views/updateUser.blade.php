<?php
use Illuminate\Support\Facades\Auth;
?>
@extends('layout')
@section('title', 'Update User')
@section('content')
    <div class="container">
        <h1 class="text-center mt-5 alert alert-danger w-25 m-auto">Update User</h1>
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
        <form action="{{ route('dashboard') }}" method="POST" class="m-auto rounded p-5 shadow-lg" style="width: 400px">
            @csrf
            @method('PUT') <!-- Use PUT method for updating user details -->
            <div class="mb-3">
                <label class="form-label">Name :</label>
                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
            </div>

            <button type="submit" class="btn btn-danger">Save Changes</button>
        </form>
    </div>
@endsection
