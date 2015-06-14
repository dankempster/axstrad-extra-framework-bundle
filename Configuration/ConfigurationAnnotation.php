<?php

namespace Axstrad\Bundle\ExtraFrameworkBundle\Configuration;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationAnnotation as BaseConfigurationAnnotation;
use Symfony\Component\PropertyAccess\PropertyAccessor;

/**
 * Base configuration annotation.
 *
 * @author Dan Kempster <me@dankempster.co.uk>
 */
abstract class ConfigurationAnnotation extends BaseConfigurationAnnotation
{
    /**
     * @param array $values
     * @param bool $magicCall
     * @param bool $throwExceptionOnInvalidIndex
     */
    public function __construct(array $values, $magicCall = false, $throwExceptionOnInvalidIndex = true)
    {
        $accessor = new PropertyAccessor($magicCall, $throwExceptionOnInvalidIndex);

        foreach ($values as $key => $value) {
            $accessor->setValue($this, $key, $value);
        }

        // Just in case parent constructor starts to do more then just set properties in the future.
        parent::__construct(array());
    }
}
