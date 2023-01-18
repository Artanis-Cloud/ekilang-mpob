{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"> --}}
{{-- <link href="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet"> --}}
{{-- <link rel="preconnect" href="https://fonts.gstatic.com"> --}}
{{-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet"> --}}
{{-- <style> --}}



<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<style>

    img{
        width: 100%;
    }
    .login {
        height: 100%;
        width: 100%;
        background:url( {{ asset("theme/images/background/palm5.jpg") }});
        position: relative;
        background-size: 100%;
        background-repeat: no-repeat;
    }
    .login_box {
        width: 1000px;
        height: 555px;
        position: absolute;
        top: 55%;
        left: 50%;
        transform: translate(-50%,-60%);
        /* background: #fff; */
        border-radius: 10px;
        box-shadow: 1px 4px 22px -8px #0004;
        display: flex;
        overflow: hidden;
    }
    .login_box .left{
    width: 40%;
    height: 100%;
    padding: 25px 25px;

    }
    .login_box .right{
    width: 70%;
    height: 100%
    }
    .left .top_link a {
        color: #452A5A;
        font-weight: 400;
    }
    .left .top_link{
    height: 20px
    }
    .left .contact{
        display: block;
        align-items: center;
        justify-content: center;
        align-self: center;
        height: 100%;
        width: 73%;
        margin: auto;
    }
    .left h3{
    text-align: center;
    margin-bottom: 40px;
    }
    .left input {
        border: none;
        width: 80%;
        margin: 15px 0px;
        border-bottom: 1px solid #4f30677d;
        padding: 7px 9px;
        width: 100%;
        overflow: hidden;
        background: transparent;
        font-weight: 600;
        font-size: 14px;
    }
    .left{
        background: rgb(255, 255, 255);

    }
    .submit {
        border: none;
        padding: 15px 70px;
        border-radius: 8px;
        display: block;
        margin: auto;
        margin-top: 50px;
        background: linear-gradient(to right, #f25939 59%, #ffffff 158%);
        color: #fff;
        font-weight: bold;
        -webkit-box-shadow: 0px 9px 15px -11px rgba(88,54,114,1);
        -moz-box-shadow: 0px 9px 15px -11px rgba(88,54,114,1);
        box-shadow: 0px 9px 15px -11px rgba(88,54,114,1);
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

    .right {
        background: linear-gradient(212.38deg, rgb(190 120 106 / 97%) 0%, #f25939e3 80%);

        /* background: linear-gradient(212.38deg, rgba(25, 12, 55) 0%, rgba(57, 66, 85, 0.71) 100%),url({{ asset('theme/images/background/biji.png') }}); */
        color: #fff;
        position: relative;
    }

    .right .right-text{
    /* height: 100%; */
    position: relative;
    transform: translate(0%, 5%);
    }
    .right-text h2{
    display: block;
    width: 100%;
    text-align: center;
    font-size: 20px;
    font-weight: 500;
    }
    .right-text h5{
    display: block;
    width: 100%;
    text-align: center;
    font-size: 14px;
    font-weight: 400;
    }

    .right .right-inductor{
    position: absolute;
    width: 70px;
    height: 7px;
    background: #fff0;
    left: 50%;
    bottom: 70px;
    transform: translate(-50%, 0%);
    }
    .top_link img {
        width: 28px;
        padding-right: 7px;
        margin-top: -3px;
    }

    .right-text p {
        display: block;
        width: 100%;
        text-align: center;
        font-size: 13px;
        font-weight: 500;
        height: 5px;
    }

</style>

<body>
	<section class="login">
		<div class="login_box">
			<div class="left">
				{{-- <div class="top_link"><a href="#"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Return home</a></div> --}}
				<div class="contact">
                    <form method="POST" action="{{ route('forget-password.submit') }}">
                        @csrf
                        <h3>Terlupa Kata Laluan</h3>
                        {{-- <div class="social-container">
                            <img src="{{ asset('theme/images/mpob2.png') }}" class="brand-image img-circle elevation-3"
                                style="height:100px; width:100px; margin-left:35% " alt="logo">
                        </div>
                        <div class="social-container">
                            <img src="{{ asset('theme/images/background/ekilanglogo.png') }}" class="brand-image img-circle elevation-3"
                                style="height:80px; width:70%; margin-left:15% " alt="logo">
                        </div><br> --}}
                        <div class="container">
                            <img src="{{ asset('theme/images/background/logo4.png') }}" class="brand-image img-circle elevation-3"
                                style="height:70px; width:110%; margin-left:5%  " alt="logo">
                        </div><br>
                        {{-- <span> <b>Sistem e-Kilang</b></span>
                        <span><b> Lembaga Minyak Sawit</b></span> --}}
                        <select class="form-control select" id="kat" name="kat" required onchange="showDetail()"
                            oninvalid="this.setCustomValidity('Sila buat pilihan dibahagian ini')"
                            oninput="this.setCustomValidity('')">
                            <option selected hidden disabled value="">Sila Pilih</option>
                            <option value="admin">Pegawai MPOB</option>
                            <option value="pelesen">Pemegang Lesen</option>


                        </select>
                        <input id="lesen" type="text" class="form-control @error('lesen') is-invalid @enderror"
                            name="lesen" placeholder="Sila Masukkan No. Lesen" maxlength="12" style="display:none"
                            onkeypress="return isNumberKey(event)">


                        @error('email')
                            <div class="col-12 alert alert-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror

                        <input id="admin" type="text" class="form-control @error('admin') is-invalid @enderror"
                            name="admin" placeholder="Sila Masukkan Username" style="display:none">

                        @error('email')
                            <div class="col-12 alert alert-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror

                        <button class="submit" type="submit" style="margin-top: 20px" onclick="errorMessage()">Hantar</button>
                        <a style="margin-left:35%" href="{{ route('login') }}">Log Masuk</a>
                    </form>
				</div>
			</div>
			<div class="right">
				<div class="right-text">
					<h2>SELAMAT DATANG KE SISTEM e-Kilang</h2>
					<h5>Sistem e-Kilang adalah satu sistem aplikasi MPOB yang dibangunkan oleh MPOB bertujuan bagi membantu pelesen dalam membuat pelaporan 1-7hb setiap sebulan.</h5>
                    <hr>
                    <p>
                        Sebarang pertanyaan sila hubungi :
                    </p>
                    <p style="text-align: left; margin-left: 5%"><b>
                        Penyata Bulanan Kilang Buah - MPOB (EL) MF4</b>
                    </p>
                    <div class="row" style=" margin-left: 5%; font-size:11px" >
                        <div class="col-3">En. Rominizam : </div>
                        <div class="col-7">(Emel:
                            rominizam@mpob.gov.my atau Tel : 03-7802 2918)</div>
                    </div><br>
                    <p style="text-align: left; margin-left: 5%"><b>
                        Penyata Bulanan Kilang Penapis - MPOB (EL) RF4</b>
                    </p>
                    <div class="row" style=" margin-left: 5%; font-size:11px" >
                        <div class="col-3">Pn. Aziana : </div>
                        <div class="col-7">(Emel:
                            aziana.misnan@mpob.gov.my atau Tel :
                            03-7802 2955)</div>
                    </div><br>
                    <p style="text-align: left; margin-left: 5%"><b>
                        Penyata Bulanan Kilang Oleokimia - MPOB (EL) CM4</b>
                    </p>
                    <div class="row" style=" margin-left: 5%; font-size:11px" >
                        <div class="col-3">Pn. Aziana : </div>
                        <div class="col-7">(Emel:
                            aziana.misnan@mpob.gov.my atau Tel :
                            03-7802 2955)</div>
                    </div><br>
                    <p style="text-align: left; margin-left: 5%"><b>
                        Penyata Bulanan Kilang Isirung - MPOB (EL) CF4</b>
                    </p>
                    <div class="row" style=" margin-left: 5%; font-size:11px" >
                        <div class="col-3">Pn. Nor Baayah : </div>
                        <div class="col-7">(Emel
                            abby@mpob.gov.my atau Tel : 03-7802
                            2865)</div>
                    </div><br>
                    <p style="text-align: left; margin-left: 5%"><b>
                        Penyata Bulanan Pusat Simpanan - MPOB (EL) KS4</b>
                    </p>
                    <div class="row" style=" margin-left: 5%; font-size:11px" >
                        <div class="col-3">Pn. Nor Baayah : </div>
                        <div class="col-7">(Emel
                            abby@mpob.gov.my atau Tel : 03-7802
                            2865)</div>
                    </div><br>
                    <p style="text-align: left; margin-left: 5%"><b>
                        Penyata Bulanan Kilang Oleokimia (Biodiesel) - MPOB EL (CM4)</b>
                    </p>
                    <div class="row" style=" margin-left: 5%; font-size:11px" >
                        <div class="col-3">Cik Rohidayati
                            Sukhaila : </div>
                        <div class="col-7">(Emel: rohidayati@mpob.gov.my atau Tel: 03-78022991)<br>
                            <b>No Faks bagi Penyata Bulanan</b><br> 03-7803 2323 / 03-7803 1399<br></div>
                    </div><br>

				</div>
				{{-- <div class="right-inductor"><img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt=""></div> --}}
			</div>
		</div>
	</section>
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
