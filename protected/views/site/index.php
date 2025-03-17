<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full h-full items-center text-center px-10">
    <!-- Left Column: Text and Button -->
    <div class="text-left space-y-6 md:space-y-8 lg:space-y-10">
        <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-9xl font-bold text-black dark:text-[#f7f4ed] text-nowrap font-rampart">
            Angeles<br />Secret Files
        </h1>
        <p class="text-lg sm:text-xl md:text-2xl text-gray-900 font-playpen dark:text-[#f7f4ed]">
            A place to read, write, and laugh out loud.
        </p>
        <a href="/post" class="bg-stone-900 text-white dark:bg-[#f7f4ed] dark:text-stone-800 dark:hover:bg-[#e0dccb] px-6 sm:px-8 md:px-10 py-2 sm:py-3 rounded-full text-base sm:text-lg md:text-xl 
            hover:bg-gray-700 transition font-semibold">
            Start Reading
        </a>
    </div>

    
    <!-- Right Column: SVG Placeholder -->
    <div class="flex justify-center h-full items-center">
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/online_discussion.svg" 
            alt="Random Thoughts" 
            class="w-[25em] md:w-[40em] lg:w-[60em] max-w-full h-auto object-contain">
    </div>
</div>


<div class="mt-36">
    <h2 class="text-2xl font-bold mb-4">Latest Posts</h2>
        <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'//post/_view',
        'template'=>"{items}\n{pager}", //Added
        'pager' => array(
            'header' => '', // Removes "Go to page" text
            'firstPageLabel' => 'First',
            'lastPageLabel' => 'Last',
        ),
    )); ?>
</div>


