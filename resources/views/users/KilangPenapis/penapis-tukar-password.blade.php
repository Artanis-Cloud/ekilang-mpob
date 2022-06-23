@extends('layouts.main')

@section('content')
    <div class="page-wrapper">

        <div class="page-breadcrumb mb-3">
            <div class="row" style="margin-bottom: -2%">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Tukar Kata Laluan</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                @foreach ($returnArr['breadcrumbs'] as $breadcrumb)
                                    @if (!$loop->last)
                                        <li class="breadcrumb-item">
                                            <a href="{{ $breadcrumb['link'] }}" style="color: rgb(64, 69, 68) !important;"
                                                onMouseOver="this.style.color='#25877b'"
                                                onMouseOut="this.style.color='grey'">
                                                {{ $breadcrumb['name'] }}
                                            </a>
                                        </li>
                                    @else
                                        <li class="breadcrumb-item active" aria-current="page"
                                            style="color: #25877b  !important;">
                                            {{ $breadcrumb['name'] }}
                                        </li>
                                    @endif
                                @endforeach
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card" style="padding: 2%">
                        <div class=" text-center">
                            <h4 style="color: rgb(39, 80, 71); margin-top:3%">Tukar Kata Laluan</h4>
                        </div>
                        <hr>

                        <form method="POST" action="{{ route('penapis.update.password', [$user[0]->id]) }}">
                            {{ csrf_field() }}

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">Kata
                                    Laluan Terdahulu <i>(8 Aksara)</i></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name='old_password' id="myInput"
                                     placeholder="Kata Laluan Terdahulu" required
                                     oninvalid="this.setCustomValidity('Sila isi butiran ini')"
                                     oninput="this.setCustomValidity('')"
                                        title="Sila isikan butiran ini.">
                                    @error('old_password')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">Kata
                                    Laluan Baru <i>(8 Aksara)</i></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name='new_password' id="myInput2"
                                         placeholder="Kata Laluan Baru" required
                                         oninvalid="this.setCustomValidity('Sila masukkan lebih dari 8 aksara')"
                                         oninput="this.setCustomValidity('')" minlength="8"
                                        title="Sila isikan butiran ini.">
                                        <span id = "message" style="color:red"> </span>
                                    {{-- @error('new_password')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>
                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label required">Sahkan
                                    Kata Laluan Baru <i>(8 Aksara)</i></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name='password_confirmation' id="myInput3"
                                        minlength="8" placeholder="Sahkan Kata Laluan Baru" required
                                        oninvalid="this.setCustomValidity('Sila masukkan lebih dari 8 aksara')"
                                        oninput="this.setCustomValidity('')"
                                        title="Sila isikan butiran ini.">
                                    {{-- @error('password_confirmation')
                                        <div class="alert alert-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>

                            <div class="row justify-content-center" style="margin:20px 0px">
                                <div class="col-sm-3 form-group" style="margin: 0px">
                                    <label for="fname"
                                    class="control-label col-form-label align-it"></i></label>
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" onclick="myFunction()">&nbsp;Tunjuk Kata Laluan
                                </div>
                            </div>


                            <div class="row justify-content-center">
                                <button type="button" class="btn btn-primary"  data-toggle="modal"
                                    data-target="#next">Tukar Kata Laluan</button>
                            </div>
                    </div>

                    <!-- Vertically Centered modal Modal -->
                    <div class="modal fade" id="next" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                        PENGESAHAN</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Anda pasti mahu menukar kata laluan ini?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block" style="color:#275047">Kembali</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Tukar</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        @endsection
        @section('scripts')
            <script>
                var password = document.getElementById("myInput2"), confirm_password = document.getElementById("myInput3");

                function validatePassword(){
                if(password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("Passwords Don't Match");
                } else {
                    confirm_password.setCustomValidity('');
                }
                }

                password.onchange = validatePassword;
                confirm_password.onkeyup = validatePassword;


                function myFunction() {
                    var x = document.getElementById("myInput");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                    var x = document.getElementById("myInput2");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                    var x = document.getElementById("myInput3");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
        @endsection

    </div>
</div>
