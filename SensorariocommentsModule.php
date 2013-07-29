<?php

/**
 * A Yii module that provide comments Facebook like.
 * 
 * PHP version 5
 * 
 * @category Module
 * @package  Sensorario\Modules\SensorarioComments;
 * @author   Simone Gentili <sensorario@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     https://github.com/sensorario/sensorariocomments github repository
 */


/**
 * Ajax module for comments in Yii 1.1
 * 
 * @category Module
 * @package  Sensorario\Modules\SensorarioComments;
 * @author   Simone Gentili <sensorario@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @link     https://github.com/sensorario/sensorariocomments github repository
 */
class SensorariocommentsModule extends CWebModule
{

    /**
     * init
     * 
     * @return booelan true
     */
    public function init()
    {

        $imports = array(
          'sensorariocomments.models.*',
          'sensorariocomments.components.*',
        );

        $this->setImport($imports);

        return true;

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
