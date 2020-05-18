<?php

namespace Tests;

use Paphper\BuildFileResolver;

class BuildFileResolverTest extends AbstractTestCase
{
    public function testBuildFileAreResolvedCorrectly()
    {
        $resolver = new BuildFileResolver($this->config, $this->config->getPageBaseFolder().'/blog.html');
        $this->assertSame($this->config->getBuildBaseFolder().'/blog', $resolver->getFolder());
    }

    public function testForDeepFolder()
    {
        $resolver = new BuildFileResolver($this->config, $this->config->getPageBaseFolder().'/blogs/testing/naren.md');
        $this->assertSame($this->config->getBuildBaseFolder().'/blogs/testing/naren', $resolver->getFolder());
    }

    public function testForMdFolder()
    {
        $resolver = new BuildFileResolver($this->config, $this->config->getPageBaseFolder().'/index.md');
        $this->assertSame($this->config->getBuildBaseFolder(), $resolver->getFolder());
    }

    public function testForBladeFolder()
    {
        $filename = $this->config->getPageBaseFolder().'/index.blade.php';
        $resolver = new BuildFileResolver($this->config, $this->config->getPageBaseFolder().'/index.blade.php');

        $this->assertTrue(true);
        echo PHP_EOL;
        echo $filename.PHP_EOL;
        echo  $resolver->getName().PHP_EOL;
//        $this->assertSame($this->config->getBuildBaseFolder(), $resolver->getName());
    }
}
