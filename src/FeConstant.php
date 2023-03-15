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

    // busType 业务类型 1:委托代征;2:个体户注册(分包);3:自然人代开;4:临时税务登记
    const BUS_TYPE_ENTRUST = '1';
    const BUS_TYPE_INDIVIDUAL = '2';
    const BUS_TYPE_PERSON = '3';
    const BUS_TYPE_TEMPORARY = '4';

    const BUS_TYPE_NAME = [
        self::BUS_TYPE_ENTRUST => '委托代征',
        self::BUS_TYPE_INDIVIDUAL => '个体户注册(分包)',
        self::BUS_TYPE_PERSON => '自然人代开',
        self::BUS_TYPE_TEMPORARY => '临时税务登记',
    ];

    const STATUS_CODE_SUCCESS = '1000';
    const STATUS_CODE_PROCESSING = '1001';
    const STATUS_CODE_FAILURE = '1002';

    const STATUS_CODE_NAME = [
        self::STATUS_CODE_SUCCESS => '成功',
        self::STATUS_CODE_PROCESSING => '处理中',
        self::STATUS_CODE_FAILURE => '处理失败',
    ];
}