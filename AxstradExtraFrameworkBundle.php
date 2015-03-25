<?php
namespace Axstrad\Bundle\ExtraFrameworkBundle\Exception;

use Axstrad\Bundle\ExtraFrameworkBundle\DependencyInjection\Compiler\OverrideSensioDoctrineParamConverter;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AxstradExtraFrameworkBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new OverrideSensioDoctrineParamConverter());
    }
}