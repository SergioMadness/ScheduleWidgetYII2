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

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}