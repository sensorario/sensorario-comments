<?php

/**
 * @license MIT
 * @author Simone Gentili <sensorario@gmail.com>
 * @version 1.0
 */
class CommentLoader extends CWidget
{

    /**
     *
     * @var type 
     */
    public $semanticId;

    /**
     * 
     */
    private function loadJQuery()
    {
        $cdn = 'http://code.jquery.com/jquery.min.js';
        $position = CClientScript::POS_HEAD;
        Yii::app()->getClientScript()->registerScriptFile($cdn, $position);
    }

    /**
     * 
     */
    private function loadAjaxForm()
    {
        $cdn = 'http://malsup.github.com/jquery.form.js';
        $position = CClientScript::POS_HEAD;
        Yii::app()->getClientScript()->registerScriptFile($cdn, $position);
    }

    /**
     * 
     */
    public function init()
    {
        if(Yii::app()->user->isGuest) {
            echo '<em>If you want to leave a comment, login</em>';
        } else {
            $this->loadAjaxForm();
            $this->loadJQuery();
        }
    }

    /**
     * 
     */
    public function run()
    {
        if(!Yii::app()->user->isGuest) {
            $filename = dirname(__FILE__) . '/components/CommentLoader.js';
            $position = CClientScript::POS_READY;
            $sourceJs = file_get_contents($filename);
            echo '<div id="' . ($this->semanticId) . '" rel="SensorarioModuleComment"></div>';
            Yii::app()->getClientScript()->registerScript('prova', $sourceJs, $position);
            Yii::app()->getClientScript()->registerCssFile('protected/modules/SensorarioModuleComment/assets/SensorarioModuleCommentCss.css');
        }
    }

}