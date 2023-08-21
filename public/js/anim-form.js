let oldU = document.querySelector('#form__oldU');
let formChangeU = document.querySelector('#form_userVal');
let cmp_req = document.querySelector('#cmp_req');
let bodyForm = document.querySelector('body');
let titulo = document.querySelector('.formulario__titulo');


let btnAnim = document.querySelector('#btn__anim');
let camposAtt = document.querySelectorAll('.campo__att');
let nameAtt = camposAtt[0];
let passAtt = camposAtt[1];

function checkInputAtt(name, pass) {

    try {

        if (!nameAtt.value) {
            nameAtt.focus();
            throw new Error('Preencha o campo Usuario.');
        } else if (!passAtt.value) {
            passAtt.focus();
            throw new Error('Preencha o campo Senha.');
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

function animForm() {
    bodyForm.style.overflowY = 'hidden';
    formChangeU.style.animation = 'animForm 2s linear';

    setTimeout(function () {
        oldU.style.zIndex = '-1';
        titulo.innerHTML = 'Novo login';

    }, 2000 * 0.75);

    setTimeout(function () {

        cmp_req.style.animation = 'animReq .5s linear';

        setTimeout(function () {
            cmp_req.style.marginTop = '650px';
        }, 450);

    }, 2000 * 0.97);


}

camposAtt.forEach(campoAtt => {
    campoAtt.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            btnAnim.click();
        }
    })
});

window.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        e.preventDefault();
    }
});