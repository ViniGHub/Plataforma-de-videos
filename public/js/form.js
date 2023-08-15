let oldU = document.querySelector('#form__oldU');
let formChangeU = document.querySelector('#form_mudarLog');
let bodyForm = document.querySelector('body');
let titulo = document.querySelector('.formulario__titulo');


let btnAnim = document.querySelector('#btn__anim');
let camposAtt = document.querySelectorAll('.campo__att');
let nameAtt = camposAtt[0];
let passAtt = camposAtt[1];

let camposNew = document.querySelectorAll('.campo__new');
let btnSubm = document.querySelector('#btn__subm');
let nameNew = camposNew[0];
let passNew = camposNew[1];

function checkInputAtt(name, pass) {

    try {
        
        if (!nameAtt.value) {
            nameAtt.focus();
            throw new Error('Preencha o campo de Usuario.');
        } else if (!passAtt.value) {
            passAtt.focus();
            throw new Error('Preencha o campo de Senha.');
        } else if (nameAtt.value !== name) {
           nameAtt.focus();
            throw new Error('O nome informado está errado.');
        } else if (passAtt.value !== pass) {
            passAtt.focus();
            throw new Error('A senha informada está errada.');
        }

    } catch (Error) {
        console.error(Error.message);
        window.alert(Error.message);
        return;
    }

    animForm();
}

function checkInputNew() {

    try {
        
        if (!nameNew.value) {
            nameNew.focus();
            throw new Error('Preencha o campo de Usuario.');
        } else if (!passNew.value) {
            passNew.focus();
            throw new Error('Preencha o campo de Senha.');
        }

    } catch (Error) {
        console.error(Error.message);
        window.alert(Error.message);
        return;
    }    

    formChangeU.submit();
}

function animForm() {
    bodyForm.style.overflowY = 'hidden';
    formChangeU.style.animation = 'animForm 2s linear';
    setTimeout(function () {
        oldU.style.zIndex = '-1';
        titulo.innerHTML = 'Novo login';
    }, 2000*0.75);
    
}

camposAtt.forEach(campoAtt => {
    campoAtt.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            btnAnim.click();
        }
    })
});

camposNew.forEach(campoNew => {
    campoNew.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            checkInputNew();
        }
    })
});


window.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        e.preventDefault();
    }
});