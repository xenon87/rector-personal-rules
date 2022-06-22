<?php

    namespace App;

    use App\CompilerPass\CortexCompilerPass;
    use Symfony\Component\DependencyInjection\ContainerBuilder;
    use Symfony\Component\HttpKernel\Kernel as BaseKernel;

    class Kernel extends BaseKernel
    {
        use MicroKernelTrait;

        protected function build(ContainerBuilder $container)
        {
        }
    }
?>
-----
<?php

    namespace App;

    use App\CompilerPass\CortexCompilerPass;
    use Symfony\Component\HttpKernel\Kernel as BaseKernel;
    use Symfony\Component\DependencyInjection\ContainerBuilder;

    class Kernel extends BaseKernel
    {
        use MicroKernelTrait;

        protected function build(ContainerBuilder $container)
        {
        }
    }
?>
