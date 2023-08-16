let emailIco = document.querySelector('#email3_ico');
let passIco = document.querySelector('#pass3_ico');
let passlayIco = document.querySelector('#passlay_ico');

let email3 = document.querySelector('#email3');
let pass3 = document.querySelector('#pass3');
let passlay = document.querySelector('#passlay');

function checkUser(user) {
    if (user.value.length >= 3) {
        emailIco.style.color = 'green';
        emailIco.classList.remove('fa-xmark');
        emailIco.classList.add('fa-check');
        emailIco.classList.add('fa-shake');
        email3.style.color = 'green';
        setTimeout(function (params) {
            emailIco.classList.remove('fa-shake');
        }, 1000);
    }  else {
        emailIco.style.color = 'red';
        email3.style.color = 'red';
    }
}

function checkPass(pass) {
    
}