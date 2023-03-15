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
use Shitutech\Fec\ClientConfig;
use Shitutech\Fec\ClientRequest;
use Shitutech\Fec\ClientResponse;
use Shitutech\Fec\Constants;
use Shitutech\Fec\Models\Request\AccInfoRequest;
use Shitutech\Fec\Models\Response\AccInfoResponse;

FeConfig::getInstance()->setMerchantNo("A*****-******-*****")
    ->setProviderNo("")
    ->setProductNo("")
    ->setTaskCode("")
    ->setPrivateKey('');
    
try {
    $objAccInfo = new AccInfoRequest();
    $objAccInfo->setPayPass(Constants::PAY_PASS_ALIPAY);
    $objClientReq = new ClientRequest($objAccInfo);
    $respData = $objClientReq->send();

    $objClientResp = new ClientResponse(new AccInfoResponse(), $respData);

    /**
     * 这里声明的目的是为了 IDE (如 PhpStorm) 语法提示
     * @var AccInfoResponse $objResultResp
     */
    $objResultResp = $objClientResp->fetchResult();

    var_dump($objResultResp->getBalance());
} catch (Exception $e) {
    var_dump($e->getCode() . "::" . $e->getMessage());
}

```

# 接口

| API             | 请求类                            | 响应类                             |
|-----------------|--------------------------------|---------------------------------|
| 用户注册            | UserRegisterRequest::class     | UserRegisterResponse::class     |
| 用户信息查询          | UserQueryRequest::class        | UserQueryResponse::class        |
| 用户信息变更 - 注册手机号  | UserUpdatePhoneRequest::class  | UserUpdateResponse::class       |
| 用户信息变更 - 影像件    | UserUpdateImageRequest::class  | UserUpdateResponse::class       |
| 用户信息变更 - 拓展业务类型 | UserUpdateExpandRequest::class | UserUpdateResponse::class       |
| 用户信息变更 - 结算卡信息  | UserUpdateCardRequest::class   | UserUpdateResponse::class       |
| 用户账户开户          | UserOpenRequest::class         | UserOpenResponse::class         |
| 用户账户开户（活体认证）    | UserOpenVideoRequest::class    | UserOpenResponse::class         |
| 订单支付            | OrderPayRequest::class         | OrderPayResponse::class         |
| 批次订单号查询订单       | OrderQueryBatchRequest::class  | OrderQueryBatchResponse::class  |
| 子订单详情查询         | OrderQueryDetailRequest::class | OrderQueryDetailResponse::class |
| 商户信息查询          | AccInfoRequest::class          | AccInfoResponse::class          |
