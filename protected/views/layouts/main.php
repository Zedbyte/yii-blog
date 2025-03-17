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
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/output.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body class="dark:bg-stone-800 bg-[#f7f4ed] text-gray-700 dark:text-gray-200 h-[calc(100dvh)] flex flex-col">
    <!-- Top Navigation Bar -->
    <?php $currentRoute = Yii::app()->controller->id . '/' . Yii::app()->controller->action->id; ?>

    <nav class="border-b border-gray-500 relative top-0 w-full z-10 shadow-sm">
        <div class="w-11/12 mx-auto border-x border-gray-500 p-3">
            <div class="container mx-auto flex justify-center space-x-12">
                <?php 
                $routes = [
                    ['label' => 'Home', 'route' => '/site/index', 'icon' => 'ph-house'],
                    ['label' => 'About', 'route' => '/site/page', 'icon' => 'ph-info', 'params' => ['view' => 'about']],
                    ['label' => 'Contact', 'route' => '/site/contact', 'icon' => 'ph-phone'],
                    ['label' => 'Posts', 'route' => '/post', 'icon' => 'ph-pencil'],
                ];

                if (!Yii::app()->user->isGuest) {
                    $routes[] = ['label' => 'Comments', 'route' => '/comment', 'icon' => 'ph-chat'];
                    $routes[] = ['label' => 'Logout', 'route' => '/site/logout', 'icon' => 'ph-sign-out'];
                } else {
                    $routes[] = ['label' => 'Login', 'route' => '/site/login', 'icon' => 'ph-sign-in'];
                }

                foreach ($routes as $item):
                    $isActive = strpos($currentRoute, trim($item['route'], '/')) !== false;
                ?>
                    <a href="<?php echo Yii::app()->createUrl($item['route'], $item['params'] ?? []); ?>" 
                    class="flex flex-col items-center space-y-1 px-4 py-2 rounded-lg transition transform-3d
                            <?php echo $isActive ? 'bg-stone-900 text-gray-100 dark:bg-[#f7f4ed] dark:text-gray-800 shadow-md' : 
                            'text-gray-800 dark:text-gray-200 hover:bg-stone-300 hover:-translate-z-8 hover:translate-1 hover:rotate-z-2 hover:text-gray-600'; ?>">
                        <i class="ph <?php echo $item['icon']; ?> text-3xl"></i>
                        <span class="text-xs font-medium"><?php echo $item['label']; ?></span>
                    </a>
                <?php endforeach; ?>

                <div class="flex items-center space-x-4">
                    <button id="themeToggle" class="p-2 rounded-lg transition hover:bg-stone-300 dark:hover:text-stone-700">
                        <i id="themeIcon" class="ph ph-moon text-3xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="flex-1 w-full max-w-11/12 mx-auto border-x border-gray-500 flex overflow-y-auto">
        <!-- Main Content -->
        <main class="w-full flex-1 px-4 py-2">
            <?php if(isset($this->breadcrumbs)): ?>
                <nav class="text-sm text-gray-600 dark:text-gray-200 font-semibold">
                    <!-- <?php if(isset($this->breadcrumbs)):?>
                        <?php $this->widget('zii.widgets.CBreadcrumbs', array('links' => $this->breadcrumbs)); ?>
                    <?php endif?> -->
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                        'tagName' => 'ul',
                        'htmlOptions' => array('class' => 'flex space-x-2 items-center'),
                        'separator' => '<span class="text-gray-400 dark:text-gray-100">/</span>',
                        'homeLink' => CHtml::link(
                            '<i class="ph ph-house font-bold text-lg hover:text-blue-500"></i>', 
                            array('site/index'),
                            array('class' => 'flex items-center space-x-1')
                        ),
                        'activeLinkTemplate' => '<li><a href="{url}" class="text-blue-500 hover:underline">{label}</a></li>',
                        'inactiveLinkTemplate' => '<li class="text-gray-500 dark:text-gray-200">{label}</li>',
                    )); ?>
                </nav>
            <?php endif; ?>
            <?php echo $content; ?>
        </main>
    </div>
    
    <!-- Footer -->
    <footer class="w-full flex justify-center border-t border-gray-500 font-light 
    text-center text-gray-700 relative bottom-0 inset-x-0 shadow-md">
        <div class="w-11/12 p-4 border-x border-gray-500 dark:text-white">
            <p>&copy; <?php echo date('Y'); ?> by Mark Jerome Santos. All Rights Reserved</p>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const htmlRoot = document.documentElement;
            const button = document.querySelector('#themeToggle');

            // Apply the saved theme
            const savedTheme = localStorage.getItem('theme') || 'light';
            htmlRoot.classList.add(savedTheme);

            function toggleTheme() {
                htmlRoot.classList.toggle('dark');
                htmlRoot.classList.toggle('light');

                // Save the theme
                const newTheme = htmlRoot.classList.contains('dark') ? 'dark' : 'light';
                localStorage.setItem('theme', newTheme);
            }

            if (button) {
                button.addEventListener('click', toggleTheme);
            }
        });
    </script>
</body>
</html>
