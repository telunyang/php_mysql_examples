<?php
require_once('./checkAdmin.php'); //引入登入判斷
require_once('../db.inc.php'); //引用資料庫連線
?>
<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <style>
    .border {
        border: 1px solid;
    }
    </style>
    
</head>
<body>
<?php require_once('./templates/title.php'); ?>
<hr />
<h3>評論頁面</h3>

<div class="container"">

<?php
if(isset($_GET['itemId'])){

    //SQL 敘述
    $sql = "SELECT `id`, `name`,`content`, `rating`, `itemId`, `created_at`, `updated_at`
            FROM `comments`
            WHERE `itemId` = ? AND `parentId` = 0
            ORDER BY `created_at` DESC ";

    //查詢分頁後的商品資料
    $stmt = $pdo->prepare($sql);
    $arrParam = [ $_GET['itemId'] ];
    $stmt->execute($arrParam); //

    //若商品項目個數大於 0，則列出商品
    if($stmt->rowCount() > 0) {
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for($i = 0; $i < count($arr); $i++) {
    ?>
        <form name="myForm" method="POST" action="./insertComments.php">
            <div class="row">
                <div class="media">
                    <img src="http://www.likoda.com.tw/style/images/frontpage/default_user_icon.png" class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0"><?php echo $arr[$i]["name"]; ?></h5>
                        <p><?php echo nl2br($arr[$i]["content"]); ?></p>
                        <p>評分: <?php echo $arr[$i]["rating"]; ?></p>
                        <p>新增時間: <?php echo $arr[$i]["created_at"]; ?></p>
                        <p>更新時間: <?php echo $arr[$i]["updated_at"]; ?></p>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
            <?php
            $sqlReply = "SELECT `id`, `name`,`content`, `rating`, `itemId`, `created_at`, `updated_at`
                        FROM `comments`
                        WHERE `itemId` = ? AND `parentId` = ?
                        ORDER BY `created_at` ASC ";
            //查詢分頁後的商品資料
            $stmtReply = $pdo->prepare($sqlReply);
            $arrReplyParam = [ 
                $_GET['itemId'],
                $arr[$i]["id"]
            ];
            $stmtReply->execute($arrReplyParam); //

            //若商品項目個數大於 0，則列出商品
            if($stmtReply->rowCount() > 0) {
                $arrReply = $stmtReply->fetchAll(PDO::FETCH_ASSOC);
                for($j = 0; $j < count($arrReply); $j++) {
            ?>
                <div class="row">
                    <div class="col-md-3"><?php echo $arrReply[$j]['name'] ?>表示</div>
                    <div class="col-md-9"><?php echo nl2br($arrReply[$j]['content']) ?></div>
                </div>
            <?php
                }
            } else {
                echo "管理員尚未回覆";
            }
            ?>
            </div>

            <div class="row">回覆：<?php echo $arr[$i]["name"]; ?></div>
            
            <div class="row">
                <label>姓名：</label><input type="text" id="name" name="name" value="管理員" />
            </div>
            <div class="row">
                <label>內容：</label><textarea name="content" rows="15" cols="100"></textarea>
            </div>
            <div class="row mb-5">
                <input type="submit" name="smb" value="送出">
            </div>
            <input type="hidden" name="parentId" value="<?php echo $arr[$i]["id"]; ?>">
            <input type="hidden" name="itemId" value="<?php echo $_GET['itemId']; ?>">
        </form>
    <?php
        }
    }
} 
?>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="./js/custom.js"></script>
</body>
</html>