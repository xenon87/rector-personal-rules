<?php

    namespace Utils\Rector\NodeVisitor;

    use PhpParser\Node;
    use PhpParser\NodeVisitorAbstract;

    final class UsingLengthVisitor extends NodeVisitorAbstract
    {
        /** @var array<string, int> */
        private array $usingList = [];

        public function beforeTraverse(array $nodes)
        {
            $this->usingList = [];
            return null;
        }

        public function enterNode(Node $node)
        {
            if($node instanceof Node\Stmt\UseUse) {
                $this->usingList[$node->name->toString()] = mb_strlen($node->name->toString());
            }
            return null;
        }

        public function afterTraverse(array $nodes)
        {
            array_multisort(array_values($this->usingList), SORT_ASC, array_keys($this->usingList), SORT_ASC, $this->usingList);
            return null;
        }

        public function getOrderedList() : array
        {
            return $this->usingList;
        }

    }
