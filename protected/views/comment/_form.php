<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $form CActiveForm */
?>

<div class="form bg-[#fffef7] dark:bg-stone-900 p-4 rounded-lg shadow-sm">

<?php $form=$this->beginWidget('CActiveForm', array(

	/**
	 * 
	 * TODOs (Modified)
	 * 
	 */

	'id'=>'comment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true, //False => True
)); ?>

	<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->

	<?php echo $form->errorSummary($model, '', '', array('class' => 'text-red-500 p-3 rounded bg-red-100 mb-4')); ?>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div> -->

	<div class="mb-3">
        <?php echo $form->textField($model, 'author', array(
            'class' => 'w-full border rounded-lg px-4 py-2 border border-gray-300',
            'placeholder' => 'Your Name'
        )); ?>
        <?php echo $form->error($model, 'author', array('class' => 'text-red-500 text-sm')); ?>
    </div>

	<div class="mb-4">
        <?php echo $form->textArea($model, 'content', array(
            'rows'=>3, 
            'class'=>'w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400',
            'placeholder'=>'Write a comment...'
        )); ?>
        <?php echo $form->error($model, 'content', array('class' => 'text-red-500 text-sm')); ?>
    </div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div> -->

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div> -->

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div> -->

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div> -->

	<div class="mb-3">
		<?php echo $form->textField($model, 'email', array(
			'class' => 'w-full border rounded-lg px-4 py-2 border border-gray-300',
			'placeholder' => 'Your email'
		)); ?>
		<?php echo $form->error($model, 'email', array('class' => 'text-red-500 text-sm')); ?>
	</div>

	<div class="flex justify-between items-center gap-5">
        <div class="flex space-x-3">
			<?php echo $form->textField($model, 'url', array(
				'class' => 'w-full border rounded-lg px-4 py-2 border border-gray-300',
				'placeholder' => 'Your website (optional)'
			)); ?>
        	<?php echo $form->error($model, 'url', array('class' => 'text-red-500 text-sm')); ?>
        </div>
        <?php echo CHtml::submitButton('Post Comment', array(
            'class' => 'bg-stone-800 dark:bg-[#f7f4ed] text-white dark:text-black font-semibold px-4 py-2 rounded-lg hover:bg-stone-600 dark:hover:bg-[#e0dccb] transition-all'
        )); ?>
    </div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div> -->

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'post_id'); ?>
		<?php echo $form->textField($model,'post_id'); ?>
		<?php echo $form->error($model,'post_id'); ?>
	</div> -->

	<!-- <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div> -->

<?php $this->endWidget(); ?>

</div><!-- form -->