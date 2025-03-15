<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print"> -->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"> -->
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="https://unpkg.com/@phosphor-icons/web"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body class="bg-gray-900 text-gray-200 h-[calc(100vh-5rem)] overflow-hidden">
    <!-- Top Navigation Bar -->
    <nav class="bg-gray-800 p-4 fixed top-0 w-full z-10 shadow-md">
        <div class="container mx-auto flex justify-center space-x-10">
            <a href="<?php echo Yii::app()->createUrl('/site/index'); ?>" class="text-gray-300 hover:text-white"><i class="ph ph-house text-2xl"></i></a>
            <a href="<?php echo Yii::app()->createUrl('/site/page', array('view'=>'about')); ?>" class="text-gray-300 hover:text-white"><i class="ph ph-info text-2xl"></i></a>
            <a href="<?php echo Yii::app()->createUrl('/site/contact'); ?>" class="text-gray-300 hover:text-white"><i class="ph ph-phone text-2xl"></i></a>
            <a href="<?php echo Yii::app()->createUrl('/post'); ?>" class="text-gray-300 hover:text-white"><i class="ph ph-pencil text-2xl"></i></a>
            <a href="<?php echo Yii::app()->createUrl('/comment'); ?>" class="text-gray-300 hover:text-white"><i class="ph ph-chat text-2xl"></i></a>
            <?php if (Yii::app()->user->isGuest): ?>
                <a href="<?php echo Yii::app()->createUrl('/site/login'); ?>" class="text-gray-300 hover:text-white"><i class="ph ph-sign-in text-2xl"></i></a>
            <?php else: ?>
                <a href="<?php echo Yii::app()->createUrl('/site/logout'); ?>" class="text-gray-300 hover:text-white"><i class="ph ph-sign-out text-2xl"></i></a>
            <?php endif; ?>
        </div>
    </nav>
    
    <div class="w-full mx-auto mt-20 flex justify-center flex-1">
        <!-- Main Content -->
        <main class="w-full">
            <?php if(isset($this->breadcrumbs)):?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array('links' => $this->breadcrumbs)); ?>
            <?php endif?>
            <?php echo $content; ?>
        </main>
    </div>
    
    <!-- Footer -->
    <footer class="bg-gray-800 text-center p-4 mt-4 text-gray-400 fixed bottom-0 inset-x-0">
        <p>Copyright &copy; <?php echo date('Y'); ?> by Mark Jerome Santos</p>
        <p>All Rights Reserved.</p>
        <p><?php echo Yii::powered(); ?></p>
    </footer>
</body>
</html>
