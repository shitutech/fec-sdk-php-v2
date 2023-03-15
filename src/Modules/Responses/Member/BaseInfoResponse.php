<?php

namespace Shitutech\Fes\Modules\Responses\Member;

use Shitutech\Fes\Modules\Base\BaseResponse;

class BaseInfoResponse extends BaseResponse
{
    /**
     * @var string 姓名 (张三)
     */
    protected $name = '';

    /**
     * @var string 身份证号 （430422XXXX)
     */
    protected $idCard = '';

    /**
     * @var string 开户行编号 （ payPass不为空且绑定过银行卡返回）
     */
    protected $bankNo = '';

    /**
     * @var string 开户行 （payPass不为空且绑定过银行卡返回）
     */
    protected $bankName = '';

    /**
     * @var string 卡号 （payPass不为空且绑定过银行卡返回）
     */
    protected $cardNo = '';

    /**
     * @var string 银行预留手机号 （payPass不为空且绑定过银行卡返回）
     */
    protected $bankPhone = '';

    /**
     * @var string 系统会员ID
     */
    protected $systemId = '';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getIdCard(): string
    {
        return $this->idCard;
    }

    /**
     * @return string
     */
    public function getBankNo(): string
    {
        return $this->bankNo;
    }

    /**
     * @return string
     */
    public function getBankName(): string
    {
        return $this->bankName;
    }

    /**
     * @return string
     */
    public function getCardNo(): string
    {
        return $this->cardNo;
    }

    /**
     * @return string
     */
    public function getBankPhone(): string
    {
        return $this->bankPhone;
    }

    /**
     * @return string
     */
    public function getSystemId(): string
    {
        return $this->systemId;
    }
    
}