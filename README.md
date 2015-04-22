# ScheduleWidgetYII2
[Yii2](http://www.yiiframework.com/) widget. Wrapper for [angular-gantt](http://www.angular-gantt.com)

## Composer

ScheduleWidgetYII2 is available through [composer](https://getcomposer.org/)

  composer require datalayerru/schedule-widget-yii2 "dev-dev"
  
Alternatively you can add the following to the `require` section in your `composer.json` manually:

```json
"datalayerru/schedule-widget-yii2": "dev-dev"
```

Run `composer update` afterwards.

### In your PHP project

Example:

```php
use datalayerru\ScheduleWidget\ScheduleWidget;

echo ScheduleWidget::widget([
    'clientOptions' => [
        'daily' => 'true', 
        'column-magnet' => 'column', 
        'time-frames-magnet' => false
    ],
    'plugins' => [
        ScheduleWidget::PLUGIN_MOVABLE => [],
        ScheduleWidget::PLUGIN_TABLE => [
            'headers' => [
                'model.name' => 'Name'
            ]
        ], 
        ScheduleWidget::PLUGIN_TOOLTIP => []
    ],
    'events' => [
        ScheduleWidget::EVENT_ROW_CHANGE => new JsExpression('function(task){'
                .'if(task.row.model.parent===\'Rent\') {'
                .'task.$element.addClass(\'rented-row\');'
                .'task.$element.removeClass(\'request-row\');'
                .'} else {'
                .'task.$element.removeClass(\'rented-row\');'
                .'task.$element.addClass(\'request-row\');'
                .'}'
                .'}')
    ],
    'data' => '[
        {"name":"Row №1","sortable":"false","tasks":[]},
        {"name":"Row №2","sortable":"false","tasks":[]},
        {"name":"Row №3","sortable":"false","tasks":[
            {"name":"Task №1","from":"2015 04 16","to":"2015 04 23"}
          ]
        }
      ]'
]);
```

## Dependencies
- [Yii2](http://www.yiiframework.com/)
- [angularjs](https://angularjs.org/)
- [angular-ui-tree](http://angular-ui-tree.github.io/website/)
- [moment-range](https://github.com/gf3/moment-range)
- [jQuery](http://jquery.com/)

## The MIT License

The MIT License (MIT)

Copyright (c) 2015 Sergey Zinchenko, DataLayer.ru

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.