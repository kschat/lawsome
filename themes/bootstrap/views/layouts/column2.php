<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
    <div class="row">
        <div class="span9">
            <div id="content">
                <?php echo $content; ?>
            </div><!-- content -->
        </div>
        <div class="span3">
            <div class="well" id="sidebar" style="position: fixed; width: inherit;">
            <?php
                $this->widget('bootstrap.widgets.TbMenu', array(
                    'type'=>'list',
                    'items'=>$this->menu,
                    //'htmlOptions'=>array('class'=>'operations'),
                ));
            ?>
            </div><!-- sidebar -->
        </div>
    </div>
</div>
<?php $this->endContent(); ?>