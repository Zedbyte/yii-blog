<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Comment', 'url'=>array('index')),
	array('label'=>'Create Comment', 'url'=>array('create')),
	array('label'=>'Update Comment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Comment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Comment', 'url'=>array('admin')),
);
?>

<h1>View Comment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'content',
		'status',
		'create_time',
		'author',
		'email',
		'url',
		'post_id',
	),
)); ?>

<div class="comment">
    <div class="comment-header">
        <strong><?php echo CHtml::encode($model->author); ?></strong> 
        on <?php echo date('F j, Y, g:i a', $model->create_time); ?>
    </div>

    <div class="comment-content">
        <?php echo CHtml::encode($model->content); ?>
    </div>

    <div class="comment-actions">
        <?php if($model->status == Comment::STATUS_PENDING): ?>
            <span class="pending-label">Pending Approval</span>
            <?php echo CHtml::form(array('comment/approve', 'id' => $model->id), 'post'); ?>
                <?php echo CHtml::submitButton('Approve', array('confirm' => 'Are you sure you want to approve this comment?')); ?>
            <?php echo CHtml::endForm(); ?>
        <?php else: ?>
            <span class="approved-label">Approved</span>
        <?php endif; ?>
    </div>
</div>