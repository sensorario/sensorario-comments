<div class="sensorario-comments-item"
     style="display: none;"
     id="sensorario-comment-id-<?php echo $comment->id;?>">
    <div class="sensorario-comments-author"><?php echo $comment->getDate();?> <strong><?php echo $comment->user;?></strong> wrote:</div>
    <div class="sensorario-comments-comment"><?php echo $comment->getEscapedComment();?></div>
    <div class="sensorario-comments-actions">
        <?php if ($isOwner) :?>
            <a href="javascript:void(0);" style="display: none;" id="sensorario-comments-save-<?php echo $comment->id;?>">save</a>
            <a href="javascript:void(0);" id="sensorario-comments-edit-<?php echo $comment->id;?>">edit</a>
            <a href="javascript:void(0);" id="sensorario-comments-delete-<?php echo $comment->id;?>">delete</a>
        <?php endif;?>
    </div>
</div>
<?php

$this->renderPartial('_javascript', array(
  'comment' => $comment,
  'isOwner' => $isOwner
));

?>