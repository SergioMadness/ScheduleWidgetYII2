<?php

namespace datalayerru\ScheduleWidget\wrappers;

class Task
{
    /**
     * Name shown on top of each task
     *
     * @var string
     */
    public $name;

    /**
     * Date can be a String, Timestamp, js' Date object or moment object
     *
     * @var string
     */
    public $from;

    /**
     * Date can be a String, Timestamp, Date object or moment object
     *
     * @var string
     */
    public $to;

    /**
     * Unique id of the task (Optional)
     *
     * @var string
     */
    public $id;

    /**
     * Color of the task in HEX format (Optional)
     *
     * @var string
     */
    public $color;

    /**
     * Array or String of class names which should be applied to the task. See ng-class documentation for details (Optional)
     *
     * @var mixed
     */
    public $classes;

    /**
     * Defines which of an overlapping task is on top (Optional). Tip: Leave property away for default behaviour
     *
     * @var integer
     */
    public $priority;

    /**
     * Custom object. Use this to attach your own data (Optional)
     *
     * @var mixed
     */
    public $data;

    /**
     * Content used in labels (Optional)
     *
     * @var string
     */
    public $content;

}