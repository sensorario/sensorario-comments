<div class="sensorario-comments-item"
     style="display: none;"
     id="sensorario-comment-id-<?php echo $comment->id; ?>">
    <div class="sensorario-comments-author">#<?php echo $comment->id; ?> - <?php echo $comment->user; ?></div>
    <div class="sensorario-comments-comment"><?php echo $comment->comment; ?></div>
    <?php if ($comment->user === Yii::app()->user->name) : ?>
        <a href="javascript:void(0);" id="sensorario-comments-delete-<?php echo $comment->id; ?>">delete</a>
    <?php endif; ?>
</div>
<script>
    $('#sensorario-comment-id-<?php echo $comment->id; ?>').slideDown();
</script>
<?php if ($comment->user === Yii::app()->user->name) : ?>
    <?php $deleteLink = '/sensorariocomments/ajaxSensorarioComments/delete'; ?>
    <?php $urlDelete = Yii::app()->createUrl($deleteLink, array('thread' => $comment->thread)); ?>
    <script>
        $('#sensorario-comments-delete-<?php echo $comment->id; ?>').on('click', function() {
            $.post('<?php echo $urlDelete; ?>', {
                id: <?php echo $comment->id; ?>
            }, function(json) {
                if (json.success.toString() === 'false') {
                    alert(json.message);
                } else {
                    $('#sensorario-comment-id-<?php echo $comment->id; ?>').slideUp('slow', function() {
                        $(this).remove();
                    });
                    mostraNumeroCommenti('<?php echo $comment->thread; ?>');
                }
            }, 'json');
        });
    </script>
<?php endif; ?>