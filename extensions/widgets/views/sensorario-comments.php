<div class="sensorario-comments" id="sensorario-comments-thread-<?php echo $thread;?>">
    <div id="sensorario-comments-stats-<?php echo $thread;?>"></div>
    <div id="sensorario-comments-comments-<?php echo $thread;?>">
        <img src="<?php echo $assetImage;?>" id="sensorario-comment-ajax-loader" />
    </div>
    <?php if (!Yii::app()->user->isGuest) :?>
        <div id="sensorario-comments-form-<?php echo $thread;?>">
            <textarea id="sensorario-comments-textarea-<?php echo $thread;?>"></textarea>
        </div>
    <?php else :?>
        <script>
            removeGifLoader();
        </script>
        <em><?php echo Yii::t('SensorariocommentsModule.app', 'To leave a comment, you must be logged in.');?></em>
    <?php endif;?>
</div>

