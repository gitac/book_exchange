<?php
$c = 0;
foreach ($list as $l){
    $ids[] = $l['INSTITUTE_NAME'];
}
for($i = 0; $i < $c; $i++){
    $id = $ids[$i];
    echo $id;
}
?>
