@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dokter.register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nama_dokter" class="col-md-4 col-form-label text-md-right">{{ __('Nama Dokter') }}</label>

                            <div class="col-md-6">
                                <input id="nama_dokter" type="text" class="form-control{{ $errors->has('nama_dokter') ? ' is-invalid' : '' }}" name="nama_dokter" value="{{ old('nama_dokter') }}" required autofocus>

                                @if ($errors->has('nama_dokter'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_dokter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ttl_dokter" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control{{ $errors->has('ttl_dokter') ? ' is-invalid' : '' }}" name="ttl_dokter" id="ttl_dokter">
                            
                                @if ($errors->has('ttl_dokter'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ttl_dokter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_kategori" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>

                            <div class="col-md-6">

                                <select class="custom-select">
                                    @foreach($kategoridokter as $k)
                                    <option value="{{$k->id}}">{{$k->nama_kategori}}</option>
                                    @endforeach
                                </select>

                                <!--<input id="id_kategori" type="text" class="form-control{{ $errors->has('id_kategori') ? ' is-invalid' : '' }}" name="id_kategori" value="{{ old('id_kategori') }}" required autofocus>

                                @if ($errors->has('id_kategori'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id_kategori') }}</strong>
                                    </span>
                                @endif
                            -->
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ old('alamat') }}" required autofocus>

                                @if ($errors->has('alamat'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telp" class="col-md-4 col-form-label text-md-right">{{ __('Telepon') }}</label>

                            <div class="col-md-6">
                                <input id="telp" type="text" class="form-control{{ $errors->has('telp') ? ' is-invalid' : '' }}" name="telp" value="{{ old('telp') }}" required autofocus>

                                @if ($errors->has('telp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
