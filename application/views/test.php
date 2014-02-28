<?php


$count = 0;
foreach ($list as $r) {
        $ids[] = $r['institute_type'];
        $count++;
    }
    echo $count;

for ($i = 0; $i < $count; $i++) {
                   echo $id = $ids[$i];
                    
}
/*
$c = 0;
foreach ($list as $l){
    $ids[] = $l['INSTITUTE_NAME'];
}
for($i = 0; $i < $c; $i++){
    $id = $ids[$i];
    echo $id;
}*/
?>
