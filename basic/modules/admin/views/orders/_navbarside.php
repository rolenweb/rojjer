<?php
use yii\helpers\Html;
?>
<nav class="navbar-side" role="navigation">
            <div class="navbar-collapse sidebar-collapse collapse">
                <ul id="side" class="nav navbar-nav side-nav">
                    <!-- begin SIDE NAV USER PANEL -->
                    <li class="side-user hidden-xs">
                        
                        <?= Html::img('@web/images/avatar/'.$modelprofile->photo, ['class' => 'img-responsive img-circle text-center']) ?>
                        
                        <p class="name tooltip-sidebar-logout">
                            
                            <span class="last-name"><?= Yii::$app->user->identity->username ?></span> <a style="color: inherit" class="logout_open" href="#logout" data-toggle="tooltip" data-placement="top" title="Logout"><i class="fa fa-sign-out"></i></a>
                        </p>
                        <div class="clearfix"></div>
                    </li>
                    <!-- end SIDE NAV USER PANEL -->
                    <!-- begin SIDE NAV SEARCH -->
                    
                    <li>
                        
                        <?= Html::a(Html::tag('i','',['class' => 'fa fa-dashboard']). 'Home', ['index']) ?>
                    </li>
                    
                     <li>
                        
                        <?= Html::a(Html::tag('i','',['class' => 'fa fa-list-alt']). 'Orders', ['/admin/orders/index']) ?>
                    </li>
                   
                    <li>
                        <?= Html::a(Html::tag('i','',['class' => 'fa fa-book']). 'Translaters', ['exchange/index']) ?>
                    </li>
                    
                    <li>
                        <?= Html::a(Html::tag('i','',['class' => 'fa fa-money']). 'Balance', ['']) ?>
                        
                    </li>
                    <li>
                        <?= Html::a(Html::tag('i','',['class' => 'fa fa-file-text-o']). 'News', ['exchange/index']) ?>
                    </li>
                    <li>
                        <?= Html::a(Html::tag('i','',['class' => 'fa fa-phone']). 'Contact', ['exchange/contact']) ?>
                        
                    </li>
                    
                </ul>
                <!-- /.side-nav -->
            </div>
            <!-- /.navbar-collapse -->
        </nav>