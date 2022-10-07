
<?php

class Utility {


  static function getPlandByAmount($amount){
    if ($amount >1 && $amount<1000) {
        return ["plan"=>"BASIC","interest"=>5];
    }
    else if ($amount>=1000 && $amount<5000) {
        return ["plan"=>"PRO","interest"=>9];
    }else if ($amount>=5000 && $amount<10000) {
        return ["plan"=>"PREMIUM","interest"=>13];
    }else if ($amount>=10000) {
        return ["plan"=>"DELUXE","interest"=>20];
    }
    else{
        return ["plan"=>"BASIC","interest"=>5];
    }
    }

    static function getMiningPlandByAmount($amount){
        if ($amount >1 && $amount<3000) {
            return ["plan"=>"BASIC","interest"=>3];
        }
        else if ($amount>=3000 && $amount<5000) {
            return ["plan"=>"PRO","interest"=>7];
        }else if ($amount>=5000 && $amount<10000) {
            return ["plan"=>"PREMIUM","interest"=>11];
        }else if ($amount>10000) {
            return ["plan"=>"DELUXE","interest"=>15];
        }
        else{
            return ["plan"=>"BASIC","interest"=>3];
        }
        }
}

?>