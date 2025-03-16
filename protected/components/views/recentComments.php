<ul class="space-y-4">
    <?php foreach($this->getRecentComments() as $comment): ?>
    <li class="bg-[#fffef7] border border-stone-300 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center space-x-3">
            <i class="ph ph-user-circle text-xl text-blue-500"></i>
            <span class="font-semibold text-stone-700"><?php echo CHtml::encode($comment->author); ?></span>
        </div>
        <p class="text-sm text-stone-600 mt-1">
            commented on  
            <a href="<?php echo $comment->getUrl(); ?>" class="text-blue-500 hover:underline font-medium">
                <?php echo CHtml::encode($comment->post->title); ?>
            </a>
        </p>
    </li>
    <?php endforeach; ?>
</ul>