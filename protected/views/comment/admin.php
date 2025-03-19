<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Comment', 'url'=>array('index')),
	array('label'=>'Create Comment', 'url'=>array('create')),
);

// Yii::app()->clientScript->registerScript('search', "
// $('.search-button').click(function(){
// 	$('.search-form').toggle();
// 	return false;
// });
// $('.search-form form').submit(function(){
// 	$('#comment-grid').yiiGridView('update', {
// 		data: $(this).serialize()
// 	});
// 	return false;
// });
// ");
?>

<!-- <h1>Manage Comments</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p> -->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!-- <div class="search-form" style="display:none"> -->
<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
<!--</div> search-form -->

<?php //$this->widget('zii.widgets.grid.CGridView', array(
	// 'id'=>'comment-grid',
	// 'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	// 'columns'=>array(
	// 	'id',
	// 	'content',
	// 	'status',
	// 	'create_time',
	// 	'author',
	// 	'email',
	// 	/*
	// 	'url',
	// 	'post_id',
	// 	*/
	// 	array(
	// 		'class'=>'CButtonColumn',
	// 	),
	// ),
//)); ?>

<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs = array('Manage Comments');

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#comment-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<div class="w-5xl mx-auto bg-[#f7f4ed] dark:bg-stone-900 border border-gray-300 dark:border-stone-600 shadow-lg rounded-lg p-6 mt-6">
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Manage Comments</h1>

    <!-- Search Button -->
    <?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button bg-gray-700 dark:bg-[#f7f4ed] dark:hover:bg-[#e0dccb] text-white dark:text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-800 transition-all')); ?>

    <div class="search-form mt-4 hidden">
        <?php $this->renderPartial('_search', array('model'=>$model)); ?>
    </div>

    <!-- Data Grid -->
    <div class="overflow-x-auto mt-6">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'comment-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'itemsCssClass' => 'w-full border border-gray-300 text-gray-500 rounded-lg table-fixed',
            'htmlOptions' => array('class' => 'shadow-lg rounded-lg'), 
            'rowCssClass' => array('bg-white dark-bg-admin-primary', 'bg-gray-100 dark-bg-admin-secondary'), // Alternating row colors
            'columns' => array(
                array(
                    'name' => 'id',
                    'htmlOptions' => array('class' => 'px-4 py-3 border-b border-gray-300 text-center font-medium'),
                ),
                array(
                    'name' => 'content',
                    'type' => 'raw',
                    'value' => 'CHtml::encode($data->content)',
                    'htmlOptions' => array('class' => 'px-4 py-3 border-b border-gray-300'),
                ),
                array(
                    'name' => 'status',
                    'value' => 'Lookup::item("CommentStatus", $data->status)',
                    // 'filter' => Lookup::items('CommentStatus'),
                    'filter' => false,
                    'htmlOptions' => array('class' => 'px-4 py-3 border-b border-gray-300 font-semibold text-center'),
                    'cssClassExpression' => '$data->status === 3 ? "text-gray-500" : ($data->status === 2 ? "text-green-600" : "text-yellow-600")',
                ),
                array(
                    'name' => 'create_time',
                    'value' => 'date("F d, Y h:i A", $data->create_time)',
                    'filter' => false,
                    'htmlOptions' => array('class' => 'px-4 py-3 border-b border-gray-300 text-sm text-center'),
                ),
                array(
                    'name' => 'author',
                    'htmlOptions' => array('class' => 'px-4 py-3 border-b border-gray-300 font-medium text-center'),
                ),
                array(
                    'header' => 'Actions',
                    'class' => 'CButtonColumn',
                    'htmlOptions' => array('class' => 'px-4 py-3 border-b border-gray-300 text-center space-x-5'),
                    'template' => '{update} {delete}',
                    'buttons' => array(
                        'update' => array(
                            'label' => '<i class="ph ph-pencil"></i>',
                            'imageUrl' => false,
                            'encodeLabel' => false,
                            'options' => array('class' => 'text-green-600'),
                        ),
                        'delete' => array(
                            'label' => '<i class="ph ph-trash "></i>',
                            'imageUrl' => false,
                            'encodeLabel' => false,
                            'options' => array('class' => 'text-red-600'),
                        ),
                    ),
                ),
            ),
			//$this->widget('zii.widgets.grid.CGridView', array(
	// 'id'=>'comment-grid',
	// 'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	// 'columns'=>array(
	// 	'id',
	// 	'content',
	// 	'status',
	// 	'create_time',
	// 	'author',
	// 	'email',
	// 	/*
	// 	'url',
	// 	'post_id',
	// 	*/
	// 	array(
	// 		'class'=>'CButtonColumn',
	// 	),
	// ),
        )); ?>
    </div>
</div>
