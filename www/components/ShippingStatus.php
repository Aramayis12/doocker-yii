<?php
// https://biz.shopmania.com/cp.help?topic=367

namespace app\components;

class ShippingStatus
{
    const AWAITING_ORDER = 'Ընդունված է';
    const ORDER_DISPATCHED = 'Ճանապարհին է';
    const ORDER_DELIVERED = 'Ստացված է';
    const ORDER_RETURNED = 'Վերադարձվել է';
    const ORDER_FAILED = 'Չեղարկվել է';

    function showConstantByName($name) {
      if($name == 'AWAITING_ORDER'){
        return  self::AWAITING_ORDER;
      } else if($name == 'ORDER_DISPATCHED'){
        return  self::ORDER_DISPATCHED;
      } else if($name == 'ORDER_DELIVERED'){
        return  self::ORDER_DELIVERED;
      } else if($name == 'ORDER_RETURNED'){
        return  self::ORDER_RETURNED;
      } else if($name == 'ORDER_FAILED'){
        return  self::ORDER_FAILED;
      } else {
        return '';
      }

    }
}
