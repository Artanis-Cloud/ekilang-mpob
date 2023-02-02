<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<link href="{{ asset('nice-admin/assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
<style>

img{
	width: 100%;
}
.login {
    height: 100%;
    width: 100%;
    background:url( {{ asset("theme/images/background/land_1.png") }});
    position: relative;
    background-size: 100%;
    background-repeat: no-repeat;
}
.login_box {
    width: 700px;
    height: 390px;
    position: absolute;
    top: 20%;
    left: 15%;
    /* transform: translate(-50%,-60%); */
    /* background: #fff; */
    border-radius: 10px;
    box-shadow: 1px 4px 22px -8px #0004;
    display: flex;
    overflow: hidden;
}
.login_boxs {
    width: 700px;
    height: 100px;
    position: absolute;
    top: 78%;
    left: 15%;
    /* transform: translate(-50%,-60%); */
    background: #fff;
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
  font-size: 19px;
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
    font-size: 12px;
}
.left{
	background: rgb(255, 255, 255);
}
.submit {
    border: none;
    font-size: 13px;
    padding: 10px 30px;
    border-radius: 8px;
    display: block;
    margin: auto;
    margin-top: 10px;
    background: linear-gradient(to right, #4fd2c7 59%, #ffffff 158%);
    color: #fff;
    font-weight: bold;
    -webkit-box-shadow: 0px 9px 15px -11px rgba(88,54,114,1);
    -moz-box-shadow: 0px 9px 15px -11px rgba(88,54,114,1);
    box-shadow: 0px 9px 15px -11px rgba(88,54,114,1);
}



footer {
    background-color: #222;
    color: #fff;
    font-size: 7px;
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
    /* background: linear-gradient(212.38deg, rgb(190 120 106 / 85%) 0%, #f25939e3 80%); */
    background: linear-gradient(212.38deg, #00458b 0%, #3fd2c7 80%);
    opacity: 90%;
    /* background: linear-gradient(212.38deg, rgba(25, 12, 55) 0%, rgba(57, 66, 85, 0.71) 100%),url({{ asset('theme/images/background/biji.png') }}); */
	color: #fff;
	position: relative;
}

.right .right-text{
  height: 100%;
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
  font-size: 11px;
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
    font-size: 11px;
    font-weight: 500;
    height: 5px;
}





</style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


<body>
	<section class="login">
        <div class="">
            <div class="login_box">
                <div class="right">
                    <div class="right-text">
                        {{-- <h2>SELAMAT DATANG KE SISTEM e-Kilang</h2> --}}
                        <h5>
                            Sistem e-Kilang adalah satu sistem laporan dan pengurusan digital bertujuan<br>
                            mengumpul dan memproses penyata bulananbagi kategori Kilang Buah Kelapa Sawit,<br>
                            Kilang Penapis, Kilang  Pelumat Isirong Sawit, Kilang Oleokimia Sawit, Kilang Biodiese dan<br>
                            Kemudahan Simpanan Pukal mengikut Akta Lembaga Minyak Sawit Malaysia 1998,<br>
                            Peraturan-Peraturan Lembaga Minyak Sawit Malaysia (Pelesenan) 2005.
                        </h5><hr style="margin-top: 0rem; margin-bottom: 0rem">
                        <p style="text-align: left; margin-left: 5%; ">
                            Sebarang pertanyaan sila hubungi :
                        </p>
                        <p style="text-align: left; margin-left: 5%; "><b>
                            Penyata Bulanan Kilang Buah - MPOB (EL) MF4</b>
                        </p>
                        <div class="row" style=" margin-left: 3%; font-size:10px" >
                            <div class="col-3">Pn. Nor Syaida : </div>
                            <div class="col-9">(Emel:
                                nor.syaida@mpob.gov.my atau Tel : 03-7802 2917)</div>
                        </div>
                        <div class="row" style=" margin-left: 3%; font-size:10px" >
                            <div class="col-3">En. Rominizam : </div>
                            <div class="col-9">(Emel:
                                rominizam@mpob.gov.my atau Tel : 03-7802 2918)</div>
                        </div>
                        <p style="text-align: left; margin-left: 5%; "><b>
                            Penyata Bulanan Kilang Penapis - MPOB (EL) RF4</b>
                        </p>
                        <div class="row" style=" margin-left: 3%; font-size:10px" >
                            <div class="col-3">Pn. Aziana : </div>
                            <div class="col-9">(Emel:
                                aziana.misnan@mpob.gov.my atau Tel :
                                03-7802 2955)</div>
                        </div>
                        <p style="text-align: left; margin-left: 5%; "><b>
                            Penyata Bulanan Kilang Oleokimia - MPOB (EL) CM4</b>
                        </p>
                        <div class="row" style=" margin-left: 3%; font-size:10px" >
                            <div class="col-3">Pn. Aziana : </div>
                            <div class="col-9">(Emel:
                                aziana.misnan@mpob.gov.my atau Tel :
                                03-7802 2955)</div>
                        </div>
                        <p style="text-align: left; margin-left: 5%; "><b>
                            Penyata Bulanan Kilang Isirung - MPOB (EL) CF4</b>
                        </p>
                        <div class="row" style=" margin-left: 3%; font-size:10px" >
                            <div class="col-3">Pn. Nor Baayah : </div>
                            <div class="col-9">(Emel
                                abby@mpob.gov.my atau Tel : 03-7802
                                2865)</div>
                        </div>
                        <p style="text-align: left; margin-left: 5%; "><b>
                            Penyata Bulanan Pusat Simpanan - MPOB (EL) KS4</b>
                        </p>
                        <div class="row" style=" margin-left: 3%; font-size:10px" >
                            <div class="col-3">Pn. Nor Baayah : </div>
                            <div class="col-9">(Emel
                                abby@mpob.gov.my atau Tel : 03-7802
                                2865)</div>
                        </div>
                        <p style="text-align: left; margin-left: 5%; "><b>
                            Penyata Bulanan Kilang Oleokimia (Biodiesel) - MPOB EL (CM4)</b>
                        </p>
                        <div class="row" style=" margin-left: 3%; font-size:10px" >
                            <div class="col-3">Cik Rohidayati
                                Sukhaila : </div>
                            <div class="col-9">(Emel: rohidayati@mpob.gov.my atau Tel: 03-78022991)<br>
                                <b>No Faks bagi Penyata Bulanan</b><br> 03-7803 2323 / 03-7803 1399<br></div>
                        </div>

                    </div>
                    {{-- <div class="right-inductor"><img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt=""></div> --}}
                </div>
                <div class="left">
                    {{-- <div class="top_link"><a href="#"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Return home</a></div> --}}
                    <div class="contact">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h3 style="color: #164875; font-size: 20px">&nbsp; &nbsp;  LOG MASUK</h3><br>
                            {{-- <div class="container">
                                <img src="{{ asset('theme/images/mpob2.png') }}" class="brand-image img-circle elevation-3"
                                    style="height:100px; width:100px; margin-left:30% " alt="logo">
                            </div> --}}
                            <div class="container">
                                <img src="{{ asset('theme/images/background/logo7.png') }}" class="brand-image img-circle elevation-3"
                                    style="height:60px; width:110%;  " alt="logo">
                            </div><br>
                            <input id="e_nl" type="text" class="form-control @error('username') is-invalid @enderror"
                                oninvalid="setCustomValidity('Sila isi butiran ini')" oninput="setCustomValidity('')" required
                                name="username" value="{{ old('username') }}" autocomplete="off" maxlength="12"
                                placeholder="No. Lesen">

                            @error('username')
                                <div class="col-12 alert alert-danger" style="font-size: 15px">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <input id="password" type="password" oninvalid="setCustomValidity('Sila isi butiran ini')"
                                oninput="setCustomValidity('')" required autocomplete="off"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="off" placeholder="Kata Laluan">
                            {{-- <span id="error"></span> --}}

                            @error('password')
                                <div class="col-12 alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <a href="{{ route('forget-password.show') }}" style="font-size: 11px">Terlupa Kata Laluan?</a>
                            <button class="submit" type="submit" onclick="errorMessage()">Log Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="login_boxs">

            </div>

        </div>

	</section>
</body>


<footer>
    <p>
        Hak Cipta Terpelihara 2022 © eKilang Malaysian Palm Oil Board &nbsp;
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
