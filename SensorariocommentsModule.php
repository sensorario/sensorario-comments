<?php

/**
 * Ajax module for comments in Yii 1.1
 * 
 * @package Sensorario\Modules\SensorarioComments;
 * 
 * @author Simone Gentili <sensorario@gmail.com>
 */
class SensorariocommentsModule extends CWebModule
{

    /**
     * init
     */
    public function init()
    {

        $this->setImport(array(
            'sensorariocomments.models.*',
            'sensorariocomments.components.*',
        ));

    }

    /**
     * beforeControllerAction
     * 
     * @param type $controller A controller
     * @param type $action     An action
     * 
     * @return boolean
     */
    public function beforeControllerAction($controller, $action)
    {

        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        } else {
            return false;
        }

    }

}
