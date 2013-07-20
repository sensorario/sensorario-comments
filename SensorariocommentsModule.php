<?php

/**
 * @package Sensorario\Modules\SensorarioComments
 */
class SensorariocommentsModule extends CWebModule
{

    public function init() {

        $this->setImport(array(
            'sensorariocomments.models.*',
            'sensorariocomments.components.*',
        ));

    }

    public function beforeControllerAction($controller, $action) {

        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        } else {
            return false;
        }

    }

}
