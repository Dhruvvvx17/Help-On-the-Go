function showPassword() {
    var x = document.getElementById("pwd");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function Validation() {
    // Email Validation
    var email = document.getElementById("email");
    if (email.value == "") {
        email.style.borderBottom = "1px solid red";
    }
    else {
        email.style.borderBottom = "1px solid #fff";
    }
    //Password Validation
    var lname = document.getElementById("pwd");
    if (lname.value == "") {
        lname.style.borderBottom = "1px solid red";
    }
    else {
        lname.style.borderBottom = "1px solid #fff";
    }
}