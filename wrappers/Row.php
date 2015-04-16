<?php

namespace datalayerru\ScheduleWidget\wrappers;

class Row
{
    /**
     * Name shown on the left side of each row
     *
     * @var string
     */
    public $name;

    /**
     * Unique id of the row (Optional)
     *
     * @var string
     */
    public $id;

    /**
     * Height of the row (Optional)
     *
     * @var string
     */
    public $height;

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
     * Content used in labels (Optional)
     *
     * @var string
     */
    public $content;

    /**
     * Array containing 'Task' tasks to add in this row
     *
     * @var array
     */
    public $tasks = [];

}