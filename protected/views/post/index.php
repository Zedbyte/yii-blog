<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Posts',
);

$this->menu=array(
	array('label'=>'Create Post', 'url'=>array('create')),
	array('label'=>'Manage Post', 'url'=>array('admin')),
);
?>

<!-- TODOs (Added) -->
<?php if(!empty($_GET['tag'])): ?>
<h1 class="text-lg py-5 font-semibold">Posts Tagged with <span class="font-bold text-blue-500 italic"><?php echo CHtml::encode($_GET['tag']); ?></span></h1>
<?php endif; ?>

<!-- TODOs (Modified) -->
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'template'=>"{items}\n{pager}", //Added
    'pager' => array(
        'header' => '', // Removes "Go to page" text
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last',
    ),
)); ?>
