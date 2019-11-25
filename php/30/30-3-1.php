<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//引用資料庫連線
require_once('../28/28-1-1.php');

//SQL 敘述
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

<form name="myForm" method="POST" action="29-3-1.php">
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
    <?php
    //SQL 敘述
    $sql = "SELECT `studentId`, `studentName`, `studentGender`, `studentBirthday`, `studentPhoneNumber` ";
    $sql.= "FROM `students` ";
    $sql.= "ORDER BY `id` ASC ";
    $sql.= "LIMIT %s, %s ";
    $sql = sprintf($sql, ($page - 1) * $numPerPage, $numPerPage);

    //查詢
    $pdo_stmt = $pdo->query($sql);

    if($total > 1) {
        while($row = $pdo_stmt->fetch()) {
    ?>
        <tr>
            <td class="border">
                <?php echo $row['studentId']; ?>
            </td>
            <td class="border">
                <?php echo $row['studentName']; ?>
            </td>
            <td class="border">
                <?php echo $row['studentGender']; ?>
            </td>
            <td class="border">
                <?php echo $row['studentBirthday']; ?>
            </td>
            <td class="border">
                <?php echo $row['studentPhoneNumber']; ?>
            </td>
        </tr>
    <?php
        }
    } else {
    ?>
        <tr>
            <td colspan="5">沒有資料</td>
        </tr>
    <?php
    }
    ?>
    </tbody>
    <tfoot>
        <tr>
            <td class="border" colspan="5">
            <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                <a href="?page=<?=$i?>"><?= $i ?></a>
            <?php } ?>
            </td>
        </tr>
    </tfoo>
</table>
</form>
</body>
</html>