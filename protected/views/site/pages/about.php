<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name . ' - About';
// $this->breadcrumbs = array('About');
?>

<div class="w-full h-full flex flex-col justify-between items-center text-center p-10">
    <!-- Left Column: About Text -->
    <div class="text-left space-y-6 md:space-y-8 lg:space-y-10 flex flex-col items-center">
		<h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-7xl font-bold text-black font-playpen text-center">
            About
        </h1>
        <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-9xl font-bold text-black font-rampart text-center">
            Angeles <br/> Secret Files
        </h1>
        <p class="text-lg sm:text-xl md:text-2xl text-gray-900 font-playpen max-w-5xl text-center">
            Welcome to <strong>Angeles Secret Files</strong>—a place where knowledge thrives.
            Here, you can explore, discuss, and contribute valuable insights.
        </p>
        <p class="text-base sm:text-lg md:text-xl text-gray-700 text-center">
			Connect with me and explore my projects! Follow me on GitHub at
            <code class="bg-stone-600 px-2 py-1 rounded text-md text-gray-200">https://github.com/zedbyte</code>.
        </p>
        <a href="<?php echo Yii::app()->createUrl('/site/index'); ?>" 
           class="bg-stone-900 text-white px-6 sm:px-8 md:px-10 py-2 sm:py-3 rounded-full text-base sm:text-lg md:text-xl 
                  hover:bg-gray-700 transition font-semibold">
            Back to Home
        </a>
    </div>
</div>
