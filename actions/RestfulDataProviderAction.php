<?php

/**
 * @author Igor Golovanov <igor.golovanov@gmail.com>
 * @copyright (c) 2012, Igor Golovanov
 * @package yii-ext-restful
 * @category actions
 * 
 * @property IDataProvider $dataProvider Data Provider.
 */
class RestfulDataProviderAction extends RestfulAction
{
    /**
     * Data provider.
     *
     * @var IDataProvider
     */
    private $_dataProvider;
    
    /**
     * Gets the data provider.
     * 
     * @return IDataProvider
     */
    public function getDataProvider()
    {
        if(!$this->_dataProvider instanceof IDataProvider) {
            if($this->_dataProvider instanceof Closure) {
                $this->_dataProvider = $this->_dataProvider($this);
            } else {
                $this->_dataProvider = Yii::createComponent($this->_dataProvider);
            }
        }
        return $this->_dataProvider;
    }
    
    /**
     * Sets the data provider.
     * 
     * @param IDataProvider|Closure|array|string $dataProvider
     * @return RestfulDataProviderAction
     */
    public function setDataProvider($dataProvider)
    {
        $this->_dataProvider = $dataProvider;
        return $this;
    }
    
    public function run()
    {
        
    }
}
