<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii;
use yii\web\NotFoundHttpException;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use app\models\User;
use app\modules\exchange\models\Alerts;
use app\modules\exchange\models\Orders4;


/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class OrdertimeController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {
        $Modelsorder = Orders4::find()->where(['>', 'status', -1])->all();
        foreach ($Modelsorder as $Modelorder) {
        	echo $Modelorder->srok."\n";
        	echo $Modelorder->id."\n";
        	echo strtotime($Modelorder->srok)." - ".time()."\n";
        	//die();
        	if(time() > strtotime($Modelorder->srok)){
        		if ($Modelorder->status < 4) {
        	//		echo "expired\n";
        			//echo date("U", $Modelorder->srok);
        			$Modelorder->status = -1;
        			$Modelorder->save();

        			//send email
                    $subject = 'The order id:'.$Modelorder->id.' is expired';
                    $body = $subject;
                    $modeluser = $this->findModeluser($Modelorder->id_user);
                    
                    $this->sendAletemail($subject, $body, $modeluser);
                    //send email

                    //create alert
                    $modelalerts = new Alerts();
                    $modelalerts->id_user = $Modelorder->id_user;
                    $modelalerts->id_order = $Modelorder->id;
                    $modelalerts->comment = 'The order is expired';
                    $modelalerts->status = 0;
                    $modelalerts->type = 0;
                    $modelalerts->save(false);
                    //create alert
        		}
        		if ($Modelorder->status == 4) {

        			//send email
	                    $subject = 'The order id:'.$Modelorder->id.' is expired';
	                    $body = $subject;
	                    $modeluser = $this->findModeluser($Modelorder->id_translater);
	                    
	                    $this->sendAletemail($subject, $body, $modeluser);
	                    //send email

	                    //create alert
	                    $modelalerts = new Alerts();
	                    $modelalerts->id_user = $Modelorder->id_translater;
	                    $modelalerts->id_order = $Modelorder->id;
	                    $modelalerts->comment = 'The order is expired';
	                    $modelalerts->status = 0;
	                    $modelalerts->type = 0;
	                    $modelalerts->save(false);
	                //create alert
        			
        			$Modelorder->status = 5;
        			$Modelorder->save();
        		}
        		
        	}
        	else{
        		if ($Modelorder->status == 4) {
	        		$ostatok = strtotime($Modelorder->srok) - time();
	        		echo 'Ostatok: '.$ostatok."\n";
	        		if ($ostatok < 86400) {
	        			//send email
	                    $subject = 'The order id:'.$Modelorder->id.' time will soon expire(24 hours)';
	                    $body = $subject;
	                    $modeluser = $this->findModeluser($Modelorder->id_translater);
	                    
	                    $this->sendAletemail($subject, $body, $modeluser);
	                    //send email

	                    //create alert
	                    $modelalerts = new Alerts();
	                    $modelalerts->id_user = $Modelorder->id_translater;
	                    $modelalerts->id_order = $Modelorder->id;
	                    $modelalerts->comment = 'The time of order will soon expire(24 hours)';
	                    $modelalerts->status = 0;
	                    $modelalerts->type = 0;
	                    $modelalerts->save(false);
	                    //create alert
	        		}
        		}
        	}
        	
        	
        	
        }
    }
    public function sendAletemail($subject, $body, $modeluser){
        return Yii::$app->mailer->compose('alertEmail', ['user' =>$modeluser, 'body' => $body])
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
            ->setTo($modeluser->email)
            ->setSubject($subject.' '.Yii::$app->name)
            ->send();
        
    }

    protected function findModeluser($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            
            throw new NotFoundHttpException('The requested user does not exist.');
        }
    }
}
