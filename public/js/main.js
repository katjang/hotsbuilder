$(init);

function init(){
    $('.open-reply').on('click', openReply);
    $('.filter-role').on('click', toggleRole);
    $('.filter-hero').on('change', filter);
    $('.filter-map').on('change', filter);
    $('.filter-form').on('submit', filter);
    setTimeout(function(){
        $('.flash-message').removeClass('show');
    }, 4000);
}
function openReply(e) {
    $('.reply-form', $(e.currentTarget).closest('.comment')).first().removeClass('d-none');
}

function toggleRole(e){
    var input = $('input[name='+e.currentTarget.dataset.role+']');
    input.val((input.val()==1?0:1));
    filter(e);
}

function filter(e){
    e.preventDefault();
    var string = '';
    var prefix = '';

    $('input[type=hidden]', $(e.currentTarget).closest('form')).each(function(i) {
        var $input = $(this);
        if ($input.val() == ('' || 0)){
            $input.attr('disabled', 'disabled');
        }else{
            string += $input.attr('name')+'&';
        }
    });

    $('input:not([type=hidden]), select', $(e.currentTarget).closest('form')).each(function(i) {
        var $input = $(this);
        if ($input.val() == ('' || 0)){
            $input.attr('disabled', 'disabled');
        }else{
            string += $input.attr('name') + '=' + $input.val()+'&';
        }
    });

    if(string != '') {
        prefix = '?';
        string = string.slice(0,-1);
    }

    window.location = $(e.currentTarget).closest('form').attr('action') + prefix + string;
}