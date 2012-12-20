An'ajax way to comment everything you want in your yii applications.

##Requirements

Yii 1.1 or above

##Install

First of all, create sensorario_comments table:

    CREATE TABLE IF NOT EXISTS `sensorario_comments` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `semantic_id` varchar(50) NOT NULL,
      `datetime` datetime NOT NULL,
      `user` varchar(50) NOT NULL,
      `comment` text NOT NULL,
      PRIMARY KEY (`id`)
    );

Second, add module SensorarioModuleComment in your config file.

#Install using github

To add SensorarioModuleComment using github, use this command:

$ git clone git@github.com:sensorario/SensorarioModuleComment

##Usage

When at any point of your website you want to bring up a series of comments, use this widget and indicates a semantic id that defines the thread of comments.

    <?php $this->widget('SensorarioModuleComment.CommentLoader', array('semanticId' => 'SEMANTIC_ID_OF_YOUR_COMMENT')); ?>

##Change Log

###v1.0 (December 16th, 2012) 
 - created extension