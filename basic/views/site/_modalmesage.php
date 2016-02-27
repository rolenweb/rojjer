<?php
use yii\helpers\Html;

?>

<?php if (Yii::$app->session->hasFlash('info')){ ?>

          
          <!-- Modal -->
          <div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header-info">
                  
                  
                </div>
                <div class="modal-body text-center">
                  <div class="row">
                    <?= Yii::$app->getSession()->getFlash('info') ?>
                  </div>
                  
                </div>
                <div class="modal-footer-info text-center">
                    
                    <?= Html::a('Close', ['#'], ['class' => 'btn btn-group btn-default btn-sm', 'data-dismiss' => 'modal']) ?>
                </div>
              </div>
            </div>
          </div>
        <?php
         }

         if (Yii::$app->session->hasFlash('error')){ ?>

          
          <!-- Modal -->
          <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header-info">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                  
                </div>
                <div class="modal-body text-center">
                  <div class="row">
                    <div class="alert alert-danger"><?= Yii::$app->getSession()->getFlash('error') ?></div>
                  </div>
                  
                </div>
                <div class="modal-footer-info">
                  
                  
                </div>
              </div>
            </div>
          </div>
        <?php
         }

 
        ?>