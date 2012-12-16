An'ajax way to comment everything you want in yii applications. Any comments just depends on a "semanticId".

##Requirements

Yii 1.1 or above

##Usage

Just add module "SensorarioModuleComment" in your config file. And then, with "SensorarioModuleComment.CommentLoader" widget, you'll can load all comments for SEMANTIC_ID_OF_YOUR_COMMENT id. Substitute "SEMANTIC_ID_OF_YOUR_COMMENT" with what you prefer, and put this code:

    <?php $this->widget('SensorarioModuleComment.CommentLoader', array('semanticId' => 'SEMANTIC_ID_OF_YOUR_COMMENT')); ?>

where you want to see comments.
