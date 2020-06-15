<?php

    // 入力値の取得
    echo "素数かどうかを判定する値を入力してください\n";
    $check_number = intval(trim(fgets(STDIN)));

    if ($check_number < 1) {
        echo "1以下が入力されました\n";
    }

    // 素数判定
    $is_prime_number = true;

    # 検索する最大値
    $max_search = ceil(sqrt($check_number));

    if ($check_number <= 3) {
        $is_prime_number = true;
    } else {
        for($i = 2; $i <= $max_search; $i++) {
            if ($check_number % $i == 0) {
                $is_prime_number = false;
                break;
            }
        }
    }

    if ($is_prime_number) {
        echo "${check_number}は素数です\n";
    } else {
        echo "${check_number}は素数ではありません\n";
    }
