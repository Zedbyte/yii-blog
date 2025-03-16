<?php
/* @var $this CommentController */
/* @var $model Comment */

// $this->breadcrumbs=array(
// 	'Comments'=>array('index'),
// 	$model->id,
// );

// $this->menu=array(
// 	array('label'=>'List Comment', 'url'=>array('index')),
// 	array('label'=>'Create Comment', 'url'=>array('create')),
// 	array('label'=>'Update Comment', 'url'=>array('update', 'id'=>$model->id)),
// 	array('label'=>'Delete Comment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
// 	array('label'=>'Manage Comment', 'url'=>array('admin')),
// );
?>

<!-- <h1>View Comment #<?php echo $model->id; ?></h1> -->

<!-- <?php $this->widget('zii.widgets.CDetailView', array(
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
)); ?> -->

<!-- <div class="comment">
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
</div> -->

<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
    'Comments'=>array('index'),
    'Comment #'.$model->id,
);
?>

<div class="w-3xl mx-auto bg-[#fffef7] p-6 rounded-lg shadow-md border border-gray-300">
    <!-- Comment Author & Date -->
    <div class="flex items-center space-x-3 mb-4">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/guest-avatar.png" 
            class="w-12 h-12 rounded-full border border-gray-300" alt="Author">
        <div>
            <p class="font-semibold text-gray-800"><?php echo CHtml::encode($model->author); ?></p>
            <p class="text-sm text-gray-500"><?php echo date('F j, Y g:i A', $model->create_time); ?></p>
        </div>
    </div>

    <!-- Comment Details -->
    <div class="mb-4 space-y-2">
        <p class="text-sm text-gray-600"><strong>ID:</strong> <?php echo CHtml::encode($model->id); ?></p>
        <p class="text-sm text-gray-600"><strong>Email:</strong> <?php echo CHtml::encode($model->email); ?></p>
        <?php if (!empty($model->url)): ?>
            <p class="text-sm text-gray-600">
                <strong>Website:</strong> 
                <a href="<?php echo CHtml::encode($model->url); ?>" target="_blank" class="text-blue-600 hover:underline">
                    <?php echo CHtml::encode($model->url); ?>
                </a>
            </p>
        <?php endif; ?>
        <p class="text-sm text-gray-600"><strong>Post ID:</strong> <?php echo CHtml::encode($model->post_id); ?></p>
    </div>

    <!-- Comment Content -->
    <div class="mb-4">
        <p class="text-gray-700 mt-2"><?php echo nl2br(CHtml::encode($model->content)); ?></p>
    </div>

    <!-- Comment Status -->
    <div class="mb-4">
        <span class="px-3 py-1 rounded-full text-white text-sm 
            <?php echo ($model->status == Comment::STATUS_APPROVED) ? 'bg-green-500' : 'bg-yellow-500'; ?>">
            <?php echo ($model->status == Comment::STATUS_APPROVED) ? 'Approved' : 'Pending Approval'; ?>
        </span>
    </div>

    <!-- Approve/Delete Actions -->
	<div class="flex justify-end space-x-4">
		<?php if ($model->status != 2):
		echo CHtml::beginForm(array('approve', 'id'=>$model->id), 'post'); ?>
			<?php echo CHtml::submitButton('Approve', array(
				'class'=>'bg-stone-800 text-white px-4 py-2 rounded-lg hover:bg-stone-700 transition-all'
			)); ?>
		<?php echo CHtml::endForm(); ?>
		<?php endif; ?>

		<?php echo CHtml::beginForm(array('delete', 'id'=>$model->id), 'post', array('confirm' => 'Are you sure?')); ?>
			<?php echo CHtml::submitButton('Delete', array(
				'class'=>'bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-all'
			)); ?>
		<?php echo CHtml::endForm(); ?>
	</div>

    <!-- Link to View Post -->
    <div class="mt-6">
        <a href="<?php echo CHtml::normalizeUrl(array('post/view', 'id'=>$model->post_id)); ?>" 
            class="text-blue-600 hover:text-blue-800 text-sm">
            View Related Post
        </a>
    </div>
</div>
