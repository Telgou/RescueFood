@extends('layouts.app-login')

@section('content')

<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="images/login.png" alt="login" class="login-card-img" />
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h2 class="judul-login">Register your account</h2>
                        <form action="{{ route('register.save') }}" method="POST">
                            @csrf
                            <p>Nama</p>
                            <div class="form-group">
                                <label for="name" class="sr-only">Name</label>
                                <input type="text" name="name" id="exampleInputName"
                                    class="form-control @error('name')is-invalid @enderror"
                                    placeholder="Masukkan Nama Anda ...." />
                                @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <p>No. Hp</p>
                            <div class="form-group">
                                <label for="no_hp" class="sr-only">No. Hp</label>
                                <input type="text" name="no_hp" id="exampleInputName"
                                    class="form-control @error('no_hp')is-invalid @enderror"
                                    placeholder="Masukkan No. Hp Anda ...." />
                                @error('no_hp')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <p>Tempat Lahir</p>
                            <div class="form-group">
                                <label for="tempat_lahir" class="sr-only">Tempat</label>
                                <input type="text" name="tempat_lahir" id="exampleInputName"
                                    class="form-control @error('tempat_lahir')is-invalid @enderror"
                                    placeholder="Masukkan Tempat Lahir Anda ...." />
                                @error('tempat_lahir')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <p>Tanggal Lahir</p>
                            <div class="form-group">
                                <label for="tanggal_lahir" class="sr-only">Tanggal Lahir</label>
                                <input id="tanggal_lahir" type="text"
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                    autocomplete="tanggal_lahir" autofocus>
                                @error('tanggal_lahir')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <p>Email</p>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="exampleInputEmail"
                                    class="form-control @error('email')is-invalid @enderror"
                                    placeholder="Masukkan Email Anda ...." />
                                @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <p>Password</p>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="exampleInputPassword"
                                    class="form-control @error('password')is-invalid @enderror"
                                    placeholder="Masukkan Password Anda ...." />
                                @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <p>Konfirmasi Password</p>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Repeat Password</label>
                                <input type="password" name="password_confirmation" id="exampleRepeatPassword"
                                    class="form-control @error('password_confirmation')is-invalid @enderror"
                                    placeholder="Masukkan Ulang Password Anda ...." />
                                @error('password_confirmation')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <input name="register" id="register" class="btn btn-block login-btn mb-4" type="submit"
                                value="Register" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
    rel="stylesheet">

<script>
$(document).ready(function() {
    $('#tanggal_lahir').datepicker({
        format: 'yyyy-mm-dd', // format tanggal yang diinginkan
        autoclose: true,
        todayHighlight: true
    });
});
</script>

</body>

</html>

@endsection