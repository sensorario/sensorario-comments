<div class="sensorario-comments" id="sensorario-comments-thread-<?php echo $this->thread;?>">
    <div id="sensorario-comments-stats-<?php echo $this->thread;?>"></div>
    <div id="sensorario-comments-comments-<?php echo $this->thread;?>">
        <img src="<?php echo $this->assetImage;?>" id="sensorario-comment-ajax-loader" />
    </div>
    <?php if (!Yii::app()->user->isGuest) :?>
        <div id="sensorario-comments-form-<?php echo $this->thread;?>">
            <textarea id="sensorario-comments-textarea-<?php echo $this->thread;?>"></textarea>
        </div>
    <?php else :?>
        <script>
            removeGifLoader();
        </script>
        <em><?php echo Yii::t('SensorariocommentsModule.app', 'To leave a comment, you must be logged in.');?></em>
    <?php endif;?>
</div>

