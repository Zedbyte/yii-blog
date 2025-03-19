<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="w-10/12 mx-auto bg-[#fffef7] dark:bg-stone-900 p-6 rounded-lg shadow-md border border-gray-300 dark:border-stone-700">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'post-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>

	<h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">
        <?php echo $model->isNewRecord ? 'Create New Post' : 'Edit Post'; ?>
    </h2>

	<p class="text-sm text-gray-600 dark:text-gray-300 mb-4">Fields with <span class="text-red-500">*</span> are required.</p>

	<?php echo $form->errorSummary($model, '', '', array('class' => 'text-red-500 p-3 rounded bg-red-100 mb-4')); ?>

    <!-- Title Field -->
    <div class="mb-4">
        <?php echo $form->labelEx($model, 'title', array('class' => 'block text-gray-700 dark:text-gray-200 font-medium mb-1 dark:text-gray-200')); ?>
        <?php echo $form->textField($model, 'title', array(
            'class' => 'w-full border border-gray-400 dark:border-stone-700 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 dark:bg-gray-800 dark:text-white',
            'maxlength' => 128
        )); ?>
        <?php echo $form->error($model, 'title', array('class' => 'text-red-500 text-sm')); ?>
    </div>

    <!-- Content Field -->
    <div class="mb-4">
        <?php echo $form->labelEx($model, 'content', array('class' => 'block text-gray-700 font-medium mb-1 dark:text-gray-200')); ?>
        <?php echo $form->textArea($model, 'content', array(
            'class' => 'w-full border border-gray-400 dark:border-stone-700 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 dark:bg-gray-800 dark:text-white',
            'rows' => 6
        )); ?>
        <?php echo $form->error($model, 'content', array('class' => 'text-red-500 text-sm')); ?>
    </div>

    <!-- Tags Field -->
    <div class="mb-4">
        <?php echo $form->labelEx($model, 'tags', array('class' => 'block text-gray-700 font-medium mb-1 dark:text-gray-200')); ?>
        <?php echo $form->textArea($model, 'tags', array(
            'class' => 'w-full border border-gray-400 dark:border-stone-700 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 dark:bg-gray-800 dark:text-white',
            'rows' => 2
        )); ?>
        <?php echo $form->error($model, 'tags', array('class' => 'text-red-500 text-sm')); ?>
    </div>

    <!-- Status Dropdown -->
    <div class="mb-4">
        <?php echo $form->labelEx($model, 'status', array('class' => 'block text-gray-700 font-medium mb-1 dark:text-gray-200')); ?>
        <?php echo $form->dropDownList($model, 'status', Lookup::items('PostStatus'), array(
            'class' => 'w-full border border-gray-400 dark:border-stone-700 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 dark:bg-gray-800 dark:text-white'
        )); ?>
        <?php echo $form->error($model, 'status', array('class' => 'text-red-500 text-sm')); ?>
    </div>

	<!-- TODOs (Changed) -->
	<!-- <div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div> -->

	<!-- TODOs (Excluded) -->
	<!-- <div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div> -->

	<!-- TODOs (Excluded) -->
	<!-- <div class="row">
		<?php echo $form->labelEx($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time'); ?>
		<?php echo $form->error($model,'update_time'); ?>
	</div> -->

	<!-- TODOs (Excluded) -->
	<!-- <div class="row">
		<?php echo $form->labelEx($model,'author_id'); ?>
		<?php echo $form->textField($model,'author_id'); ?>
		<?php echo $form->error($model,'author_id'); ?>
	</div> -->

	<!-- Submit Button -->
    <div class="flex justify-end">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create Post' : 'Save Changes', array(
            'class' => 'bg-stone-800 dark:bg-[#f7f4ed] text-white dark:text-stone-800 font-semibold px-6 py-2 rounded-lg hover:bg-stone-700 dark:hover:bg-[#e0dccb] transition-all'
        )); ?>
    </div>

	<?php $this->endWidget(); ?>

</div><!-- form -->