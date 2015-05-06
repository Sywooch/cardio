<?php

namespace app\models;

use app\modules\admin\models\Users;

class UserIdentity extends Users implements \yii\web\IdentityInterface
{
    public $id;
    public $authKey;
    public $users;
    public $naam;
    public $password;
    public $rights;
    public $accessToken;

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        $conditions = array(
            'id' => $id,
            'disabled' => 0
        );
        $user = Users::find()->where($conditions)->one();
        return new static ($user);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by naam
     *
     * @param  string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $conditions = array(
            'naam' => $username,
            'disabled' => 0
        );
        $user = Users::find()->where($conditions)->one();
        return new static ($user);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
