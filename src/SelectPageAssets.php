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
     * @var string
     */
    public $sourcePath = '@bower/jquery/selectpage';

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
        $this->js[] = YII_DEBUG ? 'selectpage.js' : 'selectpage.min.js';
    }

}
