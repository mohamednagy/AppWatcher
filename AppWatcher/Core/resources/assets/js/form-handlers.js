$(document).ready(function(){
    $('button[form-id]').click(function(){
        var form_id = $(this).attr('form-id');
        $('form#'+form_id).submit();
    });
});
