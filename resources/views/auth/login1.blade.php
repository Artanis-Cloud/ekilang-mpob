<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<link href="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

    * {
        box-sizing: border-box;
    }

    body {
        background: #f6f5f7;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: 'Montserrat', sans-serif;
        height: 100vh;
        margin: -20px 0 50px;
    }

    h1 {
        font-weight: bold;
        margin: 0;
    }

    h2 {
        text-align: center;
    }

    p {
        font-size: 14px;
        font-weight: 100;
        line-height: 20px;
        letter-spacing: 0.5px;
        margin: 20px 0 30px;
    }

    span {
        font-size: 12px;
    }

    a {
        color: #333;
        font-size: 14px;
        text-decoration: none;
        margin: 15px 0;
    }

    button {
        border-radius: 20px;
        border: 1px solid rgba(89, 194, 154, 0.801);
        background-color: rgba(89, 194, 154, 0.801);
        color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
    }

    button:active {
        transform: scale(0.95);
    }

    button:focus {
        outline: none;
    }

    button.ghost {
        background-color: transparent;
        border-color: #FFFFFF;
    }

    form {
        background-color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 50px;
        height: 100%;
        text-align: center;
    }

    input {
        background-color: #eee;
        border: none;
        padding: 12px 15px;
        margin: 8px 0;
        width: 100%;
    }

    .container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
            0 10px 10px rgba(0, 0, 0, 0.22);
        position: relative;
        overflow: hidden;
        width: 1400px;
        max-width: 100%;
        min-height: 600px;
    }

    .form-container {
        position: absolute;
        top: 0;
        height: 100%;
        transition: all 0.6s ease-in-out;
    }

    .sign-in-container {
        left: 0;
        width: 50%;
        z-index: 2;
    }

    .container.right-panel-active .sign-in-container {
        transform: translateX(100%);
    }

    .sign-up-container {
        left: 0;
        width: 50%;
        opacity: 0;
        z-index: 1;
    }

    .container.right-panel-active .sign-up-container {
        transform: translateX(100%);
        opacity: 1;
        z-index: 5;
        animation: show 0.6s;
    }

    @keyframes show {

        0%,
        49.99% {
            opacity: 0;
            z-index: 1;
        }

        50%,
        100% {
            opacity: 1;
            z-index: 5;
        }
    }

    .overlay-container {
        position: absolute;
        top: 0;
        left: 50%;
        width: 50%;
        height: 100%;
        overflow: hidden;
        transition: transform 0.6s ease-in-out;
        z-index: 100;
    }

    .container.right-panel-active .overlay-container {
        transform: translateX(-100%);
    }

    .overlay {
        background: rgba(89, 194, 154, 0.801);
        background: -webkit-linear-gradient(to right, rgba(89, 194, 154, 0.801), rgba(89, 194, 154, 0.801));
        background: linear-gradient(to right, rgba(89, 194, 154, 0.014), rgba(89, 194, 154, 0));
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 0 0;
        color: #FFFFFF;
        position: relative;
        left: -100%;
        height: 100%;
        width: 200%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .container.right-panel-active .overlay {
        transform: translateX(50%);
    }

    .overlay-panel {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 40px;
        text-align: center;
        top: 0;
        height: 100%;
        width: 50%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .overlay-left {
        transform: translateX(-20%);
    }

    .container.right-panel-active .overlay-left {
        transform: translateX(0);
    }

    .overlay-right {
        right: 0;
        transform: translateX(0);
    }

    .container.right-panel-active .overlay-right {
        transform: translateX(20%);
    }

    .social-container {
        margin: 20px 0;
    }

    .social-container a {
        border: 1px solid #DDDDDD;
        border-radius: 50%;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 0 5px;
        height: 40px;
        width: 40px;
    }

    footer {
        background-color: #222;
        color: #fff;
        font-size: 14px;
        bottom: 0;
        position: fixed;
        left: 0;
        right: 0;
        text-align: center;
        z-index: 999;
    }

    footer p {
        margin: 15px 0;
    }

    footer i {
        color: red;
    }

    footer a {
        color: #3c97bf;
        text-decoration: none;
    }

    /* body {
    font-family: 'Cairo', sans-serif;
    font-weight: 400;
} */
.flexTitle{display:flex; justify-content:center; align-items:center; width:100%;}
.flexTitle h1{color:#a31313; margin:0;}
.close {
    float: right;
    font-size: 21px;
    font-weight: bold;
    line-height: 1;
    color: #000000;
    text-shadow: 0 1px 0 #ffffff;
    opacity: 0.7;
    filter: alpha(opacity=70);
}
.close:hover,.close:focus {
    color: #000000;
    text-decoration: none;
    cursor: pointer;
}
button.close {
    padding: 0;
    cursor: pointer;
    background: transparent;
    border: 0;
    -webkit-appearance: none;
}
.modal-open {
    overflow: hidden;
}
.modal {
    display: none;
    overflow: hidden;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    -webkit-overflow-scrolling: touch;
    outline: 0;
    border-radius:25px;

}
.modal.fade .modal-dialog {
    -webkit-transform: translate(0, -25%);
    -ms-transform: translate(0, -25%);
    -o-transform: translate(0, -25%);
    transform: translate(0, -25%);
    -webkit-transition: -webkit-transform 0.3s ease-out;
    -o-transition: -o-transform 0.3s ease-out;
    transition: transform 0.3s ease-out;
}
.modal.in .modal-dialog {
    -webkit-transform: translate(0, 0);
    -ms-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
}
.modal-open .modal {
    overflow-x: hidden;
    overflow-y: auto;
}
.modal-dialog {
    position: relative;
    width: auto;
    margin: 10px;

}
.modal-content {
    position: relative;
    top: 300;
    border-radius:25px;



}
.modal-backdrop {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1040;
    opacity:0.6 !important;
    background-color: black;
}
.modal-backdrop.fade {
    opacity: 0;
    filter: alpha(opacity=0);
}
.modal-backdrop.in {
    opacity: 0.5;
    filter: alpha(opacity=50);
}
.modal-header {
    padding: 15px;
    min-height: 16.42857143px;
}
.modal-header .close {
    margin-top: -2px;
}
.modal-title {
    margin: 0;
    line-height: 1.42857143;
}
.modal-body {
    position: relative;
    padding: 35px 15px;
    background-color: #aa1515;
    border-radius:  10px 10px 0 0px;
}
.modal-footer {
    padding: 15px;
    text-align: right;
    background-color: #fff;
    border-radius: 0 0px 10px 10px;
}
.modal-footer .btn + .btn {
    margin-left: 5px;
    margin-bottom: 0;
}
.modal-footer .btn-group .btn + .btn {
    margin-left: -1px;
}
.modal-footer .btn-block + .btn-block {
    margin-left: 0;
}
.modal-scrollbar-measure {
    position: absolute;
    top: -9999px;
    width: 50px;
    height: 50px;
    overflow: scroll;
}
.clickable {
    cursor: pointer;
}
@media (min-width: 768px) {
    .modal-dialog {
    width: 600px;
    margin: 30px auto;
}
 .modal-sm {
    width: 300px;
}
}
@media (min-width: 992px) {
    .modal-lg {
    width: 900px;
}
}
.clearfix:before,.clearfix:after,.modal-footer:before,.modal-footer:after {
    content: " ";
    display: table;
}
.clearfix:after,.modal-footer:after {
    clear: both;
}
.center-block {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
.pull-right {
    float: right !important;
}
.pull-left {
    float: left !important;
}
.hide {
    display: none !important;
}
.show {
    display: block !important;
}
.invisible {
    visibility: hidden;
}
.text-hide {
    font: 0/0 a;
    color: transparent;
    text-shadow: none;
    background-color: transparent;
    border: 0;
}
.hidden {
    display: none !important;
}
.affix {
    position: fixed;
}
.img-responsive-height {
    display: block;
    width: auto;
    max-height: 100%}
.img-responsive {
    display: block;
    max-width: 100%;
    height: auto;
}
.signCenter {
    text-align: center;
}
.closeSymbol {
    color: #fff;
    font-size: 40px;
    border: 3px solid #fff;
    width: 96px;
    heiht: 96px;
    border-radius: 50%;
    font-weight: 700;
    text-align: center;
    padding: 0 15px;
}
.snapHdr {
    color: #aa1515;
    font-size: 40px;
    margin: 0;
    font-weight: 700;
}
.info {
    margin: 0 0 10px 0;
}
.closeftr {
    background-color: #aa1515;
    color: #fff;
    padding: 5px 30px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 16px;
    font-weight: 600;
}

.background{
    filter: blur(8px);
  -webkit-filter: blur(8px);
}

</style>

<body class=""style="background:url({{ asset('theme/images/background/bg3.jpg') }});background-size:cover;background-position:center;">
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h3>Log Masuk</h3>
                <div class="social-container">
                    <img src="{{ asset('theme/images/mpob2.png') }}" class="brand-image img-circle elevation-3"
                        style="height:100px; width:100px; margin-right:2% " alt="logo">
                </div>
                <div class="social-container">
                    <img src="{{ asset('theme/images/background/ekilanglogo.png') }}" class="brand-image img-circle elevation-3"
                        style="height:80px; width:70%; margin-right:2% " alt="logo">
                </div>
                <input id="e_nl" type="text" class="form-control @error('username') is-invalid @enderror"
                    oninvalid="setCustomValidity('Sila isi butiran ini')" oninput="setCustomValidity('')" required
                    name="username" value="{{ old('username') }}" autocomplete="username" maxlength="12"
                    placeholder="No. Lesen">

                @error('username')
                    <div class="col-12 alert alert-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <input id="password" type="password" oninvalid="setCustomValidity('Sila isi butiran ini')"
                    oninput="setCustomValidity('')" required
                    class="form-control @error('password') is-invalid @enderror" name="password"
                    autocomplete="current-password" placeholder="Kata Laluan">
                {{-- <span id="error"></span> --}}

                @error('password')
                    <div class="col-12 alert alert-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <a href="{{ route('forget-password.show') }}">Terlupa Kata Laluan?</a>
                <button type="submit" onclick="errorMessage()">Log Masuk</button>
            </form>
        </div>
        <div class="overlay-container"
            style="background:url({{ asset('theme/images/background/tryblur.jpg') }}); background-size:cover">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <span style="color:black;font-size:20px">
                        Selamat Datang ke Sistem e-Kilang
                    </span>
                    <span style="color:black;">
                        Sistem e-Kilang adalah satu sistem aplikasi MPOB yang dibangunkan oleh MPOB bertujuan bagi membantu pelesen dalam membuat pelaporan 1-7hb setiap sebulan.
                    <br>
                    <hr>
                    </span>
                    <br>


                    <span style="color:black">
                        Sebarang pertanyaan sila hubungi :<br><br>
                        <b>Penyata Bulanan Kilang Buah - MPOB (EL) MF4</b><br> - Pn. Nor Syaida<br> (Emel:
                        nor.syaida@mpob.gov.my atau Tel :
                        03-7802 2917)<br>
                        <b>Penyata Bulanan Kilang Buah - MPOB (EL) MF4</b><br> - En. Rominizam<br> (Emel:
                        rominizam@mpob.gov.my atau Tel :
                        03-7802 2918)<br>
                        <b>Penyata Bulanan Kilang Penapis - MPOB (EL) RF4</b><br> - Pn. Aziana<br> (Emel:
                        aziana.misnan@mpob.gov.my atau Tel :
                        03-7802 2955)<br>
                        <b>Penyata Bulanan Kilang Oleokimia - MPOB (EL) CM4</b><br> - Pn. Aziana<br> (Emel:
                        aziana.misnan@mpob.gov.my atau Tel :
                        03-7802 2955)<br>
                        <b>Penyata Bulanan Kilang Isirung - MPOB (EL) CF4</b><br> - Pn. Nor Baayah<br> (Emel
                        abby@mpob.gov.my atau Tel : 03-7802
                        2865)<br>
                        <b>Penyata Bulanan Pusat Simpanan - MPOB (EL) KS4</b><br> - Pn. Nor Baayah<br> (Emel
                        abby@mpob.gov.my atau Tel : 03-7802
                        2865)<br>
                        <b>Penyata Bulanan Kilang Oleokimia (Biodiesel) - MPOB EL (CM4)</b><br> - Cik Rohidayati
                        Sukhaila<br>
                        (Emel: rohidayati@mpob.gov.my atau Tel: 03-78022991)<br>
                        <b>No Faks bagi Penyata Bulanan</b><br> 03-7803 2323 / 03-7803 1399<br>
                    </span>
                </div>
            </div>
        </div>


    </div>


    <br>
    <br>
    {{-- <p style="background-color: #222; color:white; padding:10px;text-align:center">
    <b>PERINGATAN : Pihak tuan/puan dikehendaki melapor maklumat mingguan (PENYATA
        MINGGUAN) melalui sistem
        ekilang sebelum pukul 12.00 malam pada hari pertama setiap minggu
        (ISNIN).</b><br>
    </p> --}}

    <div class=""></div>
    <div id="modal-content" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>

                </div> --}}
                <div class="modal-body">

                        <p class="snapHdr" style="color:white;text-align:center">Peringatan !</p>
                </div>
                <div class="modal-footer signCenter">

                    <p class="info">Pihak tuan/puan dikehendaki melapor maklumat mingguan (PENYATA
                        MINGGUAN) melalui sistem
                        ekilang sebelum pukul 12.00 malam pada hari pertama setiap minggu
                        (ISNIN)</p>
                    <a href="#" class="btn closeftr" data-dismiss="modal">Tutup</a>

                </div>
            </div>
        </div>
    </div>

</body>

<footer>
    <p>
        Hak Cipta Terpelihara 2022 © eKilang Malaysian Palm Oil Board<br>
        Paparan terbaik dalam Internet Explorer 11.0+,
        Google Chrome 6+, Mozilla Firefox 4+, Safari 3+, dan Opera 9+.
    </p>
</footer>
<script src="{{ asset('nice-admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>

{{-- <script src="{{ asset('nice-admin/assets/libs/jquery/dist/jquery.min.js') }}"></script> --}}

<script src="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.js') }}"></script>
<script src="{{ asset('nice-admin/assets/extra-libs/toastr/toastr-init.js') }}"></script>

<script>
    @if (Session::get('success'))
        toastr.success('{{ session('success') }}', 'Berjaya', {
            "progressBar": true
        });
    @elseif ($message = Session::get('error'))
        toastr.error('{{ session('error') }}', 'Ralat', {
            "progressBar": true
        });
    @endif
</script>
<script>
    function errorMessage() {
        var error = document.getElementById("error")
        if (isNaN(document.getElementById("password").value)) {

            // Changing content and color of content
            error.textContent = "Please enter a valid number"
            error.style.color = "red"
        } else {
            error.textContent = ""
        }
    }
</script>
<script>
    $('#modal-content').on('shown.bs.modal', function () {
    $("#txtname").focus();
});

// show the modal onload
$('#modal-content').modal({
    show: true
});

// everytime the button is pushed, open the modal, and trigger the shown.bs.modal event
$('#openBtn').click(function () {
    $('#modal-content').modal({
        show: true
    });
});
</script>
