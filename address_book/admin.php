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
    </style>
</head>
<body>
這裡是後端管理頁面 - <a href="./logout.php?logout=1">登出</a>
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
                <th class="border">功能</th>
            </tr>
        </thead>
        <tbody>
        <?php
        //SQL 敘述
        $sql = "SELECT `id`, `studentId`, `studentName`, `studentGender`, `studentBirthday`, `studentPhoneNumber` 
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
                <td class="border" colspan="7">沒有資料</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="border" colspan="7">
                <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                    <a href="?page=<?= $i ?>"><?= $i ?></a>
                <?php } ?>
                </td>
            </tr>
            <tr>
            <td class="border" colspan="7"><input type="submit" name="smb" value="刪除"></td>
            </tr>
        </tfoo>
    </table>
</form>

<hr />

<form name="myForm" method="POST" action="./insert.php">
<table class="border">
    <thead>
        <tr>
            <th class="border">學號</th>
            <th class="border">姓名</th>
            <th class="border">性別</th>
            <th class="border">生日</th>
            <th class="border">手機號碼</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border">
                <input type="text" name="studentId" id="studentId" value="" maxlength="9" />
            </td>
            <td class="border">
                <input type="text" name="studentName" id="studentName" value="" maxlength="10" />
            </td>
            <td class="border">
                <select name="studentGender" id="studentGender">
                    <option value="男" selected>男</option>
                    <option value="女">女</option>
                </select>
            </td>
            <td class="border">
                <input type="text" name="studentBirthday" id="studentBirthday" value="" maxlength="10" />
            </td>
            <td class="border">
                <input type="text" name="studentPhoneNumber" id="studentPhoneNumber" value="" maxlength="10" />
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td class="border" colspan="5"><input type="submit" name="smb" value="新增"></td>
        </tr>
    </tfoot>
</table>
</form>
</body>
</html>