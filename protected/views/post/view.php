<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title,
);

// $this->menu=array(
// 	array('label'=>'List Post', 'url'=>array('index')),
// 	array('label'=>'Create Post', 'url'=>array('create')),
// 	array('label'=>'Update Post', 'url'=>array('update', 'id'=>$model->id)),
// 	array('label'=>'Delete Post', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
// 	array('label'=>'Manage Post', 'url'=>array('admin')),
// );
?>

<!-- <h1>View Post #<?php echo $model->id; ?></h1> -->

<!-- <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
		'tags',
		'status',
		'create_time',
		'update_time',
		'author_id',
	),
)); ?> -->

<!-- TODOs (Added) Chapter 4 -->
<!-- <div id="comments">
    <?php //if($model->commentCount>=1): ?>
        <h3>
            <?php //echo $model->commentCount . 'comment(s)'; ?>
        </h3>

        <?php //$this->renderPartial('_comments',array(
            //'post'=>$model,
            //'comments'=>$model->comments,
        //)); ?>
    <?php //endif; ?>

	<h3>Leave a Comment</h3>

	<?php //if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
        <div class="flash-success">
            <?php //echo Yii::app()->user->getFlash('commentSubmitted'); ?>
        </div>
    <?php //else: ?>
        <?php //$this->renderPartial('/comment/_form',array(
            //'model'=>$comment,
        //)); ?>
    <?php //endif; ?>
</div> -->


<div class="w-3xl mx-auto bg-[#fffef7] p-6 rounded-lg shadow-md border border-gray-300">
    <!-- Post Author & Date -->
    <div class="flex items-center space-x-3 mb-4">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/default-avatar.jpg" class="w-12 h-12 rounded-full border border-gray-300" alt="Author">
        <div>
            <p class="font-semibold text-gray-800"><?php echo CHtml::encode($model->author->username); ?></p>
            <p class="text-sm text-gray-500"><?php echo date('F j, Y', $model->create_time); ?></p>
        </div>
    </div>

    <!-- Post Content -->
    <div class="mb-4">
        <h1 class="text-xl font-bold text-gray-900"><?php echo CHtml::encode($model->title); ?></h1>
        <p class="text-gray-700 mt-2"><?php echo nl2br(CHtml::encode($model->content)); ?></p>
    </div>

    <!-- Comment Input -->
    <div class="mt-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Leave a Comment</h3>
        <?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
            <div class="p-3 bg-green-100 text-green-700 rounded-md">
                <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
            </div>
        <?php else: ?>
            <?php $this->renderPartial('/comment/_form', array('model' => $comment)); ?>
        <?php endif; ?>
    </div>

    <!-- Comments Section -->
    <div class="mt-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4"><?php echo $model->commentCount; ?> Comment(s)</h3>
        <div class="space-y-4">
            <?php foreach($model->comments as $comment): ?>
                <div class="flex space-x-3  p-3 rounded-lg">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/guest-avatar.png" class="object-cover w-10 h-10 rounded-full" alt="User">
                    <div>
                        <p class="font-medium text-gray-800"><?php echo CHtml::encode($comment->author); ?></p>
                        <p class="text-sm text-gray-600"><?php echo nl2br(CHtml::encode($comment->content)); ?></p>
                        <p class="text-xs text-gray-500 mt-1"><?php echo date('F j, Y g:i A', $comment->create_time); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
