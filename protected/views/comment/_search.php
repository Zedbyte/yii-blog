<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $form CActiveForm */
?>

<!-- <div class="wide form"> -->

<?php //$form=$this->beginWidget('CActiveForm', array(
	//'action'=>Yii::app()->createUrl($this->route),
	//'method'=>'get',
//)); ?>

	<!-- <div class="row">
		<?php //echo $form->label($model,'id'); ?>
		<?php //echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'content'); ?>
		<?php //echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'status'); ?>
		<?php //echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'create_time'); ?>
		<?php //echo $form->textField($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'author'); ?>
		<?php //echo $form->textField($model,'author',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'email'); ?>
		<?php //echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'url'); ?>
		<?php //echo $form->textField($model,'url',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'post_id'); ?>
		<?php //echo $form->textField($model,'post_id'); ?>
	</div>

	<div class="row buttons">
		<?php //echo CHtml::submitButton('Search'); ?>
	</div> -->

<?php //$this->endWidget(); ?>

<!-- </div> search-form -->

<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $form CActiveForm */
?>

<div class="w-full mx-auto bg-[#f8f7f6] dark:bg-stone-900 border border-gray-300 dark:border-stone-600 shadow-lg rounded-lg p-6 mt-6">
    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Advanced Search</h2>

    <?php $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <?php echo $form->label($model, 'id', array('class' => 'block text-sm font-medium text-gray-700 dark:text-gray-300')); ?>
            <?php echo $form->textField($model, 'id', array('class' => 'w-full px-4 py-2 border dark:border-stone-700 rounded-lg bg-white dark:bg-gray-800 dark:text-white')); ?>
        </div>

        <div>
            <?php echo $form->label($model, 'content', array('class' => 'block text-sm font-medium text-gray-700 dark:text-gray-300')); ?>
            <?php echo $form->textArea($model, 'content', array('rows' => 4, 'class' => 'w-full px-4 py-2 border rounded-lg bg-white dark:bg-gray-800 dark:text-white dark:border-stone-700')); ?>
        </div>

        <div>
            <?php echo $form->label($model, 'status', array('class' => 'block text-sm font-medium text-gray-700 dark:text-gray-300')); ?>
            <?php //echo $form->textField($model, 'status', array('class' => 'w-full px-4 py-2 border rounded-lg bg-white dark:bg-gray-800 dark:text-white')); ?>
            <?php echo $form->dropDownList($model, 'status', Lookup::items('CommentStatus'), array(
                'class' => 'w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 bg-white dark:bg-gray-800 dark:text-white dark:border-stone-700'
            )); ?>
        </div>

        <div>
            <?php echo $form->label($model, 'create_time', array('class' => 'block text-sm font-medium text-gray-700 dark:text-gray-300')); ?>
            <?php echo $form->textField($model, 'create_time', array('class' => 'w-full px-4 py-2 border rounded-lg bg-white dark:bg-gray-800 dark:text-white dark:border-stone-700')); ?>
        </div>

        <div>
            <?php echo $form->label($model, 'author', array('class' => 'block text-sm font-medium text-gray-700 dark:text-gray-300')); ?>
            <?php echo $form->textField($model, 'author', array('size' => 60, 'maxlength' => 128, 'class' => 'w-full px-4 py-2 border rounded-lg bg-white dark:bg-gray-800 dark:text-white dark:border-stone-700')); ?>
        </div>

        <div>
            <?php echo $form->label($model, 'email', array('class' => 'block text-sm font-medium text-gray-700 dark:text-gray-300')); ?>
            <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 128, 'class' => 'w-full px-4 py-2 border rounded-lg bg-white dark:bg-gray-800 dark:text-white dark:border-stone-700')); ?>
        </div>

        <div>
            <?php echo $form->label($model, 'url', array('class' => 'block text-sm font-medium text-gray-700 dark:text-gray-300')); ?>
            <?php echo $form->textField($model, 'url', array('size' => 60, 'maxlength' => 128, 'class' => 'w-full px-4 py-2 border rounded-lg bg-white dark:bg-gray-800 dark:text-white dark:border-stone-700')); ?>
        </div>

        <div>
            <?php echo $form->label($model, 'post_id', array('class' => 'block text-sm font-medium text-gray-700 dark:text-gray-300')); ?>
            <?php echo $form->textField($model, 'post_id', array('class' => 'w-full px-4 py-2 border rounded-lg bg-white dark:bg-gray-800 dark:text-white dark:border-stone-700')); ?>
        </div>
    </div>

    <div class="mt-6 text-right">
        <?php echo CHtml::submitButton('Search', array(
            'class' => 'bg-gray-700 dark:bg-[#f7f4ed] dark:hover:bg-[#e0dccb] text-white dark:text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-800 transition-all'
        )); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
