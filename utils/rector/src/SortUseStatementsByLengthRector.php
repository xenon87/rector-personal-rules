<?php

    namespace Utils\Rector;

    use PhpParser\Node;
    use Rector\Core\Rector\AbstractRector;
    use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
    use Rector\Core\PhpParser\Node\CustomNode\FileWithoutNamespace;
    use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
    use Utils\Rector\Tests\Rector\SortUseStatementsByLengthRector\Fixture\SortUseStatementsByLengthRectorTest;

    /**
     * @see SortUseStatementsByLengthRectorTest
     */
    final class SortUseStatementsByLengthRector extends AbstractRector
    {
        public function getRuleDefinition(): RuleDefinition
        {
            return new RuleDefinition(
                'Sort namespaces from shortest to longest', [
                    new CodeSample(
                        <<<'CODE_SAMPLE'
use App\Example\Short;
use App\Example\LongNameSpaceName\TextGoes\Here\AndIsLong;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

final class UserController
{
    public function registerUser(Request $request): Response
    {
        $username = $request->get('username');
    }
}
CODE_SAMPLE,
                        <<<'CODE_SAMPLE'
use App\Example\Short;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Example\LongNameSpaceName\TextGoes\Here\AndIsLong;

final class UserController
{
    public function registerUser(Request $request): Response
    {
        $username = $request->get('username');
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
        public function refactor(Node $node): ?Node
        {
            /** @var array<string, int> */
            $order = [];

            /** @var array<string, Node\Identifier> $aliases */
            $aliases = [];

            $count = 0;

            foreach ($node->stmts as $currentNode) {
                if ($currentNode instanceof Node\Stmt\Use_) {
                    foreach ($currentNode->uses as $use) {
                        $alias = $use->getAlias();
                        $aliasLength = count($alias->getAttributes()) > 0 ? mb_strlen($alias->name) : 0;
                        $order[$use->name->toString()] = mb_strlen($use->name->toString()) + $aliasLength;
                        $aliases[$use->name->toString()] = $alias;
                    }
                }
            }

            array_multisort(array_values($order), SORT_ASC, array_keys($order), SORT_ASC, $order);
            $order = array_keys($order);

            foreach ($node->stmts as $currentNode) {
                if ($currentNode instanceof Node\Stmt\Use_) {
                    foreach ($currentNode->uses as $use) {
                        $currentIndex = $order[$count++];
                        $use->alias = count($aliases[$currentIndex]->getAttributes()) > 0 ? $aliases[$currentIndex] : null;
                        $use->name = new Node\Name($currentIndex);
                    }
                }
            }

            return null;
        }
    }
