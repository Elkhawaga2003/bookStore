let msga=document.get
let uemail = document.getElementById('em');
let upass = document.getElementById('pa');
let msg = document.querySelector('.ms');
function checkemail() {
    this.event.preventDefault();
    if (uemail.value == '') {
        msg.innerHTML = 'Enter availd email ';
        setTimeout(() => msg.innerHTML = '', 2000);
    }
}
function checkpassword() {
    this.event.preventDefault();
    if (upass.value == '') {
        msg.innerHTML = 'Enter availd password';
        setTimeout(() => msg.innerHTML = '', 2000);
    }
}

