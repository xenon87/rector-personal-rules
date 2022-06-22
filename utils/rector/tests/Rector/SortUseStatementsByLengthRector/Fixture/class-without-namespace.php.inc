<?php

    use App\Entity\ProductVariant;
    use App\Entity\StockNotification;
    use App\Form\Type\StockNotificationType;
    use App\Services\Product\DimensionsResolver;
    use FOS\RestBundle\View\View;
    use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
    use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;
    use Sylius\Component\Channel\Context\ChannelContextInterface;
    use Sylius\Component\Core\Model\OrderInterface;
    use Sylius\Component\Product\Model\ProductInterface;
    use Sylius\Component\Promotion\Model\PromotionAction;
    use Sylius\Component\Resource\Metadata\Metadata;
    use Sylius\Component\Resource\Repository\RepositoryInterface;
    use Sylius\Component\Resource\ResourceActions;
    use Sylius\Component\Taxation\Calculator\CalculatorInterface;
    use Sylius\Component\Taxation\Resolver\TaxRateResolverInterface;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpKernel\Exception\HttpException;
    use Symfony\Component\Yaml\Yaml;
    use App\Entity\Product;
    use App\Entity\TaxonTranslation;
    use App\Model\Expression\Material;
    use App\Model\Expression\MaterialCollection;
    use App\Model\Expression\ProductPrice;

    class ProductController extends ResourceController
    {
    }
?>
-----
<?php

    use App\Entity\Product;
    use FOS\RestBundle\View\View;
    use App\Entity\ProductVariant;
    use App\Entity\TaxonTranslation;
    use Symfony\Component\Yaml\Yaml;
    use App\Entity\StockNotification;
    use App\Model\Expression\Material;
    use App\Model\Expression\ProductPrice;
    use App\Form\Type\StockNotificationType;
    use App\Model\Expression\MaterialCollection;
    use App\Services\Product\DimensionsResolver;
    use Symfony\Component\HttpFoundation\Request;
    use Sylius\Component\Resource\ResourceActions;
    use Symfony\Component\HttpFoundation\Response;
    use Sylius\Component\Core\Model\OrderInterface;
    use Sylius\Component\Resource\Metadata\Metadata;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Sylius\Component\Product\Model\ProductInterface;
    use Sylius\Component\Promotion\Model\PromotionAction;
    use Symfony\Component\HttpKernel\Exception\HttpException;
    use Sylius\Component\Channel\Context\ChannelContextInterface;
    use Sylius\Component\Resource\Repository\RepositoryInterface;
    use Sylius\Component\Taxation\Calculator\CalculatorInterface;
    use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
    use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;
    use Sylius\Component\Taxation\Resolver\TaxRateResolverInterface;

    class ProductController extends ResourceController
    {
    }
?>
