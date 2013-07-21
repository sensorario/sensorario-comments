<?php

/**
 * Widget that show comments in view page.
 * 
 * @package Sensorario\Modules\SensorarioComments\Extensions\Widgets
 */
class SensorarioCommentsWidget extends CWidget
{

    /**
     * This string identify an entire thread of comments.
     *
     * @var string
     */
    public $thread;

    /**
     * Init method.
     */
    public function init()
    {

        Yii::app()->getClientScript()->registerCoreScript('jquery');

        $file = __DIR__ . '/sensorario-comments.js';
        $javascript = Yii::app()->getAssetManager()->publish($file);
        $ajaxLinkController = '/sensorariocomments/ajaxSensorarioComments/';

        Yii::app()->getClientScript()->registerScriptFile($javascript);

        $varPath = 'var url_path = "' . Yii::app()->createUrl($ajaxLinkController . 'save', array('thread' => $this->thread)) . '";' . "\n";
        $urlStats = 'var url_stats = "' . Yii::app()->createUrl($ajaxLinkController . 'stats', array('thread' => $this->thread)) . '";' . "\n";
        $urlLatest = 'var url_latests = "' . Yii::app()->createUrl($ajaxLinkController . 'latest', array('thread' => $this->thread)) . '";' . "\n";
        Yii::app()->getClientScript()->registerScript('url_path', "\n{$varPath} {$urlStats} {$urlLatest}", CClientScript::POS_HEAD);

    }

    /**
     * Run method.
     */
    public function run()
    {

        $this->render('sensorario-comments');

    }

}
