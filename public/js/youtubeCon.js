const apiKey = 'AIzaSyCDqSp3Zs-EKrERV6cp8-pEeL-j-K1j5bA';
let resultYT = document.querySelector('#search__result');
let elVideos;

fetch(`https://youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=20&q=mario&safeSearch=none&type=video&videoType=any&key=${apiKey}`)
.then((result) => {
    return result.json();
})
.then((data) => {
    let videos = data.items;

    for (video of videos) {
        elVideos = document.createElement('a');
        elVideos.setAttribute('href', '/enviar-video?id=null&videoId=' +  video.id.videoId + '&videoTitle='+ video.snippet.title);
        elVideos.style.width = 'max-content'

        elVideos.innerHTML = video.snippet.title;
        resultYT.appendChild(elVideos);
    }
})