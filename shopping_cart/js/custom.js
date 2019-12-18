$(document).ready(function(){
    //商品一覽
    let filter_items = $('div.filter-items');
    $( "#slider-range" ).slider({
        range: true,
        min: 100,
        max: 30000,
        values: [ 100, 3000 ],
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

    //將商品預覽圖連結，設定成主要圖片的連結
    $(document).on("click", "img.item-preview", function(){
        let img = $(this);
        $("img.item-view").attr("src", img.attr("src"));
    });

    //加入購物車
    $(document).on("click", "button#btn_addCart", function(e){
        $.ajax({
            method: "POST",
            url: "./addCart.php",
            dataType: "json",
            data: { 
                itemId: $("input#itemId[type='hidden']").val(), 
                cartQty: $("input#cartQty").val()
            }
        })
        .done(function( json ) {
            alert(json.info);
        })
        .fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });;
    });
});