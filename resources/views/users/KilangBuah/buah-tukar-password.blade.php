@extends('layouts.main')

@section('content')


    <div class="page-wrapper">

                <div class="page-breadcrumb mb-3">
                    <div class="row">
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
                <div class="card" style="margin-right:10%; margin-left:10%">

                    <div class="card-body">
                            <div class="pl-3">

                                <div class=" text-center">
                                    <h3 style="color: rgb(39, 80, 71)">Tukar Kata Laluan</h3>
                                </div>
                                <hr>

                                <form method="POST" action="{{ route('buah.tukarpassword') }}">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <label for="fname"
                                            class="text-right col-sm-5 control-label col-form-label required align-items-center">Kata
                                            Laluan Terdahulu <i>(8 Aksara)</i></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name='old_password'
                                                id="old_password" placeholder="Kata Laluan Terdahulu" required
                                                title="Sila isikan butiran ini.">
                                            {{-- @error('alamat_kilang_1')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror --}}
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <label for="fname"
                                            class="text-right col-sm-5 control-label col-form-label required align-items-center">Kata
                                            Laluan Baru <i>(8 Aksara)</i></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name='new_password'
                                                id="new_password" placeholder="Kata Laluan Baru" required
                                                title="Sila isikan butiran ini.">
                                            {{-- @error('alamat_kilang_1')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror --}}
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <label for="fname"
                                            class="text-right col-sm-5 control-label col-form-label required align-items-center">Sahkan
                                            Kata Laluan Baru <i>(8 Aksara)</i></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name='password_confirmation'
                                                id="password_confirmation" placeholder="Sahkan Kata Laluan Baru"
                                                required title="Sila isikan butiran ini.">
                                            {{-- @error('alamat_kilang_1')
                                                        <div class="alert alert-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror --}}
                                        </div>
                                    </div>

                                            <div class="row form-group" >


                                                {{-- <div class="text-left col-md-5">
                                                    <a href="{{ route('buah.bahagiani') }}" class="btn btn-primary"
                                                        style="float: left">Sebelumnya</a>
                                                </div> --}}
                                                <div class="text-right col-md-12 mt-2 ">
                                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                                        style="float: right" data-bs-target="#exampleModalCenter">Simpan</button>
                                                </div>

                                            </div>
                                        </div>






                                        <!-- Vertically Centered modal Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                                            PENGESAHAN</h5>
                                                        <button type="button" class="close"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            Anda pasti mahu menukar kata laluan ini?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block"
                                                                style="color:#275047">Kembali</span>
                                                        </button>
                                                        <button type="button" class="btn btn-primary ml-1"
                                                            data-bs-dismiss="modal">
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
