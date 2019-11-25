<?php
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

<form name="myForm" method="POST" action="31-2-1.php">
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
    $sql = "SELECT `id`, `studentId`, `studentName`, `studentGender`, `studentBirthday`, `studentPhoneNumber` ";
    $sql.= "FROM `students` ";
    $sql.= "ORDER BY `id` ASC ";
    $sql.= "LIMIT %s, %s ";
    $sql = sprintf($sql, ($page - 1) * $numPerPage, $numPerPage);

    //查詢
    $pdo_stmt = $pdo->query($sql);

    //整理 primary key
    $strPk = '';

    if($total > 1) {
        while($row = $pdo_stmt->fetch()) {
            if($strPk === '') $strPk = $row['id']; else $strPk.=",".$row['id'];
    ?>
        <tr>
            <td class="border">
                <input type="text" name="studentId_<?php echo $row['id']; ?>" value="<?php echo $row['studentId']; ?>" maxlength="9" />
            </td>
            <td class="border">
                <input type="text" name="studentName_<?php echo $row['id']; ?>" value="<?php echo $row['studentName']; ?>" maxlength="10" />
            </td>
            <td class="border">
                <select name="studentGender_<?php echo $row['id']; ?>">
                    <option value="<?php echo $row['studentGender']; ?>" selected><?php echo $row['studentGender']; ?></option>
                    <option value="男">男</option>
                    <option value="女">女</option>
                </select>

            </td>
            <td class="border">
                <input type="text" name="studentBirthday_<?php echo $row['id']; ?>" value="<?php echo $row['studentBirthday']; ?>" maxlength="10" />
            </td>
            <td class="border">
                <input type="text" name="studentPhoneNumber_<?php echo $row['id']; ?>" value="<?php echo $row['studentPhoneNumber']; ?>" maxlength="10" />
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
        <tr>
        <td class="border" colspan="5"><input type="submit" name="smb" value="修改"></td>
        </tr>
    </tfoo>
</table>
<input type="hidden" name="pk" value="<?php echo $strPk; ?>">
</form>
</body>
</html>