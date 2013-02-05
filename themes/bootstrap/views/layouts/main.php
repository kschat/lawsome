<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
    <script data-main="../../js/bootstrap" src="../../js/libs/require/require-2.1.2.min.js"></script>
    <?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/main.css'); ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body data-spy="scroll" data-target=".subnav" data-offset="80">

<?php 
$this->widget('bootstrap.widgets.TbNavbar',array(
    'htmlOptions'=>array('class'=>'mainnav'),
	'type' => 'inverse',
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Documents', 'url'=>array('documents/index')),
                array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Contact', 'url'=>array('/site/contact')),
            ),
        ),
        array(
        	'class' => 'bootstrap.widgets.TbMenu',
        	'htmlOptions' => array('class' => 'pull-right'),
        	'items' => array(
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>Yii::app()->user->name, 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                        array('label'=>'Add a document', 'url'=>'/documents/create'),
                        array('label'=>'Manage documents', 'url'=>'/documents/admin'),
                        '---',
                        array('label'=>'Logout', 'url'=>'/site/logout'),
                    ),
                ),
        	),
    	)
	)
));
?>

<div class="container" id="page">

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Lawsome.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
