<?php

namespace easydowork\selectpage;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;
use yii\helpers\ArrayHelper;

/**
 * Class SelectPage
 * @package easydowork\selectpage
 */
class SelectPage extends InputWidget
{

    /**
     * @var array
     */
    public $pluginOptions = [];

    /**
     * Initializes the view.
     */
    public function init()
    {
        parent::init();

        if ($this->hasModel()) {
            $this->name = !isset($this->options['name']) ? Html::getInputName($this->model,$this->attribute) : $this->options['name'];

            $this->value = !isset($this->options['value']) ? Html::getAttributeValue($this->model,$this->attribute) : $this->options['value'];
        }
    }

    /**
     * Executes the widget.
     */
    public function run()
    {

        $this->pluginOptions['multiple'] = ArrayHelper::getValue($this->pluginOptions, 'multiple', false);

        $this->registerClientScript();

        if(!empty($this->value) && $this->pluginOptions['multiple']){
            if(is_array($this->value)){
                $this->value = implode(',',$this->value);
            }
            $this->options['data-init'] = $this->value;
        }

        return Html::input('text',$this->name, $this->value, $this->options);
    }

    /**
     * registerClientScript
     */
    protected function registerClientScript()
    {
        $view = $this->getView();

        SelectPageAssets::register($view);

        $jsonPluginOptions = $this->getJsonPluginOptions();

        $id = $this->options['id'];

        $view->registerJs("jQuery('#{$id}').selectPage({$jsonPluginOptions});");
    }

    /**
     * getPluginOptions
     * @return string
     */
    public function getJsonPluginOptions()
    {
        return Json::encode($this->pluginOptions);
    }

}
