<?php
for($i = 0; $i < count($_POST['myColor']); $i++) {
    echo "您所選擇的白板筆顏色為: " . $_POST['myColor'][$i] . "<br />";
};