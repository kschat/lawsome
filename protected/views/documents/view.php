<?php
$this->widget('bootstrap.widgets.TbNavbar', array(
	'brand'=>'',
	'collapse'=>true,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
            	array('label'=>'Add annotation', 'url'=>'#add-annotation'),
                array('label'=>'Section', 'items'=>array(
                   array('label'=>'Body', 'url'=>'#body-section'),
                )),
                array('label'=>'Page', 'items'=>array(
                   array('label'=>'1', 'url'=>'#page-1'),
                )),
            ),
        ),
    ),
    'htmlOptions'=>array('class'=>'subnav'),
));

$this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'comment-modal')); 
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Comments</h4>
</div>
<div class="modal-body">
</div>
<script>
    $('#90').live('click', function() {
        console.log($('#ext-comment-form'));
    });

    $('#ext-comment-submit').die('click');
</script>
<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>
 
<?php $this->endWidget(); ?>

<script>$('.subnav').find('.brand').hide();</script>
<div class="container">
	<section id="add-annotation" class="add-annotation-container" style="padding-top: 80px; margin-top: -80px;">
	</section>

	<div class="document-main-container">
			<div class="document-container" id="document-<?php echo $model->id; ?>">
			<div class="document span8">
				<h2 style="text-align: center;"><?php echo $model->title; ?></h2>
				<p>
					<?php echo $model->text; ?>
				</p>
			</div>

			<div class="span4">
				<div class="annotation-list-container">
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$('.subnav').scrollspy();
$('[data-spy="scroll"]').each(function () {
	var $spy = $(this).scrollspy('refresh');
});
</script>