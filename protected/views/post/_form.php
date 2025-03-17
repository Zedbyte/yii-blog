<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="w-10/12 mx-auto bg-[#fffef7] dark:bg-stone-800 p-6 rounded-lg shadow-md border border-gray-300">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'post-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>

	<h2 class="text-2xl font-semibold text-gray-800 mb-4">
        <?php echo $model->isNewRecord ? 'Create New Post' : 'Edit Post'; ?>
    </h2>

	<p class="text-sm text-gray-600 mb-4">Fields with <span class="text-red-500">*</span> are required.</p>

	<?php echo $form->errorSummary($model, '', '', array('class' => 'text-red-500 p-3 rounded bg-red-100 mb-4')); ?>

    <!-- Title Field -->
    <div class="mb-4">
        <?php echo $form->labelEx($model, 'title', array('class' => 'block text-gray-700 dark:text-gray-200 font-medium mb-1')); ?>
        <?php echo $form->textField($model, 'title', array(
            'class' => 'w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400',
            'maxlength' => 128
        )); ?>
        <?php echo $form->error($model, 'title', array('class' => 'text-red-500 text-sm')); ?>
    </div>

    <!-- Content Field -->
    <div class="mb-4">
        <?php echo $form->labelEx($model, 'content', array('class' => 'block text-gray-700 font-medium mb-1')); ?>
        <?php echo $form->textArea($model, 'content', array(
            'class' => 'w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400',
            'rows' => 6
        )); ?>
        <?php echo $form->error($model, 'content', array('class' => 'text-red-500 text-sm')); ?>
    </div>

    <!-- Tags Field -->
    <div class="mb-4">
        <?php echo $form->labelEx($model, 'tags', array('class' => 'block text-gray-700 font-medium mb-1')); ?>
        <?php echo $form->textArea($model, 'tags', array(
            'class' => 'w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400',
            'rows' => 2
        )); ?>
        <?php echo $form->error($model, 'tags', array('class' => 'text-red-500 text-sm')); ?>
    </div>

    <!-- Status Dropdown -->
    <div class="mb-4">
        <?php echo $form->labelEx($model, 'status', array('class' => 'block text-gray-700 font-medium mb-1')); ?>
        <?php echo $form->dropDownList($model, 'status', Lookup::items('PostStatus'), array(
            'class' => 'w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 bg-white'
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
            'class' => 'bg-blue-500 text-white font-semibold px-6 py-2 rounded-lg hover:bg-blue-600 transition-all'
        )); ?>
    </div>

	<?php $this->endWidget(); ?>

</div><!-- form -->