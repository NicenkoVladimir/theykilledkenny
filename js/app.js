function getSearch(elem, site_name) {
    if (event.keyCode == 13) {
        var url = "https://www.google.com/search?q=site:" + site_name + " " + elem.value;
        const params = '';
        var newWn = window.open(url, "search results", params);
        // window.location.replace(url);
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