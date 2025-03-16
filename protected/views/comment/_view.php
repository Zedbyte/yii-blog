<?php
/* @var $this CommentController */
/* @var $data Comment */
?>

<div class="bg-[#fffef7] pt-3 pb-6 px-6 rounded-lg shadow-md border border-gray-300 w-3xl mx-auto mb-5">

    <div class="flex justify-end mb-5">
        <a href="<?php echo CHtml::normalizeUrl(array('view', 'id' => $data->id)); ?>" 
        class="text-stone-500 hover:text-stone-700 transition-all flex items-center space-x-1">
            <span class="text-sm">View More</span>
            <i class="ph ph-arrow-right text-xl"></i>
        </a>
    </div>


    <!-- <b><?php echo CHtml::encode($data->getAttributeLabel('post_id')); ?>:</b>
    <?php echo CHtml::encode($data->post_id); ?>
    <br /> -->

    <!-- Comment Metadata -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold text-gray-800">Comment No. <?php echo CHtml::encode($data->id); ?></h2>

        <span class="text-sm px-3 py-1 rounded-full 
            <?php echo ($data->status == '2') ? 'bg-green-500 text-white' : 'bg-yellow-500 text-white'; ?>">
			<?php 
				if ($data->status == 1) {
					echo CHtml::encode("Pending");
				}
				else if ($data->status == 2) {
					echo CHtml::encode("Approved");
				}
				else {
					echo CHtml::encode("Error");
				}
			?>
        </span>
    </div>

    <!-- Comment Content -->
    <p class="text-gray-700 mb-4 border-l-4 border-blue-500 pl-4">
        "<?php echo CHtml::encode($data->content); ?>"
    </p>

    <!-- Comment Details -->
    <div class="text-sm text-gray-600 mb-4">
        <p><strong>Author:</strong> <?php echo CHtml::encode($data->author); ?></p>
        <p><strong>Email:</strong> <a href="mailto:<?php echo CHtml::encode($data->email); ?>" class="text-blue-500 hover:underline">
            <?php echo CHtml::encode($data->email); ?>
        </a></p>
        <?php if (!empty($data->url)): ?>
            <p><strong>Website:</strong> <a href="<?php echo CHtml::encode($data->url); ?>" target="_blank" class="text-blue-500 hover:underline">
                <?php echo CHtml::encode($data->url); ?>
            </a></p>
        <?php endif; ?>
        <p><strong>Submitted on:</strong> <?php echo CHtml::encode(date('F j, Y, g:i a', $data->create_time));  ?></p>
    </div>

    <!-- Approval Actions -->
    <div class="flex justify-end space-x-2">
        <?php echo CHtml::beginForm(array('approve', 'id'=>$data->id), 'post'); ?>
            <?php echo CHtml::submitButton('Approve', array(
                'class'=>'bg-stone-800 text-white px-4 py-2 rounded-lg hover:bg-stone-700 transition-all'
            )); ?>
        <?php echo CHtml::endForm(); ?>

        <?php echo CHtml::beginForm(array('delete', 'id' => $data->id), 'post', array(
            'onsubmit' => "return confirm('Are you sure you want to delete this comment?');"
        )); ?>
            <?php echo CHtml::submitButton('Delete', array(
                'class' => 'bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-all'
            )); ?>
        <?php echo CHtml::endForm(); ?>
    </div>
</div>



<?php
/* @var $this CommentController */
/* @var $data Comment */
?>

<!-- <div class="view">

	<b><?php //echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php //echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php //echo CHtml::encode($data->content); ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php //echo CHtml::encode($data->status); ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php //echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
	<?php //echo CHtml::encode($data->author); ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php //echo CHtml::encode($data->email); ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php //echo CHtml::encode($data->url); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('post_id')); ?>:</b>
	<?php echo CHtml::encode($data->post_id); ?>
	<br />

	*/ ?>

</div> -->