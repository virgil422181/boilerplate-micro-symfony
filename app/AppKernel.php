<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array (
          new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
          new \Symfony\Bundle\TwigBundle\TwigBundle(),
          new \Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
          new \AppBundle\AppBundle(),
        );

        if (in_array($this->getEnvironment(), ['dev','test'], true)) {
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }

}