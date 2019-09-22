<?php
// https://biz.shopmania.com/cp.help?topic=367

namespace app\components;

class PayTypeStatus
{
    const CASH = 'Առձեռն';
    const IDRAM = 'իԴրամ';
    const TERMINAL = 'Տերմինալ';

    function showConstantByName($name) {
      if($name == 'CASH'){
        return  self::CASH;
      } else if($name == 'IDRAM'){
        return  self::IDRAM;
      } else if($name == 'TERMINAL'){
        return  self::TERMINAL;
      } else {
        return '';
      }

    }
}
