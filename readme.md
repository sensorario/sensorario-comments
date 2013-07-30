# Index

 - [Database schema](https://github.com/sensorario/sensorariocomments#database-schema)
 - [Config file](https://github.com/sensorario/sensorariocomments#config-file)
 - [Usage](https://github.com/sensorario/sensorariocomments#usage)
 - [Tricks](https://github.com/sensorario/sensorariocomments#tricks)
 - [Install from github](https://github.com/sensorario/sensorariocomments#install-from-github)
 - [How to contribute](https://github.com/sensorario/sensorariocomments/tree/master/doc/collaborate.md)

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

### More comments in the same page

    <?php $this->widget('SensorarioCommentsWidget', ['thread'=>'1234567890']); ?>
    <?php $this->widget('SensorarioCommentsWidget', ['thread'=>'765785']); ?>

### Easiest usage

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

## Install from github

    $ cd protected/extensions/
    $ git clone git@github.com:sensorario/sensorariocomments.git
