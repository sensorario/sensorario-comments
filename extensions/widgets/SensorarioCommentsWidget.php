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
    
    public $assetImage;

    /**
     * Init method.
     */
    public function init()
    {

        Yii::app()->getClientScript()->registerCoreScript('jquery');

        $ajaxLinkController = '/sensorariocomments/ajaxSensorarioComments/';

        $varPath = 'var url_path = "' . Yii::app()->createUrl($ajaxLinkController . 'save', array('thread' => $this->thread)) . '";' . "\n";
        $urlStats = 'var url_stats = "' . Yii::app()->createUrl($ajaxLinkController . 'stats', array('thread' => $this->thread)) . '";' . "\n";
        $urlLatest = 'var url_latests = "' . Yii::app()->createUrl($ajaxLinkController . 'latest', array('thread' => $this->thread)) . '";' . "\n";
        
        Yii::app()->getClientScript()->registerScript('url_path', "\n{$varPath} {$urlStats} {$urlLatest}", CClientScript::POS_HEAD);

        $fileComments = __DIR__ . '/sensorario-comments.js';
        Yii::app()->getClientScript()->registerScript('sensorario-comments', file_get_contents($fileComments), CClientScript::POS_HEAD);
        
        $fileFunctions = __DIR__ . '/sensorario-comments-functions.js';
        Yii::app()->getClientScript()->registerScript('sensorario-comments-functions', file_get_contents($fileFunctions), CClientScript::POS_HEAD);
        
        $image = __DIR__ . '/images/ajax-loader.gif';
        $this->assetImage = Yii::app()->getAssetManager()->publish($image);

    }

    /**
     * Run method.
     */
    public function run()
    {

        $this->render('sensorario-comments');

    }

}
