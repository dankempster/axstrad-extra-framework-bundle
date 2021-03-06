<?php
/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright 2014-2015 Dan Kempster <dev@dankempster.co.uk>
 */

namespace Axstrad\Bundle\ExtraFrameworkBundle\Request\ParamConverter;

use Doctrine\Common\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter as ParamConverterConfig;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter as SensioDoctrineParamConverter;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Axstrad\Bundle\ExtraFrameworkBundle\Request\ParamConverter\DoctrineParamConverter
 *
 * Extends the standard DoctrineParamConverter so that the Doctrine Entity classname can be specified as a DI container
 * paramerter.
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @license MIT
 * @package Axstrad/ExtraFrameworkBundle
 * @subpackage ParamConverter
 */
class DoctrineParamConverter extends SensioDoctrineParamConverter
{
    /**
     * @var ContainerInterface
     */
    protected $container = null;

    /**
     * Class constructor
     *
     * @param ContainerInterface $container The application's DI Container
     */
    public function __construct(ManagerRegistry $manager, ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct($manager);
    }

    /**
     * {@inheritdoc}
     * @uses convertClassParamToClassName
     */
    public function apply(Request $request, ParamConverterConfig $configuration)
    {
        $this->convertClassParamToClassName($configuration);

        return parent::apply($request, $configuration);
    }

    /**
     * {@inheritdoc}
     * @uses convertClassParamToClassName
     */
    public function supports(ParamConverterConfig $configuration)
    {
        $this->convertClassParamToClassName($configuration);

        return parent::supports($configuration);
    }

    /**
     * Converts a Class parameter to a class name
     *
     * If <em>configuration</em>->getClass() matches /%(.*)%/ then it is interpreted as a DI container parameter; And
     * the DI container is asked for a parameter value using $1 (from the regex) as the key.
     *
     * @param object $configuration
     * @return void
     */
    protected function convertClassParamToClassName($configuration)
    {
        if ( ! $configuration instanceof ParamConverterConfig) {
            return;
        }

        if (preg_match('/^%(.*)%$/', $configuration->getClass(), $matches)) {
            $param = $this->container->getParameter($matches[1]);
            $configuration->setClass($param);
        }
    }
}
