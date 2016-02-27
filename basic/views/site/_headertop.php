<?php
use yii\helpers\Html;

?>
<div class="header-top">
          <div class="container">
            <div class="row">
              <div class="col-xs-2 col-sm-6">
                <div class="header-top-first clearfix">
                  <ul class="social-links clearfix hidden-xs">
                    <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                    <li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                    <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                    <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                    
                  </ul>
                  <div class="social hidden-lg hidden-md hidden-sm">
                    <div class="btn-group dropdown">
                      <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-share-alt"></i></button>
                      <ul class="dropdown-menu">
                        <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                        
                        <li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                        <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                        
                        
                        <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                        
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-10 col-sm-6">
                <div class="clearfix">
                  <div class="header-top-dropdown">
                    
                    <div class="btn-group dropdown">
                      <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Login</button>
                      <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                        <?= $this->render('_formloginheader' ,[
                            'modellogintop' => $modellogintop,
                        ]) ?>
                          
                        </li>
                      </ul>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>