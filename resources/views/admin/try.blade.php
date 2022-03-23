<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('theme/kilangstyles/css/loginstyle.css') }}" rel=" stylesheet">
</head>


<div class="container">
    <div class="card">
        <div class="form">
            <div class="left-side">
                <div class="signup-form s_form">
                    <div class="logo"> <img src="https://imgur.com/R9PWQyL.png"> </div>
                    <ul class="steps">
                        <li class="li-active"></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <div class="main active">
                        <div class="top-div">
                            <p>Basic Details</p>
                        </div>
                        <div class="input-text"> <input type="text" placeholder="First name" id="user_name" require> </div>
                        <div class="input-text"> <input type="text" placeholder="Last name"> </div>
                        <div class="input-text"> <input type="text" placeholder="Village/Town/City" require> </div>
                        <div class="input-text"> <input type="text" placeholder="State" require> </div>
                        <div class="input-text"> <input type="text" placeholder="Country" require> </div>
                        <div class="buttons"> <button class="next_button">Next</button> </div>
                    </div>
                    <div class="main">
                        <div class="top-div">
                            <p>Log in to continue</p>
                        </div>
                        <div class="input-text"> <input type="text" placeholder="Father's name" require> </div>
                        <div class="input-text"> <input type="text" placeholder="Mother's name" require> </div>
                        <div class="input-text"> <input type="text" placeholder="Contact No" require> </div>
                        <div class="input-text"> <select require>
                                <option>Select Category</option>
                                <option>General</option>
                                <option>OBC</option>
                                <option>SC</option>
                                <option>ST</option>
                                <option>PWD</option>
                                <option>EWS</option>
                                <option>Other</option>
                            </select> </div>
                        <div class="input-text"> <select>
                                <option>Educational Qualification</option>
                                <option>10th</option>
                                <option>12th</option>
                                <option>Graduation</option>
                                <option>Post Graduation</option>
                                <option>Doctarate</option>
                                <option>Other</option>
                            </select> </div>
                        <div class="buttons"> <button class="previous_button">Previous</button> <button class="next_button">Next</button> </div>
                    </div>
                    <div class="main ">
                        <div class="top-div">
                            <p>Log in to continue</p>
                        </div>
                        <div class="input-text"> <input type="text" placeholder="Enter your class 12th percentage." require> </div>
                        <div class="input-text"> <input type="text" placeholder="Enter your school name"> </div>
                        <div class="input-text"> <input type="text" placeholder="Enter your graduation percentage" require> </div>
                        <div class="input-text"> <input type="text" placeholder="Enter your institution/college/university name"> </div>
                        <div class="input-text"> <select>
                                <option>Any extra-curricular activity</option>
                                <option>Yes</option>
                                <option>No</option>
                            </select> </div>
                        <div class="buttons"> <button class="previous_button">Previous</button> <button class="next_button">Next</button> </div>
                    </div>
                    <div class="main ">
                        <div class="top-div">
                            <p>Log in to continue</p>
                        </div>
                        <div class="input-text"> <input type="text" placeholder="Enter your E-mail address" require> </div>
                        <div class="input-text"> <input type="password" placeholder="Enter your password" require> </div>
                        <div class="input-text"> <input type="password" placeholder="Confirm Password" require> </div>
                        <div class="buttons final_button"> <button class="previous_button">Previous</button> <button class="submit_button">Submit</button> </div>
                    </div>
                    <div class="main">
                        <div class="top-div">
                            <h2>Welcome Back</h2>
                            <p>Log in to continue</p>
                        </div> <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" /> </svg>
                        <div class="check_box">
                            <p>Congratulations Mr./Mrs <span id="shown_name"></span> you have successfully registered.</p>
                        </div>
                    </div>
                </div>
                <div class="signin-form s_form d-none">
                    <div class="main_signin active">
                        <div class="top-div"> <img src="https://imgur.com/R9PWQyL.png">
                            <h2>Welcome Back</h2>
                            <p>Log in to continue</p>
                        </div>
                        <div class="sign_in">
                            <h3>Sign In</h3>
                        </div>
                        <div class="input-text"> <input type="text" placeholder="Username" id="user_signin_name" require> </div>
                        <div class="input-text"> <input type="text" placeholder="E-mail" require> </div>
                        <div class="input-text"> <input type="password" placeholder="Password" require> </div>
                        <div class="buttons sign_button"> <button class="signin_submit_button">Submit</button> </div>
                    </div>
                    <div class="main_signin">
                        <div class="top-div"> <img src="https://imgur.com/R9PWQyL.png">
                            <h2>Welcome Back</h2>
                            <p>Log in to continue</p>
                        </div> <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" /> </svg>
                        <div class="check_box">
                            <p>Congratulations1 Mr./Mrs <span id="shown_signin_name"></span> you have successfully loggedin.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-side">
                <div class="cover-image"> <img class="right_img " src="https://imgur.com/a9M8BXO.jpg"> <img class="right_img d-none" src="https://imgur.com/jUSvhqu.jpg"> </div>
                <div class="header">
                    <p class="account">Already have an account?</p>
                    <p class="account d-none">Don't have an account?</p> <button class="sign-in-up-toggle">Sign in</button>
                </div>
                <div class="right_text">
                    <h2>Donec Facilisis Tortor<br> Ut Augue Lacinia,<br>At Vivera</h2>
                    <p>Lorem Ipsum is simply dummy text of<br> the printing and typesetting industry.<br> Lorem Ipsum has been the industry's standard<br> dummy text ever since the 1500s, when an<br> unknown printer took a galley of type<br> and scrambled it to make a type specimen book.</p>
                </div>
            </div>
        </div>
    </div>
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
