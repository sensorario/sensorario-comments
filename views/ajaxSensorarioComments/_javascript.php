<script>
    $('#sensorario-comment-id-<?php echo $comment->id; ?>').slideDown();
</script>
<?php if ($isOwner) : ?>
    <?php $deleteLink = '/sensorariocomments/ajaxSensorarioComments/delete'; ?>
    <?php $urlDelete = Yii::app()->createUrl($deleteLink, array('thread' => $comment->thread)); ?>
    <?php $urlUpdate = Yii::app()->createUrl('/sensorariocomments/ajaxSensorarioComments/update'); ?>
    <script>
        var idCommento_<?php echo $comment->id; ?> = '#sensorario-comment-id-<?php echo $comment->id; ?> .sensorario-comments-comment';
        $('#sensorario-comments-save-<?php echo $comment->id; ?>').on('click', function() {
            var idTextarea = '#sensorario-comments-update-<?php echo $comment->id; ?>';
            var content = $(idTextarea).val();
            $(idTextarea).wrap($('<div class="sensorario-comments-comment"></div>'));
            $(idTextarea).remove();
            $(idCommento_<?php echo $comment->id; ?>).html(content);
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
            var content = $(idCommento_<?php echo $comment->id; ?>).html();
            var textarea = $('<textarea id="sensorario-comments-update-<?php echo $comment->id; ?>"></textarea>');
            $(idCommento_<?php echo $comment->id; ?>).wrap(textarea);
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
                $('#sensorario-comment-id-<?php echo $comment->id; ?>').slideUp('slow', function() {
                    $(this).remove();
                });
                mostraNumeroCommenti('<?php echo $comment->thread; ?>');
            }, 'json');
        });
    </script>
<?php endif; ?>