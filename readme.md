# Install

 - Database schema
 - Config file
 - Usage
 - Tricks

## Database schema

    CREATE TABLE `sensorario_comments` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `thread` varchar(50) NOT NULL,
        `comment` text,
        `user` varchar(11) NOT NULL,
        PRIMARY KEY (`id`)
    );

## Config file

    return array(
        ....
        'modules'=>array(
             'sensorariocomments',
             ...
        ),
        ....
    );

## Usage

    <?php $this->widget('application.modules.sensorariocomments.extensions.widgets.SensorarioCommentsWidget', [
        'thread'=>'1234567890']
    ); ?>

## Tricks

For an easiest way to use this widget add this stuff to import in config file

    return array(
        ....
        'import' => array(
            ....
            'application.modules.sensorariocomments.extensions.widgets.SensorarioCommentsWidget'
        ),
        ....
    );

and after that, you could load widget in this way:

    <?php $this->widget('SensorarioCommentsWidget', ['thread'=>'1234567890']); ?>
