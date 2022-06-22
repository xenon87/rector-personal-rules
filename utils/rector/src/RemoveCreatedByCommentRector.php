<?php

    namespace Utils\Rector;

    use PhpParser\Node;
    use Rector\Core\PhpParser\Node\CustomNode\FileWithoutNamespace;
    use Rector\Core\Rector\AbstractRector;
    use Rector\NodeTypeResolver\Node\AttributeKey;
    use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
    use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
    use Utils\Rector\Tests\Rector\SortUseStatementsByLengthRector\RemoveCreatedByCommentRectorTest;
    use function Symfony\Component\String\u;

    /** @see RemoveCreatedByCommentRectorTest */
    class RemoveCreatedByCommentRector extends AbstractRector
    {

        public function getRuleDefinition(): RuleDefinition
        {
            return new RuleDefinition(
                'Remove created by comments from PHP files', [
                    new CodeSample(
                        <<<'CODE_SAMPLE'
    /**
     * Created by PhpStorm.
     * User: ross
     * Date: 12/09/17
     * Time: 14:34
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

CODE_SAMPLE,
                        <<<'CODE_SAMPLE'
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

CODE_SAMPLE
                    ),
                ]
            );
        }

        /**
         * @return array<class-string<Node>>
         */
        public function getNodeTypes(): array
        {
            return [Node\Stmt\Namespace_::class, FileWithoutNamespace::class];
        }

        /** @param Node\Stmt\Namespace_|FileWithoutNamespace $node */
        public function refactor(Node $node)
        {
            $comments = $node->getComments();

            if(count($comments) < 1) {
                return;
            }

            $removal = [];

            foreach ($comments as $comment) {
                $commentText = u($comment->getText());
                if($commentText->containsAny('Created by ') && $commentText->containsAny('Time:')) {
                    $removal[] = $comment;
                }
            }

            $node->setAttribute(AttributeKey::COMMENTS, array_diff($comments, $removal));

        }
    }
