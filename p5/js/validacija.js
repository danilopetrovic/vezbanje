function IsFormValid() {
    var isValid = true;
    var username = document.login.username.value;
    var password = document.login.password.value;

    if (username == "") {
        document.getElementById("usernameSpan").innerHTML = "* Obavezno polje!";
        isValid = false;
    }
    if (password == "") {
        document.getElementById("passwordSpan").innerHTML = "* Obavezno polje!";
        isValid = false;
    }
    return isValid;
}

function blurPolje(element) {
    var errMessage = "";
    if (element.value == "") {
        errMessage = "* Obavezno polje!";
    }
    // console.log(element.name); /*rezultat name od input polja*/
    var elementTag = element.name+"Span"; /*name od input polja zalepim sa recju Span i ispadne na primer usernameSpan ili passwordSpan sto su id-evi spanova u koje zelim da upisem za njih poruku*/
    document.getElementById(elementTag).innerHTML = errMessage;
}