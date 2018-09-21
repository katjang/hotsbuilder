require('./bootstrap');

window.addEventListener('load', init);

function init(){
    $('.talent').on('mouseenter mouseleave', toggleTooltip);
}

function toggleTooltip(e){
    $('.tooltip-description', this).toggleClass('visible');
}

