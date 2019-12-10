<?php
//引入判斷是否登入機制
require_once('./checkSession.php');

//引用資料庫連線
require_once('./db.inc.php');

//SQL 敘述: 取得 students 資料表總筆數
$sqlTotal = "SELECT count(1) FROM `students`";

//取得總筆數
$total = $pdo->query($sqlTotal)->fetch(PDO::FETCH_NUM)[0];

//每頁幾筆
$numPerPage = 5;

// 總頁數
$totalPages = ceil($total/$numPerPage); 

//目前第幾頁
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

//若 page 小於 1，則回傳 1
$page = $page < 1 ? 1 : $page;
?>
<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
    <style>
    .border {
        border: 1px solid;
    }
    .w200px {
        width: 200px;
    }
    </style>
</head>
<body>
<?php require_once('./templates/title.php'); ?>
<hr />
<form name="myForm" method="POST" action="deleteIds.php">
    <table class="border">
        <thead>
            <tr>
                <th class="border">選擇</th>
                <th class="border">學號</th>
                <th class="border">姓名</th>
                <th class="border">性別</th>
                <th class="border">生日</th>
                <th class="border">手機號碼</th>
                <th class="border">個人描述</th>
                <th class="border">大頭貼</th>
                <th class="border">功能</th>
            </tr>
        </thead>
        <tbody>
        <?php
        //SQL 敘述
        $sql = "SELECT `id`, `studentId`, `studentName`, `studentGender`, `studentBirthday`, 
                        `studentPhoneNumber`, `studentDescription`, `studentImg`
                FROM `students` 
                ORDER BY `id` ASC 
                LIMIT ?, ? ";

        //設定繫結值
        $arrParam = [($page - 1) * $numPerPage, $numPerPage];

        //查詢分頁後的學生資料
        $stmt = $pdo->prepare($sql);
        $stmt->execute($arrParam);

        //資料數量大於 0，則列出所有資料
        if($stmt->rowCount() > 0) {
            $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
            for($i = 0; $i < count($arr); $i++) {
        ?>
            <tr>
                <td class="border">
                    <input type="checkbox" name="chk[]" value="<?php echo $arr[$i]['id']; ?>" />
                </td>
                <td class="border"><?php echo $arr[$i]['studentId']; ?></td>
                <td class="border"><?php echo $arr[$i]['studentName']; ?></td>
                <td class="border"><?php echo $arr[$i]['studentGender']; ?></td>
                <td class="border"><?php echo $arr[$i]['studentBirthday']; ?></td>
                <td class="border"><?php echo $arr[$i]['studentPhoneNumber']; ?></td>
                <td class="border"><?php echo nl2br($arr[$i]['studentDescription']); ?></td>
                <td class="border">
                <?php if($arr[$i]['studentImg'] !== NULL) { ?>
                    <img class="w200px" src="./files/<?php echo $arr[$i]['studentImg']; ?>">
                <?php } ?>
                </td>
                <td class="border">
                    <a href="./edit.php?editId=<?php echo $arr[$i]['id']; ?>">編輯</a>
                    <a href="./delete.php?deleteId=<?php echo $arr[$i]['id']; ?>">刪除</a>
                </td>
            </tr>
        <?php
            }
        } else {
        ?>
            <tr>
                <td class="border" colspan="9">沒有資料</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="border" colspan="9">
                <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                    <a href="?page=<?= $i ?>"><?= $i ?></a>
                <?php } ?>
                </td>
            </tr>
        </tfoot>
    </table>
    <input type="submit" name="smb" value="刪除">
</form>

</body>
</html>