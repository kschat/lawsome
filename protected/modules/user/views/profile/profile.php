<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");

$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
		:array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
?><h1><?php echo UserModule::t('Your profile'); ?></h1>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif;

$attributes = array();
$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
if ($profileFields) {
	$i=0;
	foreach($profileFields as $field) {
		$attributes[$i++] = array('label'=>CHtml::encode(UserModule::t($field->title)), 
			'value'=>(($field->widgetView($profile))? $field->widgetView($profile): 
						CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):
							$profile->getAttribute($field->varname)))));
	}
}



$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array('name' => 'username', 'label' => 'Username'),
		$attributes[0],
		$attributes[1],
		array('name' => 'email', 'label' =>'Email'),
		array('name' => 'create_at', 'label' =>'Registration date'),
		array('name' => 'lastvisit_at', 'label' =>'Last visit'),
		array('name' => 'status', 'label' =>'Status'),
	),
));
?>