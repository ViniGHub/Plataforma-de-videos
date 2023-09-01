// Chama os icons da pagina de criação de usuario
let emailIco = document.querySelector('#email3_ico');
let emailEspico = document.querySelector('#emailEsp_ico');

let passIco = document.querySelector('#pass3_ico');
let passlayIco = document.querySelector('#passlay_ico');


// Chama os textos de confirmação da pagina de criação de usuario
let email3 = document.querySelector('#email3');
let emailEsp = document.querySelector('#emailEsp');

let pass3 = document.querySelector('#pass3');
let passlay = document.querySelector('#passlay');


// informa o estado das validações de senha 
let isRightE3 = false;
let isRightEsp = false;
let isRightP3 = false;
let isRightPL = false;

// Chama os campos de input de dados da pagina de criação de usuario
let us = document.querySelector('#usuario');
let ps = document.querySelector('#senha')

// chama as vars do CSS
let styl = document.querySelector(':root');

// Botão do formulario e formulario
let btnForm = document.querySelector('#btnForm');
let formU = document.querySelector('#form_userVal');

formU.addEventListener('submit', (e) => {
    e.preventDefault();
});

us.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        checkForm();
    }
});

ps.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        checkForm();
    }
});

btnForm.addEventListener('click', () => {
    checkForm();
});


function checkForm() {
    if (!checkEmpty()) {
        if (checkUser(us)) {
            if (checkPass(ps)) {
                formU.submit();
            } else {
                window.alert('Insira uma senha válida.');
                ps.focus();
            }
        } else {
            window.alert('Insira um Usuario válido.');
            us.focus();
        }
    }

}

function checkEmpty() {
    if (!us.value) {
        window.alert('Preencha o campo Usuario.');
        us.focus();
        return true;
    } else if (!ps.value) {
        window.alert('Preencha o campo Senha.');
        ps.focus();
        return true;
    }

    return false;
}

function checkUser(user) {
    if (userEspfun(user) & user3fun(user)) {
        styl.style.setProperty('--campo-confirm-E', 'rgb(126, 231, 126)');

        return true;
    } else if (styl.style.getPropertyValue('--campo-confirm-E') !== '#154580') {
        styl.style.setProperty('--campo-confirm-E', '#154580');

        return false;
    }
    
}

function user3fun(user) {
    if (user.value.length >= 3 && !isRightE3) {
        isRightE3 = true;
        emailIco.style.color = 'green';
        emailIco.classList.remove('fa-xmark');
        emailIco.classList.add('fa-check');
        emailIco.classList.add('fa-shake');
        email3.style.color = 'green';
        setTimeout(function (params) {
            emailIco.classList.remove('fa-shake');
        }, 1000);

    } else if (user.value.length < 3 && isRightE3) {
        isRightE3 = false;
        emailIco.style.color = 'red';
        email3.style.color = 'red';
        emailIco.classList.remove('fa-check');
        emailIco.classList.add('fa-xmark');

        emailIco.classList.add('fa-shake');
        setTimeout(function (params) {
            emailIco.classList.remove('fa-shake');
        }, 1000);

    }

    return isRightE3;
}

function userEspfun(user) {
    if (!user.value.includes(' ') && !isRightEsp) {
        isRightEsp = true;
        emailEspico.style.color = 'green';
        emailEspico.classList.remove('fa-xmark');
        emailEspico.classList.add('fa-check');
        emailEspico.classList.add('fa-shake');
        emailEsp.style.color = 'green';
        setTimeout(function (params) {
            emailEspico.classList.remove('fa-shake');
        }, 1000);

    } else if (user.value.includes(' ') && isRightEsp) {
        isRightEsp = false;
        emailEspico.style.color = 'red';
        emailEsp.style.color = 'red';
        emailEspico.classList.remove('fa-check');
        emailEspico.classList.add('fa-xmark');

        emailEspico.classList.add('fa-shake');
        setTimeout(function (params) {
            emailEspico.classList.remove('fa-shake');
        }, 1000);

    }

    return isRightEsp;
}

function checkPass(pass) {
    if (passlayfun(pass) & pass3fun(pass)) {
        styl.style.setProperty('--campo-confirm-P', 'rgb(126, 231, 126)');

        return true;
    } else if (styl.style.getPropertyValue('--campo-confirm-P') !== '#154580') {
        styl.style.setProperty('--campo-confirm-P', '#154580');

        return false;
    }
}

function pass3fun(pass) {
    if (pass.value.length >= 3 && !isRightP3) {
        isRightP3 = true;
        passIco.style.color = 'green';
        passIco.classList.remove('fa-xmark');
        passIco.classList.add('fa-check');
        passIco.classList.add('fa-shake');
        pass3.style.color = 'green';
        setTimeout(function (params) {
            passIco.classList.remove('fa-shake');
        }, 1000);

    } else if (pass.value.length < 3 && isRightP3) {
        isRightP3 = false;
        passIco.style.color = 'red';
        pass3.style.color = 'red';
        passIco.classList.remove('fa-check');
        passIco.classList.add('fa-xmark');

        passIco.classList.add('fa-shake');
        setTimeout(function (params) {
            passIco.classList.remove('fa-shake');
        }, 1000);

    }

    return isRightP3;
}

function passlayfun(pass) {
    let passVal = pass.value.toUpperCase();

    if (passVal.includes('LAY') && !isRightPL) {
        isRightPL = true;
        passlayIco.style.color = 'green';
        passlayIco.classList.remove('fa-xmark');
        passlayIco.classList.add('fa-check');
        passlayIco.classList.add('fa-shake');
        passlay.style.color = 'green';
        setTimeout(function (params) {
            passlayIco.classList.remove('fa-shake');
        }, 1000);
    } else if (!passVal.includes('LAY') && isRightPL) {
        isRightPL = false;
        passlayIco.style.color = 'red';
        passlay.style.color = 'red';
        passlayIco.classList.remove('fa-check');
        passlayIco.classList.add('fa-xmark');

        passlayIco.classList.add('fa-shake');
        setTimeout(function (params) {
            passlayIco.classList.remove('fa-shake');
        }, 1000);

    }

    return isRightPL;

}

checkUser(us);
checkPass(ps);