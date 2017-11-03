/* 
 * set the backgound color for the selected tag, remove any other selected tag
 */


(function ( $ ) {
    
    $.fn.selectedTag = function(options){
        $("<style type='text/css'> .selectedTag{ background: #154b58 !important;} </style>").appendTo("head");
        var settings = $.extend({
        }, options );
        
        if(!settings.container){
            console.error('you have to specify a container');
            return;
        }
        
        $(this).on('click', function(event) {
            $(settings.container).find('.selectedTag').removeClass('selectedTag');
            $(this).addClass('selectedTag');
        });
    }

}( jQuery ));
