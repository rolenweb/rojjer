<?php
namespace app\models;

use app\models\User;
use yii\base\Model;
use Yii;

/**
 * Password reset form
 */
class ChangePasswordForm extends Model
{
    public $password;
    public $password_repeat;
    public $curusername;

    /**
     * @var app\models\User
     */
    private $_user;

    public function __construct($curusername)
    {
        
        $this->_user = User::findByUsername($curusername);
        
        return $this->_user;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'required'],
            ['password_repeat', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>'The passwords do not match'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'password' => 'New Password',
            'password_repeat' => 'Re-Type New Password'
       
        ];
    }
    /**
     * Resets password.
     *
     * @return boolean if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        
        return $user->save(false);
    }
}
