<?php

class SensorarioModuleCommentModule extends CWebModule
{

    public function init()
    {
        $this->setImport(array(
            'SensorarioModuleComment.models.*',
            'SensorarioModuleComment.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        if(parent::beforeControllerAction($controller, $action)) {
            return true;
        } else {
            return false;
        }
    }

}
