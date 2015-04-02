<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" ng-app="oSystems">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

    <!-- modernizr -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/includes/caption/css/default.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/includes/caption/css/component.css" />
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/includes/caption/js/modernizr.custom.js"></script>

    <!-- elastic -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/includes/elastic/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/includes/elastic/fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/includes/elastic/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/includes/elastic/css/sidebar.css" />
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/includes/elastic/js/snap.svg-min.js"></script>

    <!-- blueprint CSS framework -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
          media="screen, projection"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
          media="print"/>
    <link rel="stylesheet"
          href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="http://css-spinners.com/css/spinners.css" type="text/css">

    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
          media="screen, projection"/>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>

    <!-- Angular CSS Injectors -->
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/ng-notify/dist/ng-notify.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/ngDialog/css/ngDialog.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/ngDialog/css/ngDialog-theme-plain.css"/>
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->request->baseUrl; ?>/app/js/directives/slider/css/slider.css"/>

    <!-- Bootstrap JS -->
    <script
        src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Angular Controllers -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/angular/angular.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/app/js/app.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/app/js/routing.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/app/js/site/controllers/siteController.js"></script>
    <script
        src="<?php echo Yii::app()->request->baseUrl; ?>/app/js/userManager/controllers/userManagerController.js"></script>
    <script
        src="<?php echo Yii::app()->request->baseUrl; ?>/app/js/userManager/controllers/addUserController.js"></script>

    <!-- Angular Injectors -->
    <script
        src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/angular-animate/angular-animate.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/ng-notify/dist/ng-notify.min.js"></script>
    <script
        src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/angular-route/angular-route.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/ngDialog/js/ngDialog.min.js"></script>


    <!-- Angular Services -->
    <script
        src="<?php echo Yii::app()->request->baseUrl; ?>/app/js/userManager/services/userManagerService.js"></script>

    <!-- Angular Factories -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/app/js/factories/globals.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/underscore/underscore-min.js"></script>

    <!-- Angular Directives -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/app/js/directives/slider/slider.js"></script>

    <!-- Bootstrap Components -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap/js/transition.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap/js/tooltip.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bower_components/bootstrap/js/collapse.js"></script>




    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container-fluid" id="page">
    <?php if (!Yii::app()->user->isGuest) { ?>
        <div>
            <div id="header">
                <div id="logo">School Management System</div>
            </div>
            <!-- header -->
            <div id="mainmenu">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => array(
                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
//                        array('label' => 'Contact', 'url' => array('/site/contact')),
//                        array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                        array('label' => 'School Setup', 'url' => array('/site/players'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Settings', 'url' => array('/site/teams'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Home', 'url' => array('/site/index'), 'visible' => !Yii::app()->user->isGuest),
                    ),
                ));
                ?>
            </div>
            <!-- mainmenu -->
        </div>

        <?php if (isset($this->breadcrumbs)): ?>
            <?php
            $this->widget('zii.widgets.CBreadcrumbs', array(
                'links' => $this->breadcrumbs,
            ));
            ?><!-- breadcrumbs -->
        <?php endif ?>
    <?php } else { ?>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
    <?php } ?>


    <?php echo $content; ?>

    <div class="clear"></div>
    <?php if (!Yii::app()->user->isGuest) { ?>
        <div id="footer">
        </div>
    <?php } ?>
    <!-- footer -->

</div>
<!-- page -->

</body>
</html>
