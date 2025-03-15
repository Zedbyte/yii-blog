<?php foreach ($comments as $comment): ?>
    <div class="comment">
        <strong><?php echo CHtml::encode($comment->author); ?></strong>
        <p><?php echo CHtml::encode($comment->content); ?></p>
    </div>
<?php endforeach; ?>
