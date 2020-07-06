# easydowork/selectpage
带分页的下拉框插件

##配置说明 
https://terryz.gitee.io/selectpage/demo.html

### ActiveForm使用
```php
<?= $form->field($model, 'select')->widget(\easydowork\selectpage\SelectPage::class,[
    'pluginOptions' => [
        'data' => [
            [
              'id' => 1,
              'name' => 'test1',
            ],
            [
              'id' => 2,
              'name' => 'test2',
            ]
        ],
    ]
]) ?>

#ajax
<?= $form->field($model, 'select')->widget(\easydowork\selectpage\SelectPage::class,[
    'pluginOptions' => [
        'data' => \yii\helpers\Url::to(['test/data']),
        'eAjaxSuccess' => (new \yii\web\JsExpression('function(res){var data;if(res.ret){data = res.data;}else{data = undefined;}return data;}'))
    ]
]) ?>

//服务端返回的JSON数据格式
//这里的示例数据，有些节点不是必须的，最重要的是list和totalRow两个节点必须存在
//所以在上面的代码中，设置了eAjaxSuccess的回调中将values.gridResult节点
//返回，因为在该节点下存在list和totalRow两个数据项
{
    "values": {
        "gridResult": {
            "pageSize": 10,
            "pageNumber": 1,
            "totalRow": 11,
            "totalPage": 2,
            "list": [
                {"name": "计算机网络","id": "1"},
                {"name": "计算机网络1","id": "2"},
                {...}
            ]
        }
    }
}
```

### 非ActiveForm使用
```php
// Multiple select without model
echo \easydowork\selectpage\SelectPage::widget([
    'name' => 'selectPage',
    'value' => '1',
    'data' => [
        [
            'id' => 1,
            'name' => 'selectPage',
        ]
    ],
    'options' => [
        'id' => uniqid(),
    ]
]);
```

```shell script
php yii rbac/back-up
php yii rbac/update
```