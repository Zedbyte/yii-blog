<div id="admin-menu" class="w-16 text-stone-950 flex flex-col items-center space-y-10 py-6 relative">
    <div class="font-semibold flex flex-col items-center">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/default-avatar.jpg" 
            alt="User Avatar" class="w-12 h-12 rounded-full">
        <?php echo CHtml::encode(Yii::app()->user->name); ?>
    </div>

    <a href="<?php echo CHtml::normalizeUrl(array('post/create')); ?>" class="group flex flex-col items-center">
        <i class="ph ph-plus-circle text-3xl group-hover:text-blue-400"></i>
        <span class="text-xs">New</span>
    </a>

    <!-- Dropdown Container (Position Fixed) -->
    <div class="relative">
        <button id="manage-btn" class="flex flex-col items-center focus:outline-none">
            <i class="ph ph-list text-3xl hover:text-blue-400"></i>
            <span class="text-xs text-center">Manage</span>
        </button>
        <div id="dropdown-menu" 
            class="absolute left-full top-0 ml-4 w-40 bg-white shadow-lg rounded-lg hidden border border-gray-200 z-50">
            <a href="<?php echo CHtml::normalizeUrl(array('post/admin')); ?>" 
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Manage Posts</a>
            <a href="<?php echo CHtml::normalizeUrl(array('comment/admin')); ?>" 
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Manage Comments</a>
        </div>
    </div>

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

<script>
document.addEventListener("DOMContentLoaded", function() {
    const manageBtn = document.getElementById("manage-btn");
    const dropdownMenu = document.getElementById("dropdown-menu");

    manageBtn.addEventListener("mouseenter", function() {
        dropdownMenu.classList.remove("hidden");
    });

    dropdownMenu.addEventListener("mouseleave", function() {
        dropdownMenu.classList.add("hidden");
    });

    document.addEventListener("click", function(event) {
        if (!manageBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add("hidden");
        }
    });
});
</script>
