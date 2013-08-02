[torna all'indice](https://github.com/sensorario/sensorario-comments/blob/master/readme.md)

## Tricks

### More comments in the same page

With php < 5.4

    <?php $this->widget('SensorarioCommentsWidget', array('thread'=>'1234567890')); ?>
    <?php $this->widget('SensorarioCommentsWidget', array('thread'=>'765785')); ?>

Starting from php 5.4

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

    <?php $this->widget('SensorarioCommentsWidget', array('thread'=>'1234567890')); ?>