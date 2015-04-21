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
     * Array containing 'Task' tasks to add in this row
     *
     * @var array
     */
    public $tasks = [];

    /**
     * Array of strings. Like ['Task2', 'Task3']
     *
     * @var array
     */
    public $children = [];


    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}