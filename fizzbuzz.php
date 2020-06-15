<?php

    for($i = 1; $i <= 150; $i++) {
        if ($i >= 100) {
            echo $i."\n";
        } elseif ($i % 3 == 0 || mb_substr($i, -1) == 3) {
            echo sprintf("%02d!\n", $i);
        } else {
            echo sprintf("%03d\n", $i);
        }
    }