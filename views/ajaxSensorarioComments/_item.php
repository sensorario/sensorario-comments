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
<?php if ($comment->user === Yii::app()->user->name) : ?>
    <?php
    $ajaxLinkController = '/sensorariocomments/ajaxSensorarioComments/';
    $urlDelete = Yii::app()->createUrl($ajaxLinkController . 'delete', array('thread' => $comment->thread))
    ?>
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
<?php endif; ?>
</script>