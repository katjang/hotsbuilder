$(init);

function init(){
    $('.open-reply').on('click', openReply);
}
function openReply(e) {
    $('.reply-form', $(e.currentTarget).closest('.comment')).first().removeClass('d-none');
}