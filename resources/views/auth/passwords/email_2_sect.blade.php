<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<link href="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet">
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

    select {
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
</style>

<body
    class=""style="background:url({{ asset('theme/images/background/loginbg.png') }});background-size:cover;background-position:center;">


    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form method="POST" action="{{ route('forget-password.submit2') }}">
                @csrf
                {{-- <h3>Terlupa Kata Laluan</h3> --}}
                <div class="social-container">
                    <img src="{{ asset('theme/images/mpob2.png') }}" class="brand-image img-circle elevation-3"
                        style="height:100px; width:100px; margin-right:2% " alt="logo">
                </div>
                <div class="social-container">
                    <img src="{{ asset('theme/images/background/ekilanglogo.png') }}"
                        class="brand-image img-circle elevation-3" style="height:80px; width:70%; margin-right:2% "
                        alt="logo">
                </div>
                <select class="form-control select" id="kat" name="kat" required
                    oninvalid="this.setCustomValidity('Sila buat pilihan dibahagian ini')"
                    oninput="this.setCustomValidity('')">
                    <option selected hidden disabled value="">Sila Pilih Sektor</option>
                    @foreach ($cat2 as $cat)
                        @if ($cat == 'PL91')
                            <option value="{{ $cat }}">Kilang Buah</option>
                        @elseif ($cat == 'PL101')
                            <option value="{{ $cat }}">Kilang Penapis</option>
                        @elseif ($cat == 'PL102')
                            <option value="{{ $cat }}">Kilang Isirung</option>
                        @elseif ($cat == 'PL104')
                            <option value="{{ $cat }}">Kilang Oleokimia</option>
                        @elseif ($cat == 'PL111')
                            <option value="{{ $cat }}">Pusat Simpanan</option>
                        @elseif ($cat == 'PLBIO')
                            <option value="{{ $cat }}">Kilang Biodiesel</option>
                        @endif
                    @endforeach
                </select>
                <input type="hidden" value="{{ $lesen }}" name="nolesen">
                {{-- <br> --}}
                <div class="mb-3 input-group" style="display:none" id="lesen">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i></span>
                    </div>
                    {{-- <input type="text" class="form-control form-control-lg" placeholder="KATA LALUAN" aria-label="Password" name="password" aria-describedby="basic-addon1"> --}}
                    <input id="lesen" type="text" class="form-control @error('lesen') is-invalid @enderror"
                        name="lesen" placeholder="Sila Masukkan No. Lesen" maxlength="12"
                        onkeypress="return isNumberKey(event)">


                    @error('email')
                        <div class="col-12 alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror

                </div>
                {{-- <br> --}}
                <div class="mb-3 input-group" style="display:none" id="admin">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i></span>
                    </div>

                    <input id="admin" type="text" class="form-control @error('admin') is-invalid @enderror"
                        name="admin" placeholder="Sila Masukkan Username">

                    @error('email')
                        <div class="col-12 alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror

                </div>

                <button type="submit">Hantar</button>
                <a href="{{ route('login') }}">Log Masuk</a>
            </form>
        </div>
        <div class="overlay-container"
            style="background:url({{ asset('theme/images/background/help.png') }}); background-size:cover">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <span style="color:white">
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
</body>

<footer>
    <p>
        Hak Cipta Terpelihara 2022 © eKilang Malaysian Palm Oil Board<br>
        Paparan terbaik dalam Internet Explorer 11.0+,
        Google Chrome 6+, Mozilla Firefox 4+, Safari 3+, dan Opera 9+.
    </p>
</footer>

<script src="{{ asset('nice-admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>

<script src="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.js') }}"></script>
<script src="{{ asset('nice-admin/assets/extra-libs/toastr/toastr-init.js') }}"></script>
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
<script type="text/javascript">
    function showDetail() {
        var kat = $('#kat').val();
        // const total = $produk2;

        if (kat == "admin") {
            $("#admin").removeAttr("style");
            $("#lesen").removeAttr("style").hide();
        } else {
            $("#lesen").removeAttr("style");
            $("#admin").removeAttr("style").hide();
        }
    }
</script>
<style>
    /* Hide page by default */
    html { display : none; }
  </style>

  <script>
    if (self == top) {
      // Everything checks out, show the page.
      document.documentElement.style.display = 'block';
    } else {
      // Break out of the frame.
      top.location = self.location;
    }
  </script>
