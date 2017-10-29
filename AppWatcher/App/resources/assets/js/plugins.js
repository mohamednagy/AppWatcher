(function ( $ ) {

    $.fn.hidder = function(options) {
        var settings = $.extend({
        }, options );

        $(this).addClass('hidder-traget');
        var targetStyle = {'width': '90%', 'float' : 'left'};
        var btnStyle = {'float' : 'right'};
        $(this).wrap('<div class="hidder-container" style="width:100%; display:inline-block"></div>');
        $(this).css(targetStyle);
        $(this).after('<span class="mask"></span>');
        $(this).parent().find('.mask').css(targetStyle);
        $(this).after('<button class="btn btn-sm btn-primary hidder-action" style="margin-top:-7px"><i class="fa fa-eye"></i></button>');
        var text = $(this).html();
        for (var i = 0; i < text.length; i++) {
            $(this).closest('.hidder-container').find('.mask').append('<i class="fa fa-circle" style="font-size:5pt; margin:0 1px 0 0;"></i>');
        }
        $(this).hide();

        $(this).parent().find('button').click(function(event){
            _this = $(this).parent().find('.hidder-traget');
            if($(_this).is(":visible")){
                $(_this).hide();
                $(_this).parent().find('.mask').show();
            }else{
                $(_this).show();
                $(_this).parent().find('.mask').hide();
            }
        });
    };

}( jQuery ));
