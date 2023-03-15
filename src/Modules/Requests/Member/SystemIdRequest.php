<?php

namespace Shitutech\Fes\Modules\Requests\Member;

class SystemIdRequest extends \Shitutech\Fes\Modules\Base\BaseRequest
{
    /**
     * @var string 3. 根据身份证号4.根据商户会员Id查询系统会员Id
     */
    protected $type = '';

    /**
     * @var string 身份证号（查询类型3必传;会员身份证号）
     */
    protected $idCard = '';

    /**
     * @var string 商户会员ID（查询类型4必传;v1.0用户注册接口返回）
     */
    protected $memberId = '';

    protected const IGNORE_EMPTY_PROPERTIES = ['idCard', 'memberId',];

    public function getApiPath(): string
    {
        return '/api/fec/v2/system/id';
    }

    /**
     * @param string $type
     * @return SystemIdRequest
     */
    public function setType(string $type): SystemIdRequest
    {
        $this->type = trim($type);
        return $this;
    }

    /**
     * @param string $idCard
     * @return SystemIdRequest
     */
    public function setIdCard(string $idCard): SystemIdRequest
    {
        $this->idCard = trim($idCard);
        return $this;
    }

    /**
     * @param string $memberId
     * @return SystemIdRequest
     */
    public function setMemberId(string $memberId): SystemIdRequest
    {
        $this->memberId = trim($memberId);
        return $this;
    }

}