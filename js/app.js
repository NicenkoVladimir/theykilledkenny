function getSearch(elem, website) {
    if (event.keyCode == 13) {
        var promise = new Promise((resolve, reject) => {
            var request = new XMLHttpRequest();
            request.open("GET", "http://google.com/search?q=site:" + website + " " + elem.value, true);
            request.addEventListener("load", () => {
                if (request.status < 400) {
                    resolve(request.response);
                }
                else {
                    reject(new Error("Request failed: " + request.statusText));
                }
            });
            request.send();
        });
        promise.then((response) => {
            var search_results = document.getElementById('search_results');
            search_results.append(response);
            console.log(response);
        })
    }
}



// home.php profile.php

function changeButtonSize(item) {

    if (item.style.width == '100%') {
        item.style.width = '50%';
    } else {
        item.style.width = '100%';
    }
}

function showText(item) {
    var div = item.children[1]
    div.style.display = 'inline-block';
}

function hideText(item) {
    var div = item.children[1]
    div.style.display = 'none';
}