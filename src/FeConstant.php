<?php

namespace Shitutech\Fes;

final class FeConstant
{
    // payPass 支付通道
    const PAY_PASS_ZB = '1';
    const PAY_PASS_ALIPAY = '2';
    const PAY_PASS_ZHAO_HANG = '4';
    const PAY_PASS_PING_AN = '5';
    const PAY_PASS_NAN_JING = '6';

    const PAY_PASS_NAME = [
        self::PAY_PASS_ZB => '众邦',
        self::PAY_PASS_ALIPAY => '支付宝',
        self::PAY_PASS_ZHAO_HANG => '招商银行',
        self::PAY_PASS_PING_AN => '平安银行',
        self::PAY_PASS_NAN_JING => '南京银行',
    ];
}