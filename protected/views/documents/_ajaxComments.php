<script type="text/javascript">
//$('.modal-body').empty();
$('body').off('click', '#ext-comment-submit');</script>
<?php 
$this->renderPartial('comment.views.comment.commentList', array(
		'model'=>$model,
	)); 
?>