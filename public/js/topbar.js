

function hide() {
    document.getElementById("topbar").style.top = "-15rem";
}

function show() {
    document.getElementById("topbar").style.top = "0rem"; 
}

var prevScrollpos = window.pageYOffset;

function topbar_home() {
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if(currentScrollPos < 100){
            hide();
        }else{
            if (prevScrollpos > currentScrollPos) {
                show();
            } else {
                hide();
            }
            prevScrollpos = currentScrollPos;
        }
    }
}

function topbar_default() {
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if(currentScrollPos < 100){
            show();
        }else{
            if (prevScrollpos > currentScrollPos) {
                show();
            } else {
                hide();
            }
            prevScrollpos = currentScrollPos;
        }
    }
}