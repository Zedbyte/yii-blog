<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Contact Us';
// $this->breadcrumbs = array('Contact');
?>

<h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-7xl font-bold text-black dark:text-white font-playpen text-center mt-10">
	Contact
</h1>

<div class="w-full h-full flex flex-col justify-start items-center p-10">
    <div class="text-left space-y-6 md:space-y-8 lg:space-y-10 flex flex-col items-center">
        <p class="text-lg sm:text-xl md:text-2xl text-gray-900 dark:text-gray-200 font-playpen max-w-5xl text-center">
            Have any inquiries or feedback? Feel free to reach out!
        </p>
    </div>

    <?php if (Yii::app()->user->hasFlash('contact')): ?>
        <div class="flash-success text-green-600 font-semibold mt-6">
            <?php echo Yii::app()->user->getFlash('contact'); ?>
        </div>
    <?php else: ?>

    <div class="form w-full max-w-2xl mt-10">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'contact-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        )); ?>

        <p class="text-gray-700 dark:text-gray-400 text-base mb-4">Fields with <span class="text-red-500">*</span> are required.</p>
        <?php echo $form->errorSummary($model, '', '', ['class' => 'text-red-500 mb-4']); ?>

        <div class="space-y-4">
            <div>
                <?php echo $form->labelEx($model, 'name', ['class' => 'block font-semibold']); ?>
                <?php echo $form->textField($model, 'name', ['class' => 'w-full p-2 border dark:border-stone-500 rounded']); ?>
                <?php echo $form->error($model, 'name', ['class' => 'text-red-500']); ?>
            </div>

            <div>
                <?php echo $form->labelEx($model, 'email', ['class' => 'block font-semibold']); ?>
                <?php echo $form->textField($model, 'email', ['class' => 'w-full p-2 border dark:border-stone-500 rounded']); ?>
                <?php echo $form->error($model, 'email', ['class' => 'text-red-500']); ?>
            </div>

            <div>
                <?php echo $form->labelEx($model, 'subject', ['class' => 'block font-semibold']); ?>
                <?php echo $form->textField($model, 'subject', ['class' => 'w-full p-2 border dark:border-stone-500 rounded']); ?>
                <?php echo $form->error($model, 'subject', ['class' => 'text-red-500']); ?>
            </div>

            <div>
                <?php echo $form->labelEx($model, 'body', ['class' => 'block font-semibold']); ?>
                <?php echo $form->textArea($model, 'body', ['rows' => 6, 'class' => 'w-full p-2 border dark:border-stone-500 rounded']); ?>
                <?php echo $form->error($model, 'body', ['class' => 'text-red-500']); ?>
            </div>
        </div>

        <?php if (CCaptcha::checkRequirements()): ?>
        <div class="mt-4">
            <?php echo $form->labelEx($model, 'verifyCode', ['class' => 'block font-semibold']); ?>
            <div class="flex items-center space-x-4">
                <?php $this->widget('CCaptcha'); ?>
                <?php echo $form->textField($model, 'verifyCode', ['class' => 'p-2 border rounded']); ?>
            </div>
            <p class="text-sm text-gray-600 mt-1">Please enter the letters as they appear above. Letters are not case-sensitive.</p>
            <?php echo $form->error($model, 'verifyCode', ['class' => 'text-red-500']); ?>
        </div>
        <?php endif; ?>

        <div class="mt-6">
            <?php echo CHtml::submitButton('Submit', ['class' => 'bg-stone-900 dark:bg-[#f7f4ed] dark:text-stone-800 text-white px-6 sm:px-8 md:px-10 py-2 
            sm:py-3 rounded-full text-base sm:text-lg md:text-xl hover:bg-gray-700 dark:hover:bg-[#e0dccb] transition font-semibold']); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
    <?php endif; ?>
</div>
