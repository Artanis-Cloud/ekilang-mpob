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
                    <div class="card">
                        <div class=" text-center">
                            <h4 style="color: rgb(39, 80, 71); margin-top:3%">Tukar Kata Laluan</h4>
                        </div>
                    <hr>

                    <form method="POST" action="{{ route('bio.update.password', [$user[0]->id]) }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <label for="fname"
                                class="text-right col-sm-5 control-label col-form-label required align-items-center">Kata
                                Laluan Terdahulu <i>(8 Aksara)</i></label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name='old_password' id="myInput"
                                    placeholder="Kata Laluan Terdahulu" required title="Sila isikan butiran ini.">
                                @error('old_password')
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="fname"
                                class="text-right col-sm-5 control-label col-form-label required align-items-center">Kata
                                Laluan Baru <i>(8 Aksara)</i></label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name='new_password' id="myInput2"
                                    placeholder="Kata Laluan Baru" required title="Sila isikan butiran ini.">
                                @error('new_password')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="fname"
                                class="text-right col-sm-5 control-label col-form-label required align-items-center">Sahkan
                                Kata Laluan Baru <i>(8 Aksara)</i></label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name='password_confirmation' id="myInput3"
                                    placeholder="Sahkan Kata Laluan Baru" required title="Sila isikan butiran ini.">
                                @error('password_confirmation')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="fname"
                                class="text-right col-sm-5 control-label col-form-label align-items-center"></i></label>
                            <div class="col-md-6">
                                <input type="checkbox" onclick="myFunction()">&nbsp;Tunjuk Kata Laluan
                            </div>
                        </div>


                        <div class="text-right col-md-6 mb-4 mt-4">
                            <button type="button" class="btn btn-primary" style="margin-left:90%"
                                data-toggle="modal" data-target="#next">Tukar Kata Laluan</button>
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
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div><br><br><br><br><br><br><br><br><br><br><br><br> --}}
        @endsection
        @section('scripts')
            <script>
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
