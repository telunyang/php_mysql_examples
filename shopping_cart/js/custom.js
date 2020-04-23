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
        let btn = $(this);
        $.ajax({
            method: "POST",
            url: "./addCart.php",
            dataType: "json",
            data: { 
                itemId: btn.attr('data-item-id'), 
                cartQty: $("input#cartQty").val()
            }
        })
        .done(function( json ) {
            alert(json.info);
            $('span#cartItemNum').text(json.cartItemNum);
        })
        .fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    });

    //加入購物車 (在商品追蹤頁面)
    $(document).on("click", "button#btn_addCartForItemTracking", function(e){
        let btn = $(this);
        $.ajax({
            method: "POST",
            url: "./addCart.php",
            dataType: "json",
            data: { 
                itemId: btn.attr('data-item-id'), 
                cartQty: 1
            }
        })
        .done(function( json ) {
            alert(json.info);
            $('span#cartItemNum').text(json.cartItemNum);
        })
        .fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    });

    //追蹤商品
    $(document).on("click", "button#btn_addItemTracking", function(){
        let btn = $(this);
        $.ajax({
            method: "POST",
            url: "./addItemTracking.php",
            dataType: "json",
            data: { 
                itemId: btn.attr('data-item-id')
            }
        })
        .done(function( json ) {
            alert(json.info);
        })
        .fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    });

    //送出評論
    $(document).on("click", "input#btn_insertComments", function(){
        $.ajax({
            method: "POST",
            url: "./insertComments.php",
            dataType: "json",
            data: { 
                name: $("input[name='name']").val(),
                itemId: $("input#itemId[type='hidden']").val(), 
                content: $("textarea[name='content']").val(), 
                rating: $("input[name='rating']").val()
            }
        })
        .done(function( json ) {
            alert(json.info);
            
            //動態新增評論元素
            $("div#comments").prepend(`
            <div class="row">
                <div class="media">
                    <img src="http://www.likoda.com.tw/style/images/frontpage/default_user_icon.png" class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0">${json.data.name}</h5>
                        <p>${json.data.content}</p>
                        <p>評分: ${json.data.rating}</p>
                        <p>新增時間: ${json.data.created_at}</p>
                        <p>更新時間: ${json.data.updated_at}</p>
                    </div>
                </div>
            </div>`);
        })
        .fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    });

    //評分
    $("div.rating")
    .rate({
        max_value: 5,
        step_size: 1
    })
    .on("change", function(ev, data){
        // console.log(data.from, data.to);
        $("input[name='rating']").val(data.to);
    });
});