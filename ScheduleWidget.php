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
     * Progress plugin
     */
    const PLUGIN_PROGRESS = 'PluginProgress';

    /**
     * Bounds plugin
     */
    const PLUGIN_BOUNDS = 'PluginBounds';

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
     * On task is moved
     */
    const EVENT_TASK_MOVEEND = 'tasks.on.moveEnd';

    /**
     * On task is resized
     */
    const EVENT_TASK_RESIZEEND = 'tasks.on.resizeEnd';

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
     * On row is clicked
     */
    const EVENT_ROW_CLICK = 'dom.row.on.click';

    /**
     * On row's label is clicked
     */
    const EVENT_ROW_LABEL_CLICK = 'dom.row.on.labelclick';

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
     * Date frames
     *
     * @var array 
     */
    public $dateFrames = [];

    /**
     * Time frames
     *
     * @var array
     */
    public $timeFrames = [];

    /**
     * Array of 'Row' objects
     *
     * @var array
     */
    public $rows = [];

    public function run()
    {
        $this->clientOptions['gantt']       = true;
        $this->clientOptions['data']        = 'data';
        $this->clientOptions['api']         = 'registerApi';
        $this->clientOptions['date-frames'] = 'dateFrames';
        $this->clientOptions['time-frames'] = 'timeFrames';
        if ($this->data == '') {
            $this->data = Json::encode($this->rows);
        }
        return $this->render('schedule',
                        ['plugins' => $this->renderPlugins(),
                    'clientOptions' => $this->clientOptions,
                    'data' => $this->data,
                    'events' => $this->renderEvents(),
                    'dateFrames' => Json::encode($this->dateFrames),
                    'timeFrames' => Json::encode($this->timeFrames)]);
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