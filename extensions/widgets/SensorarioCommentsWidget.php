<?php

/**
 * @package Sensorario\Modules\SensorarioComments\Extensions\Widgets
 */
class SensorarioCommentsWidget extends CWidget
{

    public $thread;

    public function init () {

        Yii::app ()->getClientScript ()->registerCoreScript ('jquery');

        $file = __DIR__ . '/sensorario-comments.js';
        $javascript = Yii::app ()->getAssetManager ()->publish ($file);
        $ajaxLinkController = '/sensorariocomments/ajaxSensorarioComments/';

        Yii::app ()->getClientScript ()->registerScriptFile ($javascript);

        Yii::app ()->getClientScript ()->registerScript ('url_path', "\n"
                . 'var url_path = "' . Yii::app ()->createUrl ($ajaxLinkController . 'save', array('thread' => $this->thread)) . '";' . "\n"
                . 'var url_stats = "' . Yii::app ()->createUrl ($ajaxLinkController . 'stats', array('thread' => $this->thread)) . '";' . "\n"
                . 'var url_latests = "' . Yii::app ()->createUrl ($ajaxLinkController . 'latest', array('thread' => $this->thread)) . '";' . "\n"
                , CClientScript::POS_HEAD);

    }

    public function run () {

        $this->render ('sensorario-comments');

    }

}
