<?php


define('LOOP',10000);
function f1() {
    ob_start();
    for($i=0; $i<LOOP; ++$i) {
        $table = '$tableName' . $i;
        $sqlWhere = '$sqlWhere' . $i;
        $t = 'DELETE FROM `' . $table . '` ' . "\n" . ' WHERE ' . $sqlWhere;
        echo $t;
    }
    ob_end_clean();
}

function f2() {
    ob_start();
    for($i=0; $i<LOOP; ++$i) {
        $table = '$tableName' . $i;
        $sqlWhere = '$sqlWhere' . $i;
        $t = "DELETE FROM `{$table}` \n  WHERE {$sqlWhere}";
        echo $t;
    }
    ob_end_clean();
}

$t1Total = 0;
$t2Total = 0;

for($i = 0; $i < 100; $i++) {
    $start = microtime(true);
    f1();
    $stop = microtime(true);
    $time1 = $stop - $start;

    $start = microtime(true);
    f2();
    $stop = microtime(true);
    $time2 = $stop - $start;

    $t1Total += $time1;
    $t2Total += $time2;
}


echo $t1Total . "\t";
echo $t2Total . "\n";

// 1.773045539856	1.731249332428
