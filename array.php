<?php
// $arr = [];
// $arr = ['Alex','Bill','Carl','Darren'];

// for($i = 0; $i < count($arr); $i++){
//     echo $arr[$i]."<br />";
// }

$strTags = "glasses,hens,women,ccc";
$arrTags = explode(',', $strTags);
?>

<pre>
<?php
print_r($arrTags);
?>
</pre>
