<?php
/* @var $this PostController */
/* @var $model Post */

// $this->breadcrumbs=array(
// 	'Posts'=>array('index'),
// 	'Manage',
// );

// $this->menu=array(
// 	array('label'=>'List Post', 'url'=>array('index')),
// 	array('label'=>'Create Post', 'url'=>array('create')),
// );

// Yii::app()->clientScript->registerScript('search', "
// $('.search-button').click(function(){
// 	$('.search-form').toggle();
// 	return false;
// });
// $('.search-form form').submit(function(){
// 	$('#post-grid').yiiGridView('update', {
// 		data: $(this).serialize()
// 	});
// 	return false;
// });
// ");
?>


<?php

/**
 * 
 * TODOs (Added)
 * 
 */

	// $this->breadcrumbs=array(
	// 	'Manage Posts',
	// );
?>

<!-- <h1>Manage Posts</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p> -->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!-- <div /class="search-form" style="display:none"> -->
<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
<!-- </div> search-form -->

<!-- TODOs (Modified) -->

<!-- <?php //$this->widget('zii.widgets.grid.CGridView', array(
	// 'id'=>'post-grid',
	// 'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	// 'columns'=>array(
	// 	'id',
	// 	'title',
	// 	'content',
	// 	'tags',
	// 	'status',
	// 	'create_time',
	// 	/*
	// 	'update_time',
	// 	'author_id',
	// 	*/
	// 	array(
	// 		'class'=>'CButtonColumn',
	// 	),
	// ),
//)); ?> -->


<?php //$this->widget('zii.widgets.grid.CGridView', array(
    // 'dataProvider'=>$model->search(),
    // 'filter'=>$model,
    // 'columns'=>array(
    //     array(
    //         'name'=>'title',
    //         'type'=>'raw',
    //         'value'=>'CHtml::link(CHtml::encode($data->title), $data->url)'
    //     ),
    //     array(
    //         'name'=>'status',
    //         'value'=>'Lookup::item("PostStatus",$data->status)',
    //         'filter'=>Lookup::items('PostStatus'),
    //     ),
    //     array(
    //         'name'=>'create_time',
    //         'type'=>'datetime',
    //         'filter'=>false,
    //     ),
    //     array(
    //         'class'=>'CButtonColumn',
    //     ),
    // ),
//)); ?>


<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs = array('Manage Posts');

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#post-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<div class="w-4xl mx-auto bg-[#f7f4ed] dark:bg-stone-900 border border-gray-300 dark:border-stone-600 shadow-lg rounded-lg p-6 mt-6">
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Manage Posts</h1>

    <!-- <p class="text-gray-700 text-sm mb-4">
        You may enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>, <b>=</b>)
        at the beginning of each search value.
    </p> -->

    <!-- Search Button -->
    <?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button bg-gray-700 dark:bg-[#f7f4ed] dark:hover:bg-[#e0dccb] text-white dark:text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-800 transition-all')); ?>
    
    <div class="search-form mt-4 hidden">
        <?php $this->renderPartial('_search', array('model'=>$model)); ?>
    </div>
    <!-- Data Grid -->
    <div class="overflow-x-auto mt-6">
        <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'post-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            //'itemsCssClass' => 'w-full border border-gray-300 text-left text-gray-800 dark:text-gray-100 rounded-lg overflow-hidden',
            'columns' => array(
                array(
                    'name' => 'title',
                    'type' => 'raw',
                    'value' => 'CHtml::link(CHtml::encode($data->title), $data->url, array("class"=>"text-blue-500 hover:underline"))'
                ),
                array(
					'name' => 'status',
					'value' => 'Lookup::item("PostStatus", $data->status)',
					'filter' => Lookup::items('PostStatus'),
					'htmlOptions' => array('class' => 'font-semibold'),
					'cssClassExpression' => '$data->status === 3 ? "text-gray-500" : ($data->status === 2 ? "text-green-500" : "text-yellow-500")',
				),
                array(
					'name' => 'create_time',
					'value' => 'date("F d, Y h:i A", $data->create_time)',
					'filter' => false,
				),
                array(
                    'class' => 'CButtonColumn',
                    // 'htmlOptions' => array('class' => 'px-4 py-2 text-center flex gap-5'),
                    // 'template' => '{update} {delete}',
                    // 'buttons' => array(
                    //     'update' => array(
                    //         'label' => '',
                    //         'imageUrl' => false,
                    //         'options' => array('class' => 'ph ph-pencil text-green-500 hover:underline'),
                    //     ),
                    //     'delete' => array(
                    //         'label' => '',
                    //         'imageUrl' => false,
                    //         'options' => array('class' => 'ph ph-trash text-red-500 hover:underline'),
                    //     ),
                    // ),
                ),
            ),
        )); ?>
    </div>
</div>
