<?php

namespace easydowork\selectpage;

use yii\web\AssetBundle;

/**
 * Class SelectPageAssets
 * @package easydowork\selectpage
 */
class SelectPageAssets extends AssetBundle
{
    /**
     * @var array
     */
    public $css = [
        'selectpage.css',
    ];

    /**
     * @var array
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    /**
     * Init object
     */
    public function init()
    {
        $this->sourcePath = __DIR__.'/dist';

        $this->js[] = YII_DEBUG ? 'selectpage.js' : 'selectpage.min.js';
    }

}
