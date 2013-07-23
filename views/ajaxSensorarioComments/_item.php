<div class="sensorario-comments-item"
     style="display: none;"
     id="sensorario-comment-id-<?php echo $comment->id; ?>">
    <div class="sensorario-comments-author">#<?php echo $comment->id; ?> - <?php echo $comment->user; ?></div>
    <div class="sensorario-comments-comment"><?php echo $comment->comment; ?></div>
    <a href="javascript:void(0);" id="sensorario-comments-delete-<?php echo $comment->id; ?>">delete</a>
</div>
<?php
$ajaxLinkController = '/sensorariocomments/ajaxSensorarioComments/';
$urlDelete = Yii::app()->createUrl($ajaxLinkController . 'delete', array('thread' => $comment->thread))
?>
<script>
    $('#sensorario-comment-id-<?php echo $comment->id; ?>').slideDown();
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