<?php
    namespace Calc;
    class Factorization {
        public $arr = [];
        public $steps = [];
        public function getMultipliers ($num) {
            $this->steps[] = $num;
            for ($i = 2; $i <= (int) sqrt($num); $i++) {
                while ($num % $i === 0) {
                    $this->arr[] = $i;
                    $num = $num / $i;
                    $this->steps[] = $num;
                }
            }
            if ($num !== 1) {
                $this->arr[] = $num;
            }
        }
    }