@extends('layouts.app')
@section('title', $data['page_title'])
@section('content')
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-100 d-flex align-items-center justify-content-center">
                <div class="container fw-normal">
                    <div class="card rounded-4 p-3 border-0 shadow">
                        <div class="m-2 bg-white">
                            <h4 class="fw-bold">Sign In</h4>
                            <p class="mb-0">Enter your email and password to sign in</p>
                        </div>
                        <div class="card-body">
                            <form role="form" action="{{ route('login') }}" method="POST">
                                @csrf
                                @if (session()->has('error'))
                                    <div class="text-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <div class="mb-2">
                                    <input id="email" name="email" autofocus type="email"
                                           class="form-control form-control-lg" placeholder="Email" required
                                           aria-label="Email">
                                    @if ($errors->has('email'))
                                        <div class="text-danger fw-1">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <input id="password" name="password" type="password"
                                           class="form-control form-control-lg" placeholder="Password" required
                                           aria-label="Password">
                                    @if ($errors->has('password'))
                                        <div class="text-danger">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-check form-switch">
                                    <input name="remember-token" class="form-check-input" type="checkbox"
                                           id="remember-token">
                                    <label class="form-check-label" for="remember-token">Remember me?</label>
                                </div>
                                <div class="text-center">
                                    <button id="submit" name="submit" type="submit"
                                            class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign
                                        in
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="text-center pt-0 px-lg-2 px-1">
                            <p class="mb-4 text-sm mx-auto">
                                Don't have an account?
                                <a href="{{ url('register') }}"
                                   class="text-primary text-decoration-none text-gradient font-weight-bold">Sign
                                    up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
