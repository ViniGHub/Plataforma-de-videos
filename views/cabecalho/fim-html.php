<script>
    let load = document.querySelector('#load__page');
    let body = document.querySelector('body');

    const delay = ms => new Promise(res => setTimeout(res, ms));
    window.addEventListener('load', async() => {
        await delay(500);
        load.style.display = 'none';
        body.style.overflow = 'visible';

    });
</script>
</body>

</html>