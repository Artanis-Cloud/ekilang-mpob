
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->



        <div class="container-fluid">

            <div class="card" style="margin-right:2%; margin-left:2%">


                 <div class="card-body">
                        <div class="pl-3">

                            <div class=" text-center">
                                {{-- <img src="{{ asset('/mpob.png') }}" height="80" class='mb-4'> --}}
                                <h3 style="color: rgb(39, 80, 71); margin-bottom:1%">Paparan Emel Pertanyaan /
                                    Pindaan / Cadangan</h3>
                                {{-- <p>Maklumat Kilang</p> --}}
                            </div>
                            <hr>


                            <section class="section">
                                <div class="card">
                                    <form method="get" action="" id="myfrm">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">

                                                <tr>
                                                    <th>Tarikh</th>
                                                    <td>{{ $emel->Date }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Pelesen</th>
                                                    <td>{{ $emel->FromName }}</td>
                                                </tr>
                                                <tr>
                                                    <th>No. Lesen</th>
                                                    <td>{{ $emel->FromLicense }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Emel</th>
                                                    <td>{{ $emel->FromEmail }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Kategori</th>
                                                    <td>{{ $emel->Category }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Jenis Emel</th>
                                                    <td>{{ $emel->TypeOfEmail }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Subjek</th>
                                                    <td>{{ $emel->Subject }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mesej</th>
                                                    <td>{!! $emel->Message !!}</td>
                                                </tr>

                                                <tr>
                                                    <th>Attachement</th>
                                                    <td><a target='_blank' href="{{ asset('storage/'.$emel->file_upload) }}">File</a></td>
                                                </tr>

                                            </table>

                                        </div>
                                    </form>
                                </div>
                            </section>

                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>

{{-- 
    @section('scripts')
    <script src="{{ asset('nice-admin/assets/libs/quill/dist/quill.min.js') }}"></script>
    <script>
        var editor = new Quill('#editor', {

          readOnly: true // Set readOnly to true to prevent editing of the content.
        });
        console.log(editor);
        editor.root.innerHTML = {!! json_encode( $mess ) !!};
      </script>
@endsection --}}
