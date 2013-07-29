<div class="sensorario-comments-item"
     style="display: none;"
     id="sensorario-comment-id-<?php echo $comment->id; ?>">
    <div class="sensorario-comments-author">#<?php echo $comment->id; ?> - <?php echo $comment->user; ?></div>
    <div class="sensorario-comments-comment"><?php echo $comment->getEscapedComment(); ?></div>
    <div class="sensorario-comments-actions">
      <?php if ($isOwner) : ?>
          <a href="javascript:void(0);" style="display: none;" id="sensorario-comments-save-<?php echo $comment->id; ?>">save</a>
          <a href="javascript:void(0);" id="sensorario-comments-edit-<?php echo $comment->id; ?>">edit</a>
          <a href="javascript:void(0);" id="sensorario-comments-delete-<?php echo $comment->id; ?>">delete</a>
      <?php endif; ?>
    </div>
</div>
<script>
    $('#sensorario-comment-id-<?php echo $comment->id; ?>').slideDown();
</script>
<?php if ($isOwner) : ?>
    <?php $deleteLink = '/sensorariocomments/ajaxSensorarioComments/delete'; ?>
    <?php $urlDelete = Yii::app()->createUrl($deleteLink, array('thread' => $comment->thread)); ?>
    <?php $urlUpdate = Yii::app()->createUrl('/sensorariocomments/ajaxSensorarioComments/update'); ?>
    <script>
        var idCommento = '#sensorario-comment-id-<?php echo $comment->id; ?> .sensorario-comments-comment';
        $('#sensorario-comments-save-<?php echo $comment->id; ?>').on('click', function() {
            var idTextarea = '#sensorario-comments-update-<?php echo $comment->id; ?>';
            var content = $(idTextarea).val();
            $(idTextarea).wrap($('<div class="sensorario-comments-comment"></div>'));
            $(idTextarea).remove();
            $(idCommento).html(content);
            $('#sensorario-comments-edit-<?php echo $comment->id; ?>').fadeIn('slow');
            $('#sensorario-comments-delete-<?php echo $comment->id; ?>').fadeIn('slow');
            $('#sensorario-comments-save-<?php echo $comment->id; ?>').fadeOut('slow');
            $.post('<?php echo $urlUpdate; ?>', {
                id: <?php echo $comment->id; ?>,
                thread: '<?php echo $comment->thread; ?>',
                commento: content
            }, function(json) {
                if (json.success.toString() === 'false') {
                    alert(json.message);
                }
            }, 'json');
        });
        $('#sensorario-comments-edit-<?php echo $comment->id; ?>').on('click', function() {
            var content = $(idCommento).html();
            $(idCommento).wrap($('<textarea id="sensorario-comments-update-<?php echo $comment->id; ?>"></textarea>'));
            $('#sensorario-comments-update-<?php echo $comment->id; ?>').html(content);
            $('#sensorario-comments-edit-<?php echo $comment->id; ?>').fadeOut('slow');
            $('#sensorario-comments-delete-<?php echo $comment->id; ?>').fadeOut('slow');
            $('#sensorario-comments-save-<?php echo $comment->id; ?>').fadeIn('slow');
        });
        $('#sensorario-comments-delete-<?php echo $comment->id; ?>').on('click', function() {
            $.post('<?php echo $urlDelete; ?>', {
                id: <?php echo $comment->id; ?>,
                thread: '<?php echo $comment->thread; ?>'
            }, function(json) {
                if (json.success.toString() === 'false') {
                    alert(json.message);
                    if(json.errorCode.toString() === '2') {
                        $('#sensorario-comment-id-<?php echo $comment->id; ?>').slideUp('slow', function() {
                            $(this).remove();
                        });
                    }
                } else {
                    $('#sensorario-comments-comments-<?php echo $comment->thread; ?>').prepend(json.recente);
                    $('#sensorario-comment-id-<?php echo $comment->id; ?>').slideUp('slow', function() {
                        $(this).remove();
                    });
                }
                mostraNumeroCommenti('<?php echo $comment->thread; ?>');
            }, 'json');
        });
    </script>
<?php endif; ?>