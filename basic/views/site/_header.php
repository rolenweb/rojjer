<?php
use yii\helpers\Html;

?>

<header class="header fixed clearfix">
          <div class="container">
            <div class="row">
              <div class="col-md-3">
                <div class="clearfix">
                  <div class="logo">
                    <?= Html::a(Html::img('images/logo.png', ['alt' => 'RoJJoR']), ['site/index']) ?>
                    <div class="site-slogan"> Smart idea for success all over the world </div>
     
                  </div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="clearfix">
                  <div class="main-navigation animated">
                    <nav class="navbar navbar-default" role="navigation">
                      <div class="container-fluid">
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>

                        </div>
                        <div class="collapse navbar-collapse" id="navbar-collapse-1">
                          <ul class="nav navbar-nav navbar-right">
                            <li class="active">
                               <?= Html::a('Home', ['site/index']) ?>
                            </li>
                            <li>
                              
                              <?= Html::a('About us', ['site/aboutus']) ?>
                            </li>
                            <li>
                              
                              <?= Html::a('How it works', ['site/faq']) ?>
                            </li>
                            
                            <li>
                              
                              <?= Html::a('Login', ['site/login']) ?>
                            </li>
                            <li>
                              
                              <?= Html::a('Sign Up', ['site/signup']) ?>
                            </li>
                            
                          </ul>
                        </div>
                      </div>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
</header>