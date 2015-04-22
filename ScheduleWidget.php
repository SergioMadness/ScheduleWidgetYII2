<?php

namespace datalayerru\ScheduleWidget;

use yii\helpers\Json;

class ScheduleWidget extends \yii\base\Widget
{
    /**
     * Plugins' namespace
     */
    const PLUGIN_PATH = 'datalayerru\ScheduleWidget\plugins';

    /**
     * 'Movable' plugin
     */
    const PLUGIN_MOVABLE = 'PluginMovable';

    /**
     * 'Table' plugin
     */
    const PLUGIN_TABLE = 'PluginTable';

    /**
     * Tooltip plugin
     */
    const PLUGIN_TOOLTIP = 'PluginTooltip';

    /**
     * Groups plugin
     */
    const PLUGIN_GROUPS = 'PluginGroups';

    /**
     * Tree plugin
     */
    const PLUGIN_TREE = 'PluginTree';

    /**
     * Overlap plugin
     */
    const PLUGIN_OVERLAP = 'PluginOverlap';

    /**
     * Widgets' data. Example:
     * {
     *    "name": "Sprint 2",
     *    "tasks": [
     *       {
     *          "name": "Order basket",
     *          "color": "#F1C232",
     *          "from": "2013-10-28T14:00:00.000Z",
     *          "to": "2013-11-01T21:00:00.000Z",
     *          "id": "62361650-9165-1d89-4ede-9f84b86a656e"
     *      }
     *   ],
     *   "id": "b7a79801-c8f4-3aa9-a1e7-cb652ff07115"
     * }
     *
     * @var string
     */
    public $data;

    /**
     * Plugins. Use constants;
     *
     * @var array
     */
    public $plugins = [];

    /**
     * Options. See https://www.angular-gantt.com/configuration/attributes/
     *
     * @var array
     */
    public $clientOptions = [];

    /**
     * Array of 'Row' objects
     *
     * @var array
     */
    public $rows = [];

    public function run()
    {
        $this->clientOptions['gantt'] = true;
        $this->clientOptions['data']  = 'data';
        if ($this->data == '') {
            $this->data = Json::encode($this->rows);
        }
        return $this->render('schedule',
                        ['plugins' => $this->renderPlugins(),
                    'clientOptions' => $this->clientOptions,
                    'data' => $this->data]);
    }

    /**
     * Renderes included plugins
     *
     * @return string
     */
    protected function renderPlugins()
    {
        $result = '';

        foreach ($this->plugins as $key => $val) {
            $widgetClass = self::PLUGIN_PATH.'\\'.$key;
            $result.=$widgetClass::widget(['options' => $val]);
        }

        return $result;
    }
}