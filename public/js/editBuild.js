$(init);

function init(){
    $('.talent_select').each(function(i,e){
        var id = e.value;
        if(id) {
            $(".talent[data-id="+id+"]").addClass('selected');
        }
    });
    $('.selectedMaps input').each(function(i,e){
        var id = e.value;
        $(".map[data-id="+id+"]").addClass('selected');
    });
    $('.talent').on('click', selectTalent);

    $('.map').on('click', toggleMap);
}


function selectTalent(e){
    var container = $(this).parent();
    $('.talent', container).removeClass('selected');
    $(this).addClass('selected');
    $('input', container).val(this.dataset.id);
}

function toggleMap(e){

    $(this).toggleClass('selected');

    if($(this).hasClass('selected')){
        var $input = $('<input>').attr('type', 'hidden').attr('name', 'maps['+this.dataset.id+']').val(this.dataset.id);
        $('.selectedMaps').append($input);
    }else{
        $('input[name=maps\\['+this.dataset.id+'\\]]').remove();
    }
}