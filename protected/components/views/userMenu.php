<div id="admin-menu" class="sticky left-0 top-0 h-fit w-16 text-stone-950 flex flex-col items-center space-y-10 py-6">
        <div class="font-semibold flex flex-col items-center">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/default-avatar.jpg" 
                alt="User Avatar" class="w-12 h-12 rounded-full">
			<?php echo CHtml::encode(Yii::app()->user->name); ?>
		</div>
        <a href="<?php echo CHtml::normalizeUrl(array('post/create')); ?>" class="group flex flex-col items-center">
            <i class="ph ph-plus-circle text-3xl group-hover:text-blue-400"></i>
            <span class="text-xs">New</span>
        </a>
        <a href="<?php echo CHtml::normalizeUrl(array('post/admin')); ?>" class="group flex flex-col items-center">
            <i class="ph ph-list text-3xl group-hover:text-blue-400"></i>
            <span class="text-xs">Manage</span>
        </a>
        <a href="<?php echo CHtml::normalizeUrl(array('comment/index')); ?>" class="group flex flex-col items-center relative">
            <i class="ph ph-chat-circle-dots text-3xl group-hover:text-blue-400"></i>
            <span class="text-xs text-center">Approve</span>
            <?php $pendingCount = Comment::model()->pendingCommentCount; ?>
            <?php if ($pendingCount > 0) { ?>
                <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-semibold px-1.5 py-0.5 rounded-full">
                    <?php echo $pendingCount; ?>
                </span>
            <?php } ?>
        </a>
        <a href="<?php echo CHtml::normalizeUrl(array('site/logout')); ?>" class="group flex flex-col items-center">
            <i class="ph ph-sign-out text-3xl group-hover:text-red-400"></i>
            <span class="text-xs">Logout</span>
        </a>
    </div>