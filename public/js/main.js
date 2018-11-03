$(init);

function init(){
    $('.open-reply').on('click', openReply);
    $('.filter-role').on('click', toggleRole);
    $('.filter-hero').on('change', filter);
    $('.filter-map').on('change', filter);
    $('.filter-form').on('submit', filter);

    $('.rating-store .rating-star-container').on('mouseenter mouseleave', function(e){
        var index = this.dataset.index;
        $(this).parent().find(".rating-star-container").slice(0, index).find("img:nth-child(2)").toggleClass('d-none');
    });
    $('.rating-store .rating-star-container').click('click', function(e){
        var form = $(this).closest('form');
        form.find('input[name=rating]').val(this.dataset.index);
        form.submit();
    });
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

    $('input:not([type=hidden], [type=submit]), select', $(e.currentTarget).closest('form')).each(function(i) {
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