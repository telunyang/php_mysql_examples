<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
    
    <!-- 引入 jQuery 的函式庫 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        //使用 GET 傳遞
        $(document).on('click', 'button#btn_get', function(){
            $.get("./23-1-1.php?getMethod=1", function( data ) {
                alert(JSON.stringify(data));
            });
        });

        //使用 POST 傳遞
        $(document).on('click', 'button#btn_post', function(){
            $.post("23-1-1.php", { postMethod: "1" } )
            .done(function(data){
                alert(JSON.stringify(data));
            });
        });

        //使用 Ajax 傳遞
        $(document).on('click', 'button#btn_ajax', function(){
            $.ajax({
                method: 'POST', // GET
                url: "23-1-1.php", // 23-1-1.php?getMethod=1
                data: {
                    postMethod: "1"
                }
            }).done(function(data) {
                alert(JSON.stringify(data));
            });
        });
    });
    </script>
</head>
<body>
    <button name="btn_get" id="btn_get">使用 GET 傳遞</button>
    <br />
    <button name="btn_post" id="btn_post">使用 POST 傳遞</button>
    <br />
    <button name="btn_ajax" id="btn_ajax">使用 Ajax 傳遞</button>
</body>
</html>