'use strict';

class Tenor {

    constructor() {
        this.key = 'LIVDSRZULELA';
        this.limit = 10;
        this.nbRow = 2;
    }

    __getUrl(term) {
        return `https://api.tenor.com/v1/search?q=${term}&limit=${this.limit}&key=${this.key}`;
    }

    getTenorResult(url) {
        return new Promise((res) => {
            const xmlHttp = new XMLHttpRequest();

            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    res(xmlHttp.responseText);
                }
            }

            xmlHttp.open("GET", url, true);
            xmlHttp.send(null);

            return;
        });
    }

    getElementImage(item) {
        const img = document.createElement('img');
        // Quand on clique sur l'image
        img.onclick = function() {
            document.querySelector('#image_url').value = item.media[0].gif.url;
            $('#modal').modal('hide'); // ferme le modal
            document.querySelector('#btnPreview').click(); // active le btn preview
        }
        img.src = item.media[0].tinygif.url;
        img.alt = item.title;

        return img;
        //container.appendChild(img);
    }

    getRow() {
        const row = document.createElement('div');
        row.className += "col-auto d-flex flex-column p-0 m-1";

        return row;
    }

    async search(term) {
        const result = await this.getTenorResult(this.__getUrl(term));

        const json = JSON.parse(result);
        const data = json.results;

        const container = document.querySelector('#container-image');
        container.innerHTML = ''; // On clear la div

        let key = 0;
        let maxItem = data.length / this.nbRow;
        for (let i = 0; i < this.nbRow; i++) {

            const row = this.getRow();

            for (key; key < maxItem; key++) {
                const item = data[key];
                row.appendChild(this.getElementImage(item));
            }

            container.appendChild(row);

            maxItem += maxItem;

        }

    }

}
