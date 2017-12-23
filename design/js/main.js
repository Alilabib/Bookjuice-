/*global $, console,alert */



// $(function() {
//     'use strict';
// });

function invalid_input() {
    var label = document.getElementById('error_auth');
    label.innerHTML = 'Wrong Email or Password ';
    $('#panel').html('<h1>hello world!</h1>');
}

function check_password() {
    var name = document.getElementById("inputuser");
    var mail = document.getElementById("inputemail");
    var pass_box = document.getElementById("inputpassword");
    var pass_confbox = document.getElementById("inputconfpassword");
    var val = true;
    if (name.value == "") {
        name.style.borderColor = "#e34234";
        name.innerHTML = "Please Fill your user name field";
        val = false;

    } else if (mail.value == "") {
        mail.style.borderColor = "#e34234";
        mail.innerHTML = "Please fill your Email field";
        val = false;
    } else if (pass_box.value == "") {
        pass_box.style.borderColor = "#e34234";
        pass_box.innerHTML = "Please fill your password field";
        val = false;

    } else {
        name.style.borderColor = "#0f0";
        mail.style.borderColor = "#0f0";
        pass_box.style.borderColor = "#0f0";

    }

    if (pass_box.value !== pass_confbox.value) {
        document.getElementById("error_sign").innerHTML = "Password Dosen't match ";
        pass_box.style.borderColor = "#e34234";
        pass_confbox.style.borderColor = "#e34234";
        val = false;
    }




    return val;
}