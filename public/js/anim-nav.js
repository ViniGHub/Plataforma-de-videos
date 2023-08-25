let cabec = document.querySelector('#cabec');
cabec.style.height = '80px';
let video_con = document.querySelector('.videos__container');

let scrollV = window.scrollY;

window.onscroll = () => {
    if (window.scrollY > scrollV) {
        scrollV = window.scrollY;
        cabec.style.height = '0px';
    } else {
        scrollV = window.scrollY;
        cabec.style.height = '80px';
    }

}