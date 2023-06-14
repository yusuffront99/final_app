@extends('layouts.auth')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="text-center my-2">
                    <img src="{{asset('frontends/assets/img/logo/pln.png')}}" width="80px" height="100px" alt="">
                        <br>
                        <span class="fw-bold fs-4 text-primary">Power</span><span class="fw-bold fs-4 text-warning">Plant<sup>34</sup> </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>Email</label>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Email Or Password Invalid</strong>
                                    </span>
                                @enderror
                            <input
                              type="text"
                              class="form-control"
                              id="email"
                              name="email"
                              placeholder="Enter your email"
                            />
                          </div>
                          <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                              <label class="form-label fw-bold" for="password">Password</label>
                              {{-- <a href="{{route('password.request')}}">
                                <small>Lupa password?</small>
                              </a> --}}
                            </div>
                            <div class="input-group input-group-merge">
                              <input
                                type="password"
                                id="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                                name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password"
                              />
                              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                          </div>

                        {{-- <div class="row mb-3">
                            <div class="form-check mx-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div> --}}

                        <div class="row mb-0">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        <p class="text-center mt-3">
                            Anda belum punya akun ?
                            <br>
                            <span><a href="{{route('register')}}">Daftar Sekarang</a></span>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
