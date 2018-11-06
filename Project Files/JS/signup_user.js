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
    var check1 = 0;
    var check2 = 0;
    var check3 = 0;
    var check4 = 0;
    var check5 = 0;
    var check6 = 0;
    var check7 = 0;
    var check8 = 0;
    // First Name Validation
    var fname = document.getElementById("fname");
    if (fname.value == "") {
        fname.style.borderBottom = "1px solid red";
    }
    else {
        fname.style.borderBottom = "1px solid #fff";
        check1 = 1;
    }
    // Last Name Validation
    var lname = document.getElementById("lname");
    if (lname.value == "") {
        lname.style.borderBottom = "1px solid red";
    }
    else {
        lname.style.borderBottom = "1px solid #fff";
        check2 = 1;
    }
    // Email Validation
    var email = document.getElementById("email");
    if (email.value == "") {
        email.style.borderBottom = "1px solid red";
    }
    else {
        email.style.borderBottom = "1px solid #fff";
        check3 = 1;
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
        check4 = 1;
    }

    // Address Validation
    var addr = document.getElementById("addr");
    if (addr.value == "") {
        addr.style.borderBottom = "1px solid red";
    }
    else {
        addr.style.borderBottom = "1px solid #fff";
        check5 = 1;
    }
    // User Name Validation
    var uname = document.getElementById("uname");
    if (uname.value == "") {
        uname.style.borderBottom = "1px solid red";
    }
    else {
        uname.style.borderBottom = "1px solid #fff";
        check6 = 1;
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
        check7 = 1;
    }

    var u = document.getElementById("alert3");
    if(fname.value=="" || lname.value=="" || email.value=="" || phno.value=="" || addr.value=="" || uname.value=="" ||x.value=="" ||y.value==""){
        u.innerHTML = "<sup>*</sup> Please Fill All the Mandatory Fields";
        u.style.color = "red";
        u.style.display = "block";
    }
    else{
        u.style.display = "none";
        check8 = 1;
    }    
}