<?php

    // 入力値の取得
    echo "最初はグー、じゃんけん...\n";
    echo "（グー 1, チョキ 2, パー 3）\n";

    while (true) {
        $input = intval(trim(fgets(STDIN)));
        echo "${input}\n";

        $your = new Human($input);
        echo "あなた：".$your->hand."\n";

        $input = mt_rand(1, 3);
        $opponent = new Human($input);
        echo "あいて：".$opponent->hand."\n";

        echo $your->rock_papaer_scissors($opponent->hand);

        if ($your->rock_papaer_scissors($opponent->hand) != "あいこで...") {
            break;
        }
    }

    /**
     * Class Human
     */
    class Human {

        /**
         * @var string
         */
        public $hand;

        /**
         * Human constructor.
         * @param $input
         */
        public function __construct($input) {
            switch ($input) {
                case 1:
                    $this->hand = "グー";
                    break;
                case 2:
                    $this->hand = "チョキ";
                    break;
                case 3:
                    $this->hand = "パー";
                    break;
            }
        }

        /**
         * @param $hand
         * @return string
         */
        public function rock_papaer_scissors($hand) {
            if ($this->hand == "グー" && $hand == "グー") {
                return "あいこで...";
            }
            if ($this->hand == "グー" && $hand == "チョキ") {
                return "「あなたの勝ちです」。";
            }
            if ($this->hand == "グー" && $hand == "パー") {
                return "「あなたの負けです」。";
            }
            if ($this->hand == "チョキ" && $hand == "グー") {
                return "「あなたの負けです」。";
            }
            if ($this->hand == "チョキ" && $hand == "チョキ") {
                return "あいこで...";
            }
            if ($this->hand == "チョキ" && $hand == "パー") {
                return "「あなたの勝ちです」。";
            }
            if ($this->hand == "パー" && $hand == "グー") {
                return "「あなたの勝ちです」。";
            }
            if ($this->hand == "パー" && $hand == "チョキ") {
                return "「あなたの負けです」。";
            }
            if ($this->hand == "パー" && $hand == "パー") {
                return "あいこで...";
            }
        }
    }
