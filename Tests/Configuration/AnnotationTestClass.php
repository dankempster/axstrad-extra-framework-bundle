<?php
namespace Axstrad\Bundle\ExtraFrameworkBundle\Tests\Configuration;

use Axstrad\Bundle\ExtraFrameworkBundle\Configuration\ConfigurationAnnotation;

/**
 * @package AxstradExtraFrameworkBundle
 * @subpackage Test
 */
class AnnotationTestClass extends ConfigurationAnnotation
{
    /**
     * @var mixed name
     */
    public $name = null;

    /**
     * @var mixed task
     */
    private $task = null;

    /**
     * @return null
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param null $task
     */
    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
     * Returns the alias name for an annotated configuration.
     *
     * @return string
     */
    public function getAliasName()
    {
        // Fulfill abstract requirements
    }

    /**
     * Returns whether multiple annotations of this type are allowed
     *
     * @return bool
     */
    public function allowArray()
    {
        // Fulfill abstract requirements
    }
}