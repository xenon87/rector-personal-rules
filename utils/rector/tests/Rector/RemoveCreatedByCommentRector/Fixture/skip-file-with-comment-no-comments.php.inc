<?php
    /**
     * This is unrelated
     */

    namespace App\CompilerPass;

    use App\Service\Block\BlockMethodFactory;
    use Symfony\Component\DependencyInjection\Reference;
    use Symfony\Component\DependencyInjection\ContainerBuilder;
    use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

    class BlockMethodCompilerPass implements CompilerPassInterface
    {
        public function process(ContainerBuilder $container): void
        {
            if (!$container->hasDefinition(BlockMethodFactory::class)) {
                return;
            }

            $definition = $container->getDefinition(BlockMethodFactory::class);

            foreach ($container->findTaggedServiceIds('block_mage.method') as $serviceId => $tag) {
                $reference = new Reference($serviceId);
                $definition->addMethodCall('registerMethod', [$reference]);
            }
        }
    }
?>