@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h2 class="fw-bold">Login</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <form method="POST" action="/login">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email : </label>
                        <input type="text" class="form-control mb-2 @error('email') is-invalid @enderror" name="email"
                            id="email" placeholder="Email Anda" required value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password : </label>
                        <input type="password" class="form-control mb-2 @error('password') is-invalid @enderror"
                            name="password" id="password" placeholder="Password" required>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    @if (session()->has('errorLogin'))
                        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                            {{ session('errorLogin') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <button type="submit" name="login" class="btn btn-primary mt-4">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
