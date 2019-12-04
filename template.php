<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
</head>
<body>

<?php
$arr = ['Alex', 'Bill', 'Carl', 'Darren'];
?>

<table>
    <tbody>
    <?php
    for($i = 0; $i < count($arr); $i++){
        echo "<tr>
            <td>user name: </td>
            <td>{$arr[$i]}</td>
        </tr>";
    }
    ?>
    </tbody>
</table>

</body>
</html>