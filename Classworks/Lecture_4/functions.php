<?php
    function f1(){
        echo "<h1>Hello Dear Students!!!</h1>";
    }


    f1();
    f1();
    f1();

    function f2($x, $y, $z = 10){
        return $x+$y+$z; // 40
        return $x+$y-$z; // 20
        return $x-$y+$z; // 0
    }


    echo f2(10, 20);
?>