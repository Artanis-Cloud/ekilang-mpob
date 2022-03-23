<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('theme/kilangstyles/css/loginstyle.css') }}" rel=" stylesheet">
</head>


<div class="container" style="background-image: url('theme/images/background/pusat-simpanan.png');">
    <div class="card">
        <div class="form">
            <div class="left-side">
                <div class="main_signin active">
                    <br>
                    <br>
                    <div class="top-div"> <img src="{{ asset('theme/images/favicon.png') }}" style="margin-left:40%">
                        <h2 style="text-align: center"><b>e-Kilang</b></h2>
                        <h></h>
                    </div>
                    <div class="sign_in">
                        <h3 style="font-size: 12px">Log Masuk</h3>
                    </div>
                    <div class="input-text"> <input type="text" placeholder="No. Lesen" id="user_signin_name" require> </div>
                    <div class="input-text"> <input type="text" placeholder="Kata Laluan" require> </div>
                    <div class="buttons sign_button"> <button class="signin_submit_button">Log Masuk</button> </div>
                </div>

            </div>
            <div class="right-side">
                <div class="cover-image"> <img class="right_img "
                 style=" background: linear-gradient(to right, #ff9900 0%, #ff6600 100%);">
                </div>

                <div class="right_text">
                    <p class="card-text" style="font-size: 12px; margin-bottom:-50px; margin-right:20px">
                        <span style="font-size:15px" >Sebarang pertanyaan sila hubungi :</span><br><br>
                        Penyata Bulanan Kilang Buah - MPOB (EL) MF4 - Pn. Nor Syaida (Emel:
                        nor.syaida@mpob.gov.my atau Tel :
                        03-7802 2917)<br><br>
                       Penyata Bulanan Kilang Buah - MPOB (EL) MF4 - En. Rominizam (Emel:
                        rominizam@mpob.gov.my atau Tel :
                        03-7802 2918)<br><br>
                       Penyata Bulanan Kilang Penapis - MPOB (EL) RF4 - Pn. Aziana (Emel:
                        aziana.misnan@mpob.gov.my atau Tel :
                        03-7802 2955)<br><br>
                       Penyata Bulanan Kilang Oleokimia - MPOB (EL) CM4 - Pn. Aziana (Emel:
                        aziana.misnan@mpob.gov.my atau Tel :
                        03-7802 2955)<br><br>
                       Penyata Bulanan Kilang Isirong - MPOB (EL) CF4 - Pn. Nor Baayah (Emel
                        abby@mpob.gov.my atau Tel : 03-7802
                        2865)<br><br>
                       Penyata Bulanan Pusat Simpanan - MPOB (EL) KS4 - Pn. Nor Baayah (Emel
                        abby@mpob.gov.my atau Tel : 03-7802
                        2865)<br><br>
                       No Faks bagi Penyata Bulanan : 03-7803 2323 / 03-7803 1399<br>
                        <br><mark><b>PERINGATAN : Pihak tuan/puan dikehendaki melapor maklumat mingguan (PENYATA
                                MINGGUAN) melalui sistem
                                ekilang sebelum pukul 12.00 malam pada hari pertama setiap minggu
                                (ISNIN).<br></mark><br>
                    </p>
                </div>
            </div>
        </div>
    {{-- </div> --}}
</div>

<script>
var nxt_btn=document.querySelectorAll(".next_button");
var prev_btn=document.querySelectorAll(".previous_button");
var submit_btn=document.querySelectorAll(".submit_button");
var main_form=document.querySelectorAll(".main");
var main_signin_form=document.querySelectorAll(".main_signin");
var sign_in_submit=document.querySelector(".signin_submit_button")
var progressbar = document.querySelectorAll(".steps li");
var steps = document.querySelector(".steps");
let forumnumber=0;
nxt_btn.forEach(function(butn){
butn.addEventListener('click',function(){
if(!validateform()){
return false;
}
forumnumber++;
progress('color');
update_form();
});
});


prev_btn.forEach(function(prev_button){
prev_button.addEventListener('click',function(){
forumnumber--;
progress('nocolor');
update_form();
});
});

submit_btn.forEach(function(submit_button){
submit_button.addEventListener('click',function(){
if(!validateform()){
return false;
}
var f_name=document.querySelector("#user_name");
var shown_name = document.querySelector("#shown_name");
shown_name.innerHTML=f_name.value;
forumnumber++;
update_form();
steps.classList.add("d-none");
});
});

let signinnumber = 0;
sign_in_submit.addEventListener('click',function(){
if(!validateformsignin()) return false;
signinnumber++;
main_signin_form.forEach(function(main){
main.classList.remove("active");
});
var f_name=document.querySelector("#user_signin_name");
var shown_name = document.querySelector("#shown_signin_name");
shown_name.innerHTML=f_name.value;
main_signin_form[signinnumber].classList.add("active");
});




function progress(state){
if(state=='color'){
progressbar[forumnumber].classList.add('li-active');
}else{

progressbar[forumnumber+1].classList.remove('li-active');
}

}


function update_form(){
main_form.forEach(function(main){
main.classList.remove('active');
});
main_form[forumnumber].classList.add('active');
}

function validateform(){
validate=true;
var validate_inputs = document.querySelectorAll(".main.active input");
validate_inputs.forEach(function(input_valid){
input_valid.classList.remove('warning');
if(input_valid.hasAttribute('require')){
if(input_valid.value.length==0){
validate=false;
input_valid.classList.add('warning');
}
}
});
return validate;
}

function validateformsignin(){
validate=true;
var validate_inputs = document.querySelectorAll(".main_signin.active input");
validate_inputs.forEach(function(input_valid){
input_valid.classList.remove('warning');
if(input_valid.hasAttribute('require')){
if(input_valid.value.length==0){
validate=false;
input_valid.classList.add('warning');
}
}
});
return validate;
}


var signin_toggle = document.querySelector(".sign-in-up-toggle");
var s_form = document.querySelectorAll(".s_form");
var account = document.querySelectorAll(".account");
var right_image=document.querySelectorAll(".right_img");
signin_toggle.addEventListener('click',function(){

s_form.forEach(function(form){
form.classList.toggle("d-none");
});

account.forEach(function(acc){
acc.classList.toggle("d-none");
});

right_image.forEach(function(ri_img){
ri_img.classList.toggle("d-none");
});

if(signin_toggle.innerHTML=="Sign in"){
signin_toggle.innerHTML="Sign up";
}
else{
signin_toggle.innerHTML="Sign in";
}


});


</script>
