<?php

/**
 * Import events classes.
 */
Yii::import('ext.restful.events.*');

/**
 * @author Igor Golovanov <igor.golovanov@gmail.com>
 * @copyright (c) 2012, Igor Golovanov
 * @package yii-ext-restful
 * @category actions
 * 
 * @property CList $onPrepareRequestData List of event handlers for "onPrepareRequestData" event.
 * @property CList $onPrepareResponseData List of event handlers for "onPrepareResponseData" event.
 */
abstract class RestfulAction extends CAction
{

    /**
     * Prepare request data.
     * 
     * @param mixed $data
     * @return mixed
     */
    final public function onPrepareRequestData($data)
    {
        if ($this->hasEventHandler(__FUNCTION__)) {
            $this->raiseEvent(__FUNCTION__,
                              $event = new RestfulDoublyLinkedDataEvent($data, $this));
            return $event->data;
        }
        return $data;
    }

    /**
     * Prepare response data.
     * 
     * @param mixed $data
     * @return mixed
     */
    final public function onPrepareResponseData($data)
    {
        if ($this->hasEventHandler(__FUNCTION__)) {
            $this->raiseEvent(__FUNCTION__,
                              $event = new RestfulDoublyLinkedDataEvent($data, $this));
            return $event->data;
        }
        return $data;
    }
}
