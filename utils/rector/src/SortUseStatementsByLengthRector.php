<?php

    namespace Utils\Rector;

    use PhpParser\Node;
    use PhpParser\NodeTraverser;
    use Rector\Core\Exception\ShouldNotHappenException;
    use Rector\Core\Rector\AbstractRector;
    use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
    use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
    use Utils\Rector\NodeVisitor\UsingLengthVisitor;
    use Utils\Rector\Tests\Rector\SortUseStatementsByLengthRector\Fixture\SortUseStatementsByLengthRectorTest;

    /**
     * @see SortUseStatementsByLengthRectorTest
     */
    final class SortUseStatementsByLengthRector extends AbstractRector
    {
        /** @var array<string> */
        private array $order = [];
        private int $index = 0;

        /**
         * @throws ShouldNotHappenException
         */
        public function beforeTraverse(array $nodes): ?array
        {
            $visitor       = new UsingLengthVisitor();
            $nodeTraverser = new NodeTraverser();
            $nodeTraverser->addVisitor($visitor);
            $nodeTraverser->traverse($nodes);
            $this->order = array_keys($visitor->getOrderedList());
            $this->index = 0;
            return parent::beforeTraverse($nodes);
        }

        public function afterTraverse(array $nodes)
        {
            $this->order = [];
            return parent::afterTraverse($nodes);
        }

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
            return [Node\Stmt\UseUse::class];
        }

        /** @param Node\Stmt\UseUse $node */
        public function refactor(Node $node): ?Node
        {
            $node->name = new Node\Name($this->order[$this->index++]);
            return null;
        }
    }
