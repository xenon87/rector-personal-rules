<?php

    namespace App\Controller;

    use App\Entity\ProductVariant;
    use App\Entity\StockNotification;
    use App\Form\Type\StockNotificationType;
    use App\Services\Product\DimensionsResolver;
    use FOS\RestBundle\View\View;
    use Symfony\Component\Console\Tester\TesterTrait;
    use Symfony\Component\Console\Tester\TesterTrait2;

    class ProductController extends ResourceController
    {
        use TesterTrait2;
        use TesterTrait;
    }
?>
-----
<?php

    namespace App\Controller;

    use FOS\RestBundle\View\View;
    use App\Entity\ProductVariant;
    use App\Entity\StockNotification;
    use App\Form\Type\StockNotificationType;
    use App\Services\Product\DimensionsResolver;
    use Symfony\Component\Console\Tester\TesterTrait;
    use Symfony\Component\Console\Tester\TesterTrait2;

    class ProductController extends ResourceController
    {
        use TesterTrait2;
        use TesterTrait;
    }
?>
