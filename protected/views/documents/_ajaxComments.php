<?php 
//echo '<pre>'; print_r($model); echo '</pre>';
$this->renderPartial('comment.views.comment.commentList', array(
		'model'=>$model,
	)); 
?>