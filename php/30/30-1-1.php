<?php
//引用資料庫連線
require_once('../28/28-1-1.php');
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
    $sql = "SELECT `studentId`, `studentName`, `studentGender`, `studentBirthday`, `studentPhoneNumber`";
    $sql.= "FROM `students` ";
    $sql.= "ORDER BY `id` ASC";
    $pdo_stmt = $pdo->prepare($sql);
    $pdo_stmt->execute();
    if($pdo_stmt->rowCount() > 1) {
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
</table>
</form>
</body>
</html>