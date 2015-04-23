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
     * On task's row change event
     */
    const EVENT_TASK_ROW_CHANGE = 'tasks.on.rowChange';

    /**
     * On row has been added
     */
    const EVENT_TASK_ADD = 'tasks.on.add';

    /**
     * On task is changed
     */
    const EVENT_TASK_CHANGE = 'tasks.on.change';

    /**
     * On task is removed
     */
    const EVENT_TASK_REMOVE = 'tasks.on.remove';

    /**
     * On task is clicked
     */
    const EVENT_TASK_CLICK = 'dom.tasks.on.click';

    /**
     * On task is doubleclicked
     */
    const EVENT_TASK_DBLCLICK = 'dom.tasks.on.dblclick';

    /**
     * On core is ready
     */
    const EVENT_CORE_READY = 'core.on.ready';

    /**
     * On JS plugin is rendered
     */
    const EVENT_CORE_RENDERED = 'core.on.rendered';

    /**
     * On data is changed
     */
    const EVENT_DATA_CHANGED = 'data.on.change';

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
     * JS events
     *
     * @var array
     */
    public $events = [];

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
        $this->clientOptions['api']   = 'registerApi';
        if ($this->data == '') {
            $this->data = Json::encode($this->rows);
        }
        return $this->render('schedule',
                        ['plugins' => $this->renderPlugins(),
                    'clientOptions' => $this->clientOptions,
                    'data' => $this->data,
                    'events' => $this->renderEvents()]);
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

    /**
     * Prepares js events
     *
     * @return string
     */
    protected function renderEvents()
    {
        $result = '';

        foreach ($this->events as $key => $val) {
            $result.='events[\''.$key.'\']='.$val->__toString().';';
        }

        return $result;
    }
}