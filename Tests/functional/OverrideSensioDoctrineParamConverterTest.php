<?php
namespace Axstrad\Bundle\ExtraFrameworkBundle\Tests\functional;

use Axstrad\Bundle\UseCaseTestBundle\Test\UseCaseTest;

/**
 * Tests the bundle when it's disabled in config.yml
 */
class OverrideSensioDoctrineParamConverterTest extends UseCaseTest
{
    /**
     */
    public function testParamConverterClassIsAxstradsOwn()
    {
        static::bootKernel();

        $this->assertInstanceOf(
            'Axstrad\Bundle\ExtraFrameworkBundle\Request\ParamConverter\DoctrineParamConverter',
            static::$kernel->getContainer()->get('sensio_framework_extra.converter.doctrine.orm')
        );
    }
}
