# 介绍

灵工 v2 API PHP SDK

JAVA SDK 请参考： https://github.com/shitutech/flexible-sdk-java-v2

# 使用方法

## 配置仓库

在项目的 ``composer.json`` 内新增仓库配置

```json
{
  "minimum-stability": "dev",
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/shitutech/fec-sdk-php-v2.git"
    }
  ]
}
```

执行安装：

```shell
composer.phar require shitutech/fes
```

## 使用

```php
use Shitutech\Fes\FeClientRequest;
use Shitutech\Fes\FeClientResponse;
use Shitutech\Fes\FeConfig;
use Shitutech\Fes\FeConstant;
use Shitutech\Fes\Modules\Requests\Member\BankListRequest;
use Shitutech\Fes\Modules\Responses\Member\BankListResponse;

FeConfig::getInstance()->setMerchantNo("A*****-******-*****")
    ->setProviderNo("")
    ->setProductNo("")
    ->setTaskCode("")
    ->setPrivateKey('');
    
try {
    $objReq = (new BankListRequest())->setPayPass(FeConstant::PAY_PASS_ZB);

    var_export($objReq->fetchBizData(false));
    echo PHP_EOL . PHP_EOL;

    $respData = (new FeClientRequest($objReq))->send();

    $objResp = (new FeClientResponse(new BankListResponse(), $respData))->fetchResult();

    /**
     * @var BankListResponse $objResp
     */
    //var_export($objResp->getBankList());

    foreach ($objResp->getBankList() as $objBank) {
        var_dump($objBank->getText().'::'.$objBank->getValue());
    }

} catch (\Throwable $e) {
    var_dump(['code' => $e->getCode(), 'msg' => $e->getMessage(), 'fLine' => $e->getFile() . ":" . $e->getLine(),]);
}

```

# 接口

| API          | 请求类                         | 响应类                          |
|--------------|-----------------------------|------------------------------|
| 会员注册接口       | RegisterRequest::class      | RegisterResponse::class      |
| 绑定/变更结算卡     | BankCardRequest::class      | BankCardResponse::class      |
| 会员基本信息查询接口   | BaseInfoRequest::class      | BaseInfoResponse::class      |
| 查询会员系统id     | SystemIdRequest::class      | SystemIdResponse::class      |
| 查询会员绑定的结算卡列表 | QueryBankCardRequest::class | QueryBankCardResponse::class |
| 查询通道支持的银行列表  | BankListRequest::class      | BankListResponse::class      |
| 订单支付接口       | OrderPayRequest::class      | OrderPayResponse::class      |
| 批次号订单查询接口    | OrderBatchRequest::class    | OrderBatchResponse::class    |
| 子订单查询接口      | OrderSubRequest::class      | OrderSubResponse::class      |
| 商户账户信息查询接口   | AccountInfoRequest::class   | AccountInfoResponse::class   |
| 商户账户列表查询接口   | AccountListRequest::class   | AccountListResponse::class   |
