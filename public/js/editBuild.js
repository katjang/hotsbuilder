$(init);

function init(){
    $('.talent').on('click', selectTalent);
    $('.talent_select').each(function(i,e){
        var id = e.value;
        console.log(id);
        $(".talent[data-id="+id+"]").addClass('selected');
    });

}


function selectTalent(e){
    var container = $(this).parent();
    $('.talent', container).removeClass('selected');
    $(this).addClass('selected');
    $('input', container).val(this.dataset.id);
}