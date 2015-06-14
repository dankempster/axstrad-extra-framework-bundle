<?php
namespace Axstrad\Bundle\ExtraFrameworkBundle\Tests\Configuration;

/**
 * @package AxstradExtraFrameworkBundle
 * @subpackage Test
 */
class ConfigurationAnnotationTest extends \PHPUnit_Framework_TestCase
{
    public function testCanSetPublicPropertiesByConstructor()
    {
        $fixture = new AnnotationTestClass(array('name' => 'foobar'));

        $this->assertEquals(
            'foobar',
            $fixture->name
        );
    }

    public function testCanSetPropertyUserSetterByConstructor()
    {
        $fixture = new AnnotationTestClass(array('task' => 'foobar'));

        $this->assertEquals(
            'foobar',
            $fixture->getTask()
        );
    }
}