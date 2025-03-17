<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<!-- <h1>Login</h1> -->

<!-- <p>Please fill out the following form with your login credentials:</p> -->

<!-- <div class="form">
<?php //$form=$this->beginWidget('CActiveForm', array(
	//'id'=>'login-form',
	//'enableClientValidation'=>true,
	//'clientOptions'=>array(
	//	'validateOnSubmit'=>true,
	//),
//)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php //echo $form->labelEx($model,'username'); ?>
		<?php //echo $form->textField($model,'username'); ?>
		<?php //echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'password'); ?>
		<?php //echo $form->passwordField($model,'password'); ?>
		<?php //echo $form->error($model,'password'); ?>
		<p class="hint">
			Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
		</p>
	</div>

	<div class="row rememberMe">
		<?php //echo $form->checkBox($model,'rememberMe'); ?>
		<?php //echo $form->label($model,'rememberMe'); ?>
		<?php //echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php //echo CHtml::submitButton('Login'); ?>
	</div> -->

<?php //$this->endWidget(); ?>
<!-- </div>form -->


<div class="flex h-full w-full justify-center items-center">
    <div class="bg-[#fffef7] dark:bg-stone-900 p-8 rounded-lg shadow-md border border-gray-300 dark:border-stone-500 h-4/6 w-4/12">
        <!-- Header -->
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-300">Login</h2>
            <p class="text-sm text-gray-600 dark:text-gray-200">Sign in to your account</p>
        </div>

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array('validateOnSubmit' => true),
        )); ?>

        <!-- Username -->
        <div class="mb-9">
            <?php echo $form->labelEx($model, 'username', array('class' => 'block text-sm font-medium text-gray-700 dark:text-gray-200')); ?>
            <?php echo $form->textField($model, 'username', array(
                'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-stone-500 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none',
                'placeholder' => 'Enter your username'
            )); ?>
            <?php echo $form->error($model, 'username', array('class' => 'text-red-500 text-xs')); ?>
        </div>

        <!-- Password -->
        <div class="mb-9">
            <?php echo $form->labelEx($model, 'password', array('class' => 'block text-sm font-medium text-gray-700 dark:text-gray-200')); ?>
            <?php echo $form->passwordField($model, 'password', array(
                'class' => 'mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-stone-500 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none',
                'placeholder' => 'Enter your password'
            )); ?>
            <?php echo $form->error($model, 'password', array('class' => 'text-red-500 text-xs')); ?>
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mb-10">
            <div class="flex items-center">
                <?php echo $form->checkBox($model, 'rememberMe', array('class' => 'h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 dark:border-stone-500 rounded')); ?>
                <?php echo $form->label($model, 'rememberMe', array('class' => 'ml-2 block text-sm text-gray-700 dark:text-gray-200')); ?>
            </div>
            <a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
        </div>

        <!-- Submit Button -->
        <div>
            <?php echo CHtml::submitButton('Login', array(
                'class' => 'w-full bg-stone-800 dark:bg-stone-600 text-white px-4 py-2 rounded-lg hover:bg-stone-700 transition-all font-semibold'
            )); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div>