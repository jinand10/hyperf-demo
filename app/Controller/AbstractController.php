<?php

declare(strict_types=1);

namespace App\Controller;

use App\Kernel\Http\Response;
use App\Validation\CommonValidation;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Validation\Contract\ValidatorFactoryInterface;
use Psr\Container\ContainerInterface;

abstract class AbstractController
{
    /**
     * @Inject
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @Inject
     * @var RequestInterface
     */
    protected $request;

    /**
     * @Inject
     * @var Response
     */
    protected $response;

     /**
     * @Inject
     * @var CommonValidation
     */
    protected $validation;

    /**
     * @Inject
     * @var ValidatorFactoryInterface
     */
    protected $validationFactory;
}
