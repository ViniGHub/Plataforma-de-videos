let oldU = document.querySelector('#form__oldU');
let formChangeU = document.querySelector('#form_mudarLog');
let bodyForm = document.querySelector('body');
let titulo = document.querySelector('.formulario__titulo');
let campos = document.querySelectorAll('.campo__att');

function checkInput(name, pass) {
    try {
        campos.forEach(campo => {
        if (!campo.value) {
            throw new Error('Erro no formulario.')
        }
    });
    } catch (Error) {
        console.error(Error.message);
        window.alert('Preencha os formularios.');
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
    }, 2000*0.75);
    
}