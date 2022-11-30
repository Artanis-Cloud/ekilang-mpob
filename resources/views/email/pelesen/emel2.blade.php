
<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>EMEL PINDAAN SISTEM E-KILANG</title>
    <meta name="description" content="Appointment Reminder Email Template">
</head>
<style>
    a:hover {text-decoration: underline !important;}
</style>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <!-- Logo -->
                    <tr>
                        <td style="text-align:center;">
                          <a href="{{ route('admin.dashboard') }}" title="logo" target="_blank">
                            <img src="{{ asset('mpob-text.png') }}" title="logo" alt="logo" style="width: 50%">
                          </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <!-- Email Content -->
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px; background:#fff; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <!-- Title -->
                                <tr>
                                    <td style="padding:0 15px; text-align:center;">
                                        <h1 style="color:#1e1e2d; font-weight:400; margin:0;font-size:32px;font-family:'Rubik',sans-serif; text-transform:uppercase"">EMEL {{ $jenis }}</h1>
                                        <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece;
                                        width:100px;"></span>
                                    </td>
                                </tr>
                                <!-- Details Table -->
                                <tr>
                                    <td>
                <table cellpadding="0" cellspacing="0"
                                            style="width: 100%; border: 1px solid #ededed">
                                            <tbody>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                        MASA:</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        {{ $dt }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                        DARI:</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        {{ $pelesen->name }} &nbsp; ({{ $pelesen->email }})</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                        PENYATA:</td>
                                                        @if ($penyata1 == 1 || $penyata1 == 2 || $penyata1 == 3 || $penyata1 == 4 || $penyata1 == 5 || $penyata1 == 6 || $penyata1 == 7 || $penyata1 == 8 || $penyata1 == 9)
                                                        <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        BULAN 0{{ $penyata1 }} TAHUN {{ $penyata2 }}</td>
                                                    @else
                                                        <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        BULAN {{ $penyata1 }} TAHUN {{ $penyata2 }}</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                        TAJUK:</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        {{ $tajuk }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                        KANDUNGAN:</td>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        {!! $mesej !!}</td>
                                                </tr>
                                                    <td
                                                        style="padding: 10px; border-bottom: 1px solid #ededed; border-right: 1px solid #ededed; width: 35%; font-weight:500; color:rgba(0,0,0,.64)">
                                                        LAMPIRAN:</td>
                                                    <td style="padding: 10px; border-bottom: 1px solid #ededed; color: #455056;">
                                                        <a target='_blank' href="{{ asset('storage/'.$daripada->file_upload) }}">Klik Disini</a></td>
                                                {{-- <td><a target='_blank' href="{{ asset('storage/'.$emel->file_upload) }}">Fail</a></td> --}}

                                                </tr>

                                                {{-- <tr>
                                                    <td
                                                        style="padding: 10px; border-right: 1px solid #ededed; width: 35%;font-weight:500; color:rgba(0,0,0,.64)">
                                                        PINDAAN:</td>
                                                    <td style="padding: 10px; color: #455056;"><a href="{{ $route }}" target="_blank"">Log Masuk</a></td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                                <p style="font-size:14px; color:#455056bd; line-height:18px; margin:0 0 0;">&copy; <strong>https://www.mpob.gov.my</strong></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
