$(document).ready(function(){
    let filter_items = $('div.filter-items');
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 50000,
        values: [ 2000, 30000 ],
        slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );

            filter_items.each(function(index, element){
                if( parseInt($(element).attr('data-price')) >= parseInt(ui.values[ 0 ]) && parseInt($(element).attr('data-price')) <= parseInt(ui.values[ 1 ]) ){
                    $(element).show("slow");
                } else {
                    $(element).hide("slow");
                }
            });
        }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +" - $" + $( "#slider-range" ).slider( "values", 1 ) );
});