<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>

    <!-- 引入 jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- 引入 lodash.js -->
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.15/lodash.min.js"></script>

    <script>
    $(document).ready(function() {
        //自訂樣版 01
        var templateFunc01 = _.template('Hello, <%= user %>!');
        var strContent01 = templateFunc01({'user': 'Darren'})
        $('div#content01').html(strContent01);

        //使用迴圈串接文字，再將文字放到元素中
        var arr = ['Alex','Bill','Carl','Darren'];
        var strContent02 = '';
        _.forEach(arr, function(name){
            strContent02+= name + '<br />';
        });
        $('div#content02').html(strContent02);
    });
    </script>
</head>
<body>
    <div id="content01"></div>
    <div id="content02"></div>
</body>
</html>