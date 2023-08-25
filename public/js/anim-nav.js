let cabec = document.querySelector('#cabec');
cabec.style.height = '80px';
let video_con = document.querySelector('.videos__container');

let scrollV = window.scrollY;

let YTSearchbox = document.querySelector('#YTSearch__box') ?? null;
YTSearchbox.style.top = '80px';

window.onscroll = () => {
    if (window.scrollY > scrollV) {
        scrollV = window.scrollY;
        cabec.style.height = '0px';
        if (YTSearchbox !== null) {
            YTSearchbox.style.top = '0';
        }
    } else {
        scrollV = window.scrollY;
        cabec.style.height = '80px';
        if (YTSearchbox !== null) {
            YTSearchbox.style.top = '80px';
        }
    }

}