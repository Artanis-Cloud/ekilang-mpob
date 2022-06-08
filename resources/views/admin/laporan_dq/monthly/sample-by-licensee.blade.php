@extends('layouts.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Oleokimia
                    </h4>
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
                <div class="col-sm-2">
                    <div class="card card-hover"  onclick="window.location='{{ URL::route('admin.laporan.bulanan'); }}'">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 1</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Stok Awal Di Premis</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 2</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Stok Awal Di Pusat Simpanan</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 3</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Belian/Terimaan</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 4</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Import</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 5</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Pengeluaran</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 6</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Proses</h5>
                        </div>
                        <br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <div class="card card-hover" onclick="window.location='{{ URL::route('admin.laporan.bulanan'); }}'">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 7</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Jualan / Edaran Tempatan</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 8</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Eksport</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 9</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Stok Akhir di Premis</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 10</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Stok Akhir di Pusat Simpanan</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 11</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Proses CPO+CPKO</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 12</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Proses PPO</h5>
                        </div>
                        <br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <div class="card card-hover" onclick="window.location='{{ URL::route('admin.laporan.bulanan'); }}'">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 13</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Proses PPKO</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 14</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Proses CPO+CPKO+PPO+PPKO</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 15</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">CPO Ultirate</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 16</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">CPKO Ultirate</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 17</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">CPO+CPKO Ultirate</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 18</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">PPO Ultirate</h5>
                        </div>
                        <br>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-2">
                    <div class="card card-hover" onclick="window.location='{{ URL::route('admin.laporan.bulanan'); }}'">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 19</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">PPKO Ultirate</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 20</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">CPO+CPKO+PPO+PPKO Ultirate</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 21</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">All Ultirate</h5>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="card card-hover">
                        <div class=" text-center">
                            <h5 style="color: rgb(39, 80, 71); margin-top:3%; margin-bottom:1%">OML 22</h3><hr>
                            <h6 style="color: rgb(39, 80, 71); margin-bottom:1%">Capacity</h5>
                        </div>
                        <br>
                    </div>
                </div>

            </div>

        </div>

    </div>




    </div>
@endsection

@section('scripts')



@endsection
