<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
    
    <!-- 引入 jQuery 的函式庫 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $(document).on('click', 'button#btn_fetch', function(){
            fetch('23-2-1.php', {
                method: 'POST',
                headers: {
                    'user-agent': 'Mozilla/4.0 MDN Example',
                    'content-type': 'application/json'
                },
                body: JSON.stringify({
                    'postMethod': 1
                })
            }).then(function(res) {
                return res.json();
            }).then((json) => {
                alert( JSON.stringify(json) );
                // alert(json);
            }).catch(function(err){
                alert(err);
            });
        });
    });
    </script>
</head>
<body>
    <button name="btn_fetch" id="btn_fetch">使用 Fetch 傳遞</button>
</body>
</html>