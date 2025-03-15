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
	<link href="protected\css\output.css" rel="stylesheet">
    <link href="protected\css\main.css" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body class="bg-[#f7f4ed] text-gray-700 h-[calc(100vh)] flex flex-col">
    <!-- Top Navigation Bar -->
    <nav class="border-b border-gray-700 p-6 fixed top-0 w-full z-10 shadow-md">
        <div class="container mx-auto flex justify-center space-x-12">
            <a href="<?php echo Yii::app()->createUrl('/site/index'); ?>" class="text-gray-800 hover:text-gray-600"><i class="ph ph-house text-3xl"></i></a>
            <a href="<?php echo Yii::app()->createUrl('/site/page', array('view'=>'about')); ?>" class="text-gray-800 hover:text-gray-600"><i class="ph ph-info text-3xl"></i></a>
            <a href="<?php echo Yii::app()->createUrl('/site/contact'); ?>" class="text-gray-800 hover:text-gray-600"><i class="ph ph-phone text-3xl"></i></a>
            <a href="<?php echo Yii::app()->createUrl('/post'); ?>" class="text-gray-800 hover:text-gray-600"><i class="ph ph-pencil text-3xl"></i></a>
            <a href="<?php echo Yii::app()->createUrl('/comment'); ?>" class="text-gray-800 hover:text-gray-600"><i class="ph ph-chat text-3xl"></i></a>
            <?php if (Yii::app()->user->isGuest): ?>
                <a href="<?php echo Yii::app()->createUrl('/site/login'); ?>" class="text-gray-800 hover:text-gray-600"><i class="ph ph-sign-in text-3xl"></i></a>
            <?php else: ?>
                <a href="<?php echo Yii::app()->createUrl('/site/logout'); ?>" class="text-gray-800 hover:text-gray-600"><i class="ph ph-sign-out text-3xl"></i></a>
            <?php endif; ?>
        </div>
    </nav>
    
    <div class="w-full h-full flex flex-col flex-1 items-center">
        <!-- Main Content -->
        <main class="max-w-11/12 h-full flex-1 flex flex-col justify-center border-x border-black">
            <?php if(isset($this->breadcrumbs)):?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array('links' => $this->breadcrumbs)); ?>
            <?php endif?>
            <?php echo $content; ?>
        </main>
    </div>
    
    <!-- Footer -->
    <footer class="flex justify-center border-t border-gray-700 font-light 
    text-center p-4 mt-4 text-gray-700 fixed bottom-0 inset-x-0 shadow-md">
        <p>&copy; <?php echo date('Y'); ?> by Mark Jerome Santos. All Rights Reserved</p>
    </footer>
</body>
</html>
