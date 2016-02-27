<?php
namespace app\models;

use yii\base\InvalidParamException;
use yii\behaviors\TimestampBehavior;
use yii\base\Model;
use Yii;
use app\modules\exchange\models\Balance;

class EmailConfirmForm extends Model
{
    /**
     * @var User
     */
    private $_user;
 
    /**
     * Creates a form model given a token.
     *
     * @param  string $token
     * @param  array $config
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidParamException('Missing confirmation code.');
        }
        $this->_user = User::findByEmailConfirmToken($token);
        if (!$this->_user) {
            throw new InvalidParamException('Invalid token.');
        }
        parent::__construct($config);
    }
 
    /**
     * Resets password.
     *
     * @return boolean if password was reset.
     */
    public function confirmEmail()
    {
        $user = $this->_user;
        $user->status = User::STATUS_ACTIVE;
        $user->removeEmailConfirmToken();

        // create profile
        
            $modelprofile = new ProfileTranslate();
            $modelprofile->id_user = $user->id;
            
            $modelprofile->save();    
        
        // create profile 

        // create balance
            $modelbalance = new Balance();
            $modelbalance->id_user = $user->id;
            $modelbalance->save();
        // create balance

        return $user->save();
    }
}