(function ( $ ) {

    $.fn.hidder = function(options) {
        var settings = $.extend({
        }, options );

        var _this = $(this);
        var targetStyle = {'width': '90%', 'float' : 'left'};
        var btnStyle = {'float' : 'right'};
        $(this).wrap('<div class="hidder-container" style="width:100%; display:inline-block"></div>');
        $(this).css(targetStyle);
        $(this).after('<span class="hidden-traget"></span>');
        $(this).parent().find('.hidden-traget').css(targetStyle);
        $(this).after('<button class="btn btn-sm btn-primary hidder-action" style="margin-top:-7px"><i class="fa fa-eye"></i></button>');
        var text = $(this).html();
        for (var i = 0; i < text.length; i++) {
            $('.hidder-container .hidden-traget').append('<i class="fa fa-circle" style="font-size:5pt; margin:0 1px 0 0;"></i>');
        }
        $(this).hide();
        $('.hidder-container .hidden-traget');

        $('.hidder-container button').bind('click', function(){
            if($(_this).is(":visible")){
                $(_this).hide();
                $('.hidder-container .hidden-traget').show();
            }else{
                $(_this).show();
                $('.hidder-container .hidden-traget').hide();
            }
        });
    };

}( jQuery ));
