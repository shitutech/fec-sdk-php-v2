<?php

namespace Shitutech\Fes\Modules\Requests\Member;

use Shitutech\Fes\Exceptions\FeException;
use Shitutech\Fes\FeConfig;
use Shitutech\Fes\Helpers\UtilHelper;
use Shitutech\Fes\Modules\Base\BaseRequest;

class RegisterRequest extends BaseRequest
{
    /**
     * @var string 服务商号
     */
    protected $providerNo = '';

    /**
     * @var string 姓名
     */
    protected $name = '';

    /**
     * @var string 身份证号
     */
    protected $idCard = '';

    /**
     * @var string 手机号
     */
    protected $phone = '';

    /**
     * @var string 份证正面 base64格式 Base64编码后的大小不超2M
     */
    protected $imgIdCardFront = '';

    /**
     * @var string 身份证正面 base64格式 Base64编码后的大小不超2M
     */
    protected $imgIdCardBack = '';

    /**
     * @var string 业务类型 1委托代征2.个体户注册(分包)3.自然人代开4.临时税务登记
     */
    protected $busType = '';

    /**
     * @var string 面部高清照，格式要求：Base64值；Base64编码后的大小不超2M
     */
    protected $imgFace = '';

    protected const IGNORE_EMPTY_PROPERTIES = ['imgFace',];

    public function __construct()
    {
        $this->providerNo = FeConfig::getInstance()->getProviderNo();
    }

    public function getApiPath(): string
    {
        return '/api/fec/v2/acct/register';
    }

    /**
     * @param string $name
     * @return RegisterRequest
     */
    public function setName(string $name): RegisterRequest
    {
        $this->name = trim($name);
        return $this;
    }

    /**
     * @param string $idCard
     * @return RegisterRequest
     * @throws FeException
     */
    public function setIdCard(string $idCard): RegisterRequest
    {
        $this->idCard = trim($idCard);

        UtilHelper::verifyIdCard($this->idCard);

        return $this;
    }

    /**
     * @param string $phone
     * @return RegisterRequest
     * @throws FeException
     */
    public function setPhone(string $phone): RegisterRequest
    {
        $this->phone = trim($phone);

        UtilHelper::verifyMobile($this->phone);

        return $this;
    }

    /**
     * @param string $imgIdCardFront
     * @return RegisterRequest
     */
    public function setImgIdCardFront(string $imgIdCardFront): RegisterRequest
    {
        $this->imgIdCardFront = trim($imgIdCardFront);
        return $this;
    }

    /**
     * @param string $imgIdCardBack
     * @return RegisterRequest
     */
    public function setImgIdCardBack(string $imgIdCardBack): RegisterRequest
    {
        $this->imgIdCardBack = trim($imgIdCardBack);
        return $this;
    }

    /**
     * @param string $busType
     * @return RegisterRequest
     */
    public function setBusType(string $busType): RegisterRequest
    {
        $this->busType = trim($busType);
        return $this;
    }

    /**
     * @param string $imgFace
     * @return RegisterRequest
     */
    public function setImgFace(string $imgFace): RegisterRequest
    {
        $this->imgFace = trim($imgFace);
        return $this;
    }

}