<?php

    /**
     * Class Character
     */
    Class Character
    {
        /**
         * @var
         */
        private $name;
        private $hit_point;
        private $attack_point;

        /**
         * Character constructor.
         * @param $name
         * @param $hit_point
         * @param $attack_point
         */
        public function __construct($name, $hit_point, $attack_point)
        {
            $this->setName($name);
            $this->setHitPoint($hit_point);
            $this->setAttackPoint($attack_point);
        }

        /**
         * @return string
         */
        public function display_status()
        {
            return $this->getName()."：HP".$this->getHitPoint()." 攻撃力".$this->getAttackPoint()."\n";
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name): void
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getHitPoint()
        {
            return $this->hit_point;
        }

        /**
         * @param mixed $hit_point
         */
        public function setHitPoint($hit_point): void
        {
            $this->hit_point = $hit_point;
        }

        /**
         * @return mixed
         */
        public function getAttackPoint()
        {
            return $this->attack_point;
        }

        /**
         * @param mixed $attack_point
         */
        public function setAttackPoint($attack_point): void
        {
            $this->attack_point = $attack_point;
        }
    }

    /**
     * Class Hero
     */
    Class Hero extends Character
    {
        /**
         * @param $receiver
         */
        public function attack($receiver)
        {
            $random = mt_rand(0, 9);
            switch ($random)
            {
                case 0:
                    echo $this->getName() ."の攻撃！クリティカルヒット！！"."に".($this->getAttackPoint() * 2)."のダメージ！\n";
                    $receiver->setHitpoint($receiver->getHitPoint() - ($this->getAttackPoint() * 2));
                    break;
                case 9:
                    echo $this->getName()."の攻撃！......ミス！".$receiver->getName()."にダメージを与えられなかった！\n";
                    break;
                default:
                    echo $this->getName()."の攻撃！".$receiver->getName()."に".$this->getAttackPoint()."のダメージ！\n";
                    $receiver->setHitPoint($receiver->getHitPoint() - $this->getAttackPoint());
            }
        }
    }

    /**
     * Class Satan
     */
    Class Satan extends Character
    {
        /**
         * @param $receiver
         */
        public function attack($receiver)
        {
            /** @var TYPE_NAME $random */
            $random = mt_rand(0, 9);
            switch ($random)
            {
                case 0:
                    echo
                        $this->getName() ."の攻撃！クリティカルヒット！！"."に".($this->getAttackPoint() * 2)."のダメージ！\n";
                    $receiver->setHitpoint($receiver->getHitPoint() - ($this->getAttackPoint() * 2));
                    break;
                case 9:
                    echo $this->getName()."の攻撃！......ミス！".$receiver->getName()."にダメージを与えられなかった！\n";
                    break;
                default:
                    echo $this->getName()."の攻撃！".$receiver->getName()."に".$this->getAttackPoint()."のダメージ！\n";
                    $receiver->setHitPoint($receiver->getHitPoint() - $this->getAttackPoint());
            }
        }
    }

    # キャラクターを設定
    $hero = new Hero("勇者", 30, 8);
    $satan = new Satan("魔王", 40, 12);

    echo "戦闘開始！\n";

    // 勇者と魔王がHPが0以下になるまで相互に攻撃し続ける
    while ($hero->getHitPoint() > 0 && $satan->getHitPoint() >0) {
        // ステータス表示
        echo "\n";
        echo $hero->display_status();
        echo $satan->display_status();

        echo "\n";

        // 勇者のターン
        $hero->attack($satan);
        if ($satan->getHitPoint() <= 0) {
            break;
        }

        // 魔王のターン
        $satan->attack($hero);
        if ($hero->getHitPoint() <= 0) {
            break;
        }
    }

    // 戦闘結果
    if ($hero->getHitPoint() > $satan->getHitPoint()) {
        echo "\n";
        echo "魔王は倒れた。\n";
        echo "世界に平和が訪れた。\n";
    } else {
        echo "\n";
        echo "おお 勇者!\n";
        echo "しんでしまうとは なさけない…。\n";
    }