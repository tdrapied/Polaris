'use strict';

class Tenor {

    constructor() {
        this.key = 'LIVDSRZULELA';
        this.limit = 10;
    }

    __getUrl(term) {
        return `https://api.tenor.com/v1/search?q=${term}&limit=${this.limit}&key=${this.key}`;
    }

    httpGetAsync(url, call) {
        const xmlHttp = new XMLHttpRequest();

        xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                call(xmlHttp.responseText);
            }
        }

        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);

        return;
    }

    search(term) {
        this.httpGetAsync(this.__getUrl(term), function(res) {

            const json = JSON.parse(res);

            const container = document.querySelector('#container-image');
            container.innerHTML = ''; // On clear la div

            json.results.forEach(data => {

                const img = document.createElement('img');
                // Quand on clique sur l'image
                img.onclick = function() {
                    document.querySelector('#image_url').value = this.src;
                    $('#modal').modal('hide');
                    document.querySelector('#btnPreview').click();
                }
                img.src = data.media[0].gif.url;
                img.alt = data.title;

                container.appendChild(img);

            });

        });
    }

}
