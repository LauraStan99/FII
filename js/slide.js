var index = 1;
show(index);

function incrementSlide(n) {
    show((index += n));
}

function curentSlide(n) {
    show((index = n));
}

function show(n) {
    var i;
    var slide = document.getElementsByClassName('poze-main');
    if (n > slide.length) {
    index = 1;
    }
    if (n < 1) {
    index = slide.length;
    }
    for (i = 0; i < slide.length; i++) {
    slide[i].style.display = 'none';
    }

    slide[index - 1].style.display = 'block';
}