<?php
return array(
    new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
    new \Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
    new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),

    // Bundle under test
    new \Axstrad\Bundle\ExtraFrameworkBundle\AxstradExtraFrameworkBundle(),
);