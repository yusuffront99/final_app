@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="text-center">
                    <img src="{{asset('frontends/assets/img/logo/pln.png')}}" width="80px" height="100px" alt="">
                        
                        <div class="card-header fw-bold fs-4">{{ __('Register') }}</div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nip" class="col-md-4 col-form-label text-md-end">{{ __('NIP') }}</label>

                            <div class="col-md-6">
                                <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}" required autocomplete="nip" autofocus placeholder="9080121DY" >

                                @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama_lengkap" class="col-md-4 col-form-label text-md-end">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md-6">
                                <input id="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required autocomplete="nama_lengkap" autofocus>

                                @error('nama_lengkap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama_panggilan" class="col-md-4 col-form-label text-md-end">{{ __('nama_panggilan') }}</label>

                            <div class="col-md-6">
                                <input id="nama_panggilan" type="text" class="form-control @error('nama_panggilan') is-invalid @enderror" name="nama_panggilan" value="{{ old('nama_panggilan') }}" required autocomplete="nama_panggilan" autofocus>

                                @error('nama_panggilan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" minlength="8">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" minlength="8">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Divisi') }}</label>

                            <div class="col-md-6">
                                <select name="divisi" id="divisi" class="form-select @error('divisi') is-invalid @enderror" name="divisi" required autocomplete="divisi">
                                    <option value="">-- Pilih Divisi --</option>
                                    <option value="Operasi">Operasi</option>
                                    <option value="Pemeliharaan">Pemeliharaan</option>
                                </select>
                                
                                @error('divisi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Tim Divisi') }}</label>

                            <div class="col-md-6">
                                <select name="tim_divisi" id="tim_divisi" class="form-select @error('tim_divisi') is-invalid @enderror" name="tim_divisi" required autocomplete="tim_divisi">
                                    <option value="">-- Pilih Operator / Pemiliharaan --</option>
                                    <option value="Shift E">Shift E</option>
                                    <option value="Shift F">Shift F</option>
                                    <option value="Shift G">Shift G</option>
                                    <option value="Shift H">Shift H</option>
                                    <option value="Tim Har">Tim Pemeliharaan</option>
                                    <option value="BOT">BOT</option>
                                </select>
                                
                                @error('tim_divisi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Jabatan') }}</label>

                            <div class="col-md-6">
                                <select name="jabatan" id="jabatan" class="form-select @error('jabatan') is-invalid @enderror" name="jabatan" required autocomplete="jabatan">
                                    <option value="">-- Pilih Jabatan --</option>
                                    <option value="Supervisor Operasi">Supervisor Operasi</option>
                                    <option value="Supervisor Pemeliharaan">Supervisor Pemeliharaan</option>
                                    <option value="">----------</option>
                                    <option value="Operator Boiler">Operator Boiler</option>
                                    <option value="Operator Turbine">Operator Turbine</option>
                                </select>
                                
                                @error('jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Atasan') }}</label>

                            <div class="col-md-6">
                                <select name="atasan" id="atasan" class="form-select @error('atasan') is-invalid @enderror" name="atasan" required autocomplete="atasan">
                                    <option value="">-- Pilih Atasan --</option>
                                    @foreach ($lists as $list)
                                        <option value="{{$list->nama_lengkap}}">{{$list->nama_lengkap}}</option>
                                    @endforeach
                                    {{-- <option value="Admin">Admin</option> --}}
                                </select>
                                
                                @error('atasan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="hidden" name="profile_img" value="-">
                            </div>
                        </div>
                        <div class="row mx-5">
                            <div class="d-grid gap-2 my-1">
                                <button type="submit" class="btn btn-primary btn-sm">Register</button>
                            </div>
                        </div>
                        <div class="row mx-5">
                            <div class="d-grid gap-2 my-1">
                                <a href="{{route('login')}}" class="btn btn-warning btn-sm">To Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
