<?php

declare(strict_types=1);

namespace Pnz\MattermostClient\Model\AccessToken;

use Pnz\MattermostClient\Model\Model;

final class AccessToken extends Model
{
    /**
     * @return string
     */
    public function getId()
    {
        return $this->data['id'];
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->data['token'];
    }

    /**
     * @return string
     */
    public function getuserId()
    {
        return $this->data['user_id'];
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->data['description'];
    }

    /**
     * @return array
     */
    protected static function getFields()
    {
        return [
            'id',
            'token',
            'user_id',
            'description'
        ];
    }
}
