<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="flex justify-center pt-5">
    <div class="bg-[#fffef7] shadow-md rounded-lg pt-3 px-6 pb-6 mb-6 w-2xl border border-stone-300 relative">

		<div class="flex justify-end">
			<!-- View More Icon -->
			<a href="<?php echo CHtml::normalizeUrl(array('/post/view', 'id' => $data->id)); ?>" 
			class="text-stone-500 hover:text-stone-700 transition-all flex items-center space-x-1">
				<span class="text-sm">View More</span>
				<i class="ph ph-arrow-right text-xl"></i>
			</a>
		</div>

        <!-- Post Header -->
        <div class="flex items-center space-x-4">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/default-avatar.jpg" 
                 alt="User Avatar" class="w-12 h-12 rounded-full">
            <div>
                <h3 class="font-bold text-lg">
                    <?php echo CHtml::encode($data->author->username); ?>
                </h3>
                <p class="text-gray-500 text-sm">
                    <?php echo date('F j, Y, g:i a', $data->create_time); ?>
                </p>
            </div>
        </div>

        <!-- Post Title -->
        <h2 class="text-xl font-semibold mt-4 font-playpen">
            <?php echo CHtml::encode($data->title); ?>
        </h2>

        <!-- Post Content -->
        <p class="mt-2 text-gray-900">
            <?php echo nl2br(CHtml::encode($data->content)); ?>
        </p>

        <!-- Post Image (if exists) -->
        <?php if (!empty($data->image_url)): ?>
            <div class="mt-4">
                <img src="<?php echo Yii::app()->request->baseUrl . '/uploads/' . $data->image_url; ?>" 
                     alt="Post Image" class="rounded-lg w-full object-cover max-h-96">
            </div>
        <?php endif; ?>

        <!-- Tags -->
        <div class="mt-3 text-sm text-gray-600 w-fit">
			<span class="py-1 px-2 flex space-x-1 rounded-2xl bg-stone-700">
				<i class="ph ph-tag text-sm text-white"></i>
				<p class="text-xs font-semibold text-white"><?php echo CHtml::encode($data->tags); ?></p>
			</span>
        </div>

        <!-- Comment Section -->
        <div class="mt-6">
            <button onclick="toggleComments(<?php echo $data->id; ?>)" 
                    class="text-stone-900 font-semibold flex items-center space-x-2 hover:underline">
                <i class="ph ph-chat-circle text-lg"></i>
                <span>View Comments</span>
            </button>
            <div id="comments-<?php echo $data->id; ?>" class="hidden mt-4">
                <?php if (!empty($data->comments)): ?>
                    <?php foreach ($data->comments as $comment): ?>
                        <div class="border-t pt-2 mt-2 text-sm">
                            <strong><?php echo CHtml::encode($comment->author); ?>:</strong>
                            <p>
                                <?php if (!Yii::app()->user->isGuest): // Check if user is logged in ?>
                                    <?php echo CHtml::link(
                                        CHtml::encode($comment->content),
                                        array('comment/view', 'id' => $comment->id),
                                        array('class' => 'hover:underline') // Styled link
                                    ); ?>
                                <?php else: ?>
                                    <?php echo CHtml::encode($comment->content); // Show plain text for guests ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-gray-500 text-sm">No comments yet.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleComments(postId) {
        let commentsDiv = document.getElementById("comments-" + postId);
        commentsDiv.classList.toggle("hidden");
    }
</script>

<!-- Include Phosphor Icons -->
<!-- <script src="https://unpkg.com/@phosphor-icons/web"></script> -->
