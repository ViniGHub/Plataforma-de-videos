// Chama os icons da pagina de criação de usuario
let emailIco = document.querySelector('#email3_ico');
let passIco = document.querySelector('#pass3_ico');
let passlayIco = document.querySelector('#passlay_ico');

// Chama os textos de confirmação da pagina de criação de usuario
let email3 = document.querySelector('#email3');
let pass3 = document.querySelector('#pass3');
let passlay = document.querySelector('#passlay');

// informa o estado das validações de senha 
let isRightE = false;
let isRightP3 = false;
let isRightPL = false;

// Chama os campos de input de dados da pagina de criação de usuario
let us = document.querySelector('#usuario');
let ps = document.querySelector('#senha')

// chama as vars do CSS
let styl = document.querySelector(':root');

// Botão do formulario e formulario
let btnForm = document.querySelector('#btnForm');
let formCr = document.querySelector('#formCr');

formCr.addEventListener('submit', (e) => {
    e.preventDefault();
});

us.addEventListener('keypress', (e) => {

    if (e.key === 'Enter') {
        if (checkUser(us)) {
            if (checkPass(ps)) {
                formCr.submit();
            } else {
                window.alert('Insira uma senha válida.');
                ps.focus();
            }
        } else {
            window.alert('Insira um Usuario válido.')
            us.focus();
        }
    }
});

ps.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        if (checkUser(us)) {
            if (checkPass(ps)) {
                formCr.submit();
            } else {
                window.alert('Insira uma senha válida.');
                ps.focus();
            }
        } else {
            window.alert('Insira um Usuario válido.');
            us.focus();
        }
    }
});

function checkUser(user) {

    if (user.value.length >= 3 && !isRightE) {
        isRightE = true;
        emailIco.style.color = 'green';
        emailIco.classList.remove('fa-xmark');
        emailIco.classList.add('fa-check');
        emailIco.classList.add('fa-shake');
        email3.style.color = 'green';
        setTimeout(function (params) {
            emailIco.classList.remove('fa-shake');
        }, 1000);

        styl.style.setProperty('--campo-confirm-E', 'rgb(126, 231, 126)');

    } else if (user.value.length < 3 && isRightE) {
        isRightE = false;
        emailIco.style.color = 'red';
        email3.style.color = 'red';
        emailIco.classList.remove('fa-check');
        emailIco.classList.add('fa-xmark');

        emailIco.classList.add('fa-shake');
        setTimeout(function (params) {
            emailIco.classList.remove('fa-shake');
        }, 1000);

        styl.style.setProperty('--campo-confirm-E', '#154580');
    }

    return isRightE;

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