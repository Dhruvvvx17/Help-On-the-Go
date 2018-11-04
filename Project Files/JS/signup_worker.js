function showPassword() {
    var x = document.getElementById("pwd");
    var y = document.getElementById("pwd2");
    if (x.type === "password" && y.type === "password") {
        x.type = "text";
        y.type = "text";
    } else {
        x.type = "password";
        y.type = "password";
    }
}

function Validation() {
    // First Name Validation
    var fname = document.getElementById("fname");
    if (fname.value == "") {
        fname.style.borderBottom = "1px solid red";
    }
    else {
        fname.style.borderBottom = "1px solid #fff";
    }
    // Last Name Validation
    var lname = document.getElementById("lname");
    if (lname.value == "") {
        lname.style.borderBottom = "1px solid red";
    }
    else {
        lname.style.borderBottom = "1px solid #fff";
    }
    // Email Validation
    var email = document.getElementById("email");
    if (email.value == "") {
        email.style.borderBottom = "1px solid red";
    }
    else {
        email.style.borderBottom = "1px solid #fff";
    }

    // Workplace Validation
    var Workplace = document.getElementById("area");
    if (Workplace.value == "") {
        Workplace.style.borderBottom = "1px solid red";
    }
    else {
        Workplace.style.borderBottom = "1px solid #fff";
    }

    // User Name Validation
    var uname = document.getElementById("uname");
    if (uname.value == "") {
        uname.style.borderBottom = "1px solid red";
    }
    else {
        uname.style.borderBottom = "1px solid #fff";
    }

    // Phone Number Validation
    var phno = document.getElementById("phno");
    var w = document.getElementById("alert1");
    var check = parseInt(phno.value);
    if (phno.value == "") {
        phno.style.borderBottom = "1px solid red";
        w.style.display = "none"
    }
    else if (isNaN(check)) {
        w.innerHTML = "Invalid Phone Number";
        w.style.display = "block";
    }
    else if (phno.value.length < 10) {
        w.innerHTML = "Invalid Phone Number.Min 10 Digits";
        w.style.display = "block";
    }
    else {
        phno.style.borderBottom = "1px solid #fff";
        w.style.display = "none";
    }

    // Password Validation
    var x = document.getElementById("pwd");
    var y = document.getElementById("pwd2");
    var z = document.getElementById("alert2");
    if (x.value == "" && y.value == "") {
        x.style.borderBottom = "1px solid red";
        y.style.borderBottom = "1px solid red";
        z.style.display = "none";
    }
    else if (x.value != y.value) {
        x.style.borderBottom = "1px solid red";
        y.style.borderBottom = "1px solid red";
        z.innerHTML = "Passwords Do Not Match";
        z.style.display = "block";
    }
    else if (x.value.length < 8) {
        z.innerHTML = "Password too short. Min 8 characters";
        z.style.display = "block";
    }
    else if (x.value == y.value) {
        x.style.borderBottom = "1px solid #fff";
        y.style.borderBottom = "1px solid #fff";
        z.style.display = "none";
    }

    var u = document.getElementById("alert3");
    if (fname.value == "" || lname.value == "" || email.value == "" || phno.value == "" || Workplace.value == "" || uname.value == "" || x.value == "" || y.value == "") {
        u.innerHTML = "<sup>*</sup> Please Fill All the Mandatory Fields";
        u.style.color = "red";
        u.style.display = "block";
    }
    else{
        u.style.display = "none";
    }
}