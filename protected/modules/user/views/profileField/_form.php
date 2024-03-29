<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo CHtml::errorSummary($model, null, null, array('class'=>'alert in alert-block fade alert-error')); ?>

	<div class="varname">
		<?php echo CHtml::activeLabelEx($model,'varname'); ?>
		<?php echo (($model->id)?CHtml::activeTextField($model,'varname',array('size'=>60,'maxlength'=>50,'readonly'=>true)):CHtml::activeTextField($model,'varname',array('size'=>60,'maxlength'=>50))); ?>
		<p class="hint"><?php echo UserModule::t("Allowed lowercase letters and digits."); ?></p>
	</div>

	<div class="title">
		<?php echo CHtml::activeLabelEx($model,'title'); ?>
		<?php echo CHtml::activeTextField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<p class="hint"><?php echo UserModule::t('Field name on the language of "sourceLanguage".'); ?></p>
	</div>

	<div class="field_type">
		<?php echo CHtml::activeLabelEx($model,'field_type'); ?>
		<?php echo (($model->id)?CHtml::activeTextField($model,'field_type',array('size'=>60,'maxlength'=>50,'readonly'=>true,'id'=>'field_type')):CHtml::activeDropDownList($model,'field_type',ProfileField::itemAlias('field_type'),array('id'=>'field_type'))); ?>
		<p class="hint"><?php echo UserModule::t('Field type column in the database.'); ?></p>
	</div>

	<div class="field_size">
		<?php echo CHtml::activeLabelEx($model,'field_size'); ?>
		<?php echo (($model->id)?CHtml::activeTextField($model,'field_size',array('readonly'=>true)):CHtml::activeTextField($model,'field_size')); ?>
		<p class="hint"><?php echo UserModule::t('Field size column in the database.'); ?></p>
	</div>

	<div class="field_size_min">
		<?php echo CHtml::activeLabelEx($model,'field_size_min'); ?>
		<?php echo CHtml::activeTextField($model,'field_size_min'); ?>
		<p class="hint"><?php echo UserModule::t('The minimum value of the field (form validator).'); ?></p>
	</div>

	<div class="required">
		<?php echo CHtml::activeLabelEx($model,'required'); ?>
		<?php echo CHtml::activeDropDownList($model,'required',ProfileField::itemAlias('required')); ?>
		<p class="hint"><?php echo UserModule::t('Required field (form validator).'); ?></p>
	</div>

	<div class="match">
		<?php echo CHtml::activeLabelEx($model,'match'); ?>
		<?php echo CHtml::activeTextField($model,'match',array('size'=>60,'maxlength'=>255)); ?>
		<p class="hint"><?php echo UserModule::t("Regular expression (example: '/^[A-Za-z0-9\s,]+$/u')."); ?></p>
	</div>

	<div class="range">
		<?php echo CHtml::activeLabelEx($model,'range'); ?>
		<?php echo CHtml::activeTextField($model,'range',array('size'=>60,'maxlength'=>5000)); ?>
		<p class="hint"><?php echo UserModule::t('Predefined values (example: 1;2;3;4;5 or 1==One;2==Two;3==Three;4==Four;5==Five).'); ?></p>
	</div>

	<div class="error_message">
		<?php echo CHtml::activeLabelEx($model,'error_message'); ?>
		<?php echo CHtml::activeTextField($model,'error_message',array('size'=>60,'maxlength'=>255)); ?>
		<p class="hint"><?php echo UserModule::t('Error message when you validate the form.'); ?></p>
	</div>

	<div class="other_validator">
		<?php echo CHtml::activeLabelEx($model,'other_validator'); ?>
		<?php echo CHtml::activeTextField($model,'other_validator',array('size'=>60,'maxlength'=>255)); ?>
		<p class="hint"><?php echo UserModule::t('JSON string (example: {example}).',array('{example}'=>CJavaScript::jsonEncode(array('file'=>array('types'=>'jpg, gif, png'))))); ?></p>
	</div>

	<div class="default">
		<?php echo CHtml::activeLabelEx($model,'default'); ?>
		<?php echo (($model->id)?CHtml::activeTextField($model,'default',array('size'=>60,'maxlength'=>255,'readonly'=>true)):CHtml::activeTextField($model,'default',array('size'=>60,'maxlength'=>255))); ?>
		<p class="hint"><?php echo UserModule::t('The value of the default field (database).'); ?></p>
	</div>

	<div class="widget">
		<?php echo CHtml::activeLabelEx($model,'widget'); ?>
		<?php 
		list($widgetsList) = ProfileFieldController::getWidgets($model->field_type);
		echo CHtml::activeDropDownList($model,'widget',$widgetsList,array('id'=>'widgetlist'));
		//echo CHtml::activeTextField($model,'widget',array('size'=>60,'maxlength'=>255)); ?>
		<p class="hint"><?php echo UserModule::t('Widget name.'); ?></p>
	</div>

	<div class="widgetparams">
		<?php echo CHtml::activeLabelEx($model,'widgetparams'); ?>
		<?php echo CHtml::activeTextField($model,'widgetparams',array('size'=>60,'maxlength'=>5000,'id'=>'widgetparams')); ?>
		<p class="hint"><?php echo UserModule::t('JSON string (example: {example}).',array('{example}'=>CJavaScript::jsonEncode(array('param1'=>array('val1','val2'),'param2'=>array('k1'=>'v1','k2'=>'v2'))))); ?></p>
	</div>

	<div class="position">
		<?php echo CHtml::activeLabelEx($model,'position'); ?>
		<?php echo CHtml::activeTextField($model,'position'); ?>
		<p class="hint"><?php echo UserModule::t('Display order of fields.'); ?></p>
	</div>

	<div class="visible">
		<?php echo CHtml::activeLabelEx($model,'visible'); ?>
		<?php echo CHtml::activeDropDownList($model,'visible',ProfileField::itemAlias('visible')); ?>
	</div>

	<div class="buttons">
		<?php 
			$this->widget('bootstrap.widgets.TbButton',array(
	            'buttonType'=>'submit',
	            'type'=>'success',
	            'label'=>$model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'),
	        ));
		?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->
<div id="dialog-form" title="<?php echo UserModule::t('Widget parametrs'); ?>">
	<form>
	<fieldset>
		<label for="name">Name</label>
		<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
		<label for="value">Value</label>
		<input type="text" name="value" id="value" value="" class="text ui-widget-content ui-corner-all" />
	</fieldset>
	</form>
</div>
