const apiKey = 'AIzaSyC0gCBa2o4vs0Dw28S5QstV2rpBfZK79jE';
let resultYT = document.querySelector('#search__result');
let YTSearchBox = document.querySelector('#YTSearch__box');
YTSearchBox.style.width = '50px';
let YTSearch = document.querySelector('#YTSearch');

let errIsSet = false;

let aVideos, aVideosErr, imgVideos, pVideos;
aVideosErr = document.createElement('a');

function search(inp) {
    fetch(`https://youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=25&q=${inp.value}&safeSearch=none&type=video&videoType=any&key=`)
        .then((result) => {
            if (result.ok) {
                return result.json();
            }
            return false;
        })
        .then((data) => {
            if (data === false) {
                resultYT.style.display = 'flex';

                if (!errIsSet) {
                    aVideosErr = setResultErr();
                }

                aVideosErr.setAttribute('href', `https://www.youtube.com/results?search_query=${inp.value}&sp=EgIQAQ%253D%253D`);
                aVideosErr.innerHTML = "O sistema de pesquisa não está funcionando, clique AQUI para pesquisar \"" + inp.value + "\" diretamente no Youtube e trazer a URL do video desejado para a galeria.";

                resultYT.appendChild(aVideosErr);
                return;
            }
            let videos = data.items;
            console.log(data);

            for (video of videos) {
                aVideos = document.createElement('a');
                aVideos.setAttribute('href', `/enviar-video?id=null&videoId=${video.id.videoId}&videoTitle=${video.snippet.title}`);
                aVideos.style.width = 'max-content';
                aVideos.style.display = 'flex';
                aVideos.style.maxWidth = '100%';
                aVideos.style.marginTop = '20px';

                imgVideos = document.createElement('img');
                imgVideos.src = video.snippet.thumbnails.medium.url;
                imgVideos.alt = video.snippet.title;

                pVideos = document.createElement('p');
                pVideos.innerHTML = video.snippet.title;
                pVideos.style.alignSelf = 'flex-end';
                pVideos.style.textAlign = 'left';
                pVideos.style.margin = '0 0 10px 10px';
                pVideos.style.fontSize = '20px';
                pVideos.style.maxWidth = '75%';
                pVideos.style.overflowWrap = 'break-word';

                aVideos.appendChild(imgVideos);
                aVideos.appendChild(pVideos);
                resultYT.appendChild(aVideos);
            }

            aVideos = document.createElement('a');
            aVideos.setAttribute('href', `https://www.youtube.com/results?search_query=${inp.value}&sp=EgIQAQ%253D%253D`);
            aVideos.innerHTML = "Não encontrou o que gostaria? Clique AQUI para pesquisar \"" + inp.value + "\" diretamente no Youtube e trazer a URL do video desejado para a galeria.";
            aVideos.setAttribute('target', '_blank');
            aVideos.style.fontSize = '20px';
            aVideos.style.marginTop = '20px';
            aVideos.style.width = 'max-content';
            aVideos.style.display = 'flex';
            aVideos.style.maxWidth = '100%';

            resultYT.appendChild(aVideos);

            resultYT.style.display = 'flex';
            return;
        });
}

function setResultErr() {
    let el = document.createElement('a');
    el.setAttribute('target', '_blank');
    el.style.fontSize = '20px';
    el.style.marginTop = '20px';
    el.style.width = 'max-content';
    el.style.display = 'flex';
    el.style.maxWidth = '100%';

    errIsSet = true;

    return el;
}

function setResult(params) {

}

function ToggleSearch() {
    if (YTSearchBox.style.width === '50px') {
        YTSearchBox.style.width = '300px';
        return;
    }

    YTSearch.blur();
    YTSearchBox.style.width = '50px';
}
// https://www.youtube.com/results?search_query=test

YTSearch.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        search(YTSearch);
    }
});

function closeSearch() {
    resultYT.style.display = 'none';

}

function selectText(inp) {
    inp.select();
}