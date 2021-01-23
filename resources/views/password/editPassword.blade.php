@extends('layouts.app', ['title'=>'Ubah Password'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ubah Password') }}</div>

                <div class="card-body">
                    <form action="{{route('password.edit')}}" method="POST">
                    @csrf
                    @method('PATCH')
                        @if (session('sukses'))
                            <div class="alert alert-success" role="alert">{{ session('sukses') }}</div>
                        @endif
                        <div class="form-group">
                            <label for="old_password">Password Sebelumnya</label>
                            <input type="password" class="form-control" id="old_password" name="old_password">
                            @error('old_password')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            @error('password_confirmation')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Ubah Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
