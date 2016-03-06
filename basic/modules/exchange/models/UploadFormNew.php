<?php
namespace app\modules\exchange\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\Json;
use app\modules\exchange\models\Files;
use app\modules\exchange\models\Cv;

class UploadFormNew extends Model
{
    const RUNTIME_FOLDER = 'runtime';
    const FOLDER_FILE = 'files';

    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, docx, doc, xls, xlsx, odt, pdf, txt, tiff, ai, psd'],
        ];
    }
    
    public function upload($id,$type = NULL, $link = NULL)
    {

        if ($this->validate()) { 

            //foreach ($this->imageFiles as $file) {

                $file = $this->imageFiles;

                $path_from = $this->pathFrom($file);
                
                $file->saveAs($path_from);
                
                $file_id = $this->saveFileTable($file,$path_from);

                $path_to = $this->pathTo($file,$id,$file_id);

                $this->copyFile($file,$path_from,$path_to);

                if ($type == 'cv') {
                    $this->saveFileCVTable($id, $file_id);    
                }
                
                

                

                $this->deleteFile($path_from);

            //}
            return true;
        } else {
            return $this->errors;
        }
    }

    public function saveFileTable($file,$path_from)
    {
        if (file_exists($path_from)) {
            $new_file = new Files();
            $new_file->name = $file->baseName;
            $new_file->mimetype = mime_content_type($path_from);
            $new_file->size = filesize($path_from);
            $new_file->md5 = md5_file($path_from);
            if ($new_file->save()) {
                return $new_file->id;
                
            }
            else{
               // Yii::$app->session->setFlash('error', 'The file is not created.<br>');
               // return $this->redirect(Yii::$app->request->referrer);
            }
        }


    }

    public function copyFile($file,$path_from,$path_to)
    {
        if (file_exists($path_from)) {
            if (copy($path_from, $path_to)){
                                                        
            }
            else{
                Yii::$app->session->setFlash('error', 'The file is not copied.');
            }  
        }
    }

    public function pathFrom($file)
    {
        return self::RUNTIME_FOLDER.'/' . $file->baseName . '.' . $file->extension;
    }

    public function pathTo($file,$id,$file_id)
    {
        if (file_exists(Yii::$app->basePath.'/'.self::FOLDER_FILE.'/'.substr(dechex($id), 0,1)) === false) {
            if (mkdir(Yii::$app->basePath.'/'.self::FOLDER_FILE.'/'.substr(dechex($id), 0,1)) === false) {
                Yii::$app->session->setFlash('error', 'The folder is not created.<br>');
            }
        }
        return Yii::$app->basePath.'/'.self::FOLDER_FILE.'/'.substr(dechex($id), 0,1).'/' . $file_id;
    }

    public function saveFileCVTable($id, $file_id = NULL)
    {
        if ($file_id != NULL) {
            $new = new CV();
            $new->profile_id = $id;
            $new->file_id = $file_id;
            if ($new->save()) {
                
            }
            
        }
        
    }

    public function deleteFile($path)
    {
        return unlink($path);
    }
    

    public function datetime()
    {
        return date("Y-m-d H:i:s");
    }
    
}
?>