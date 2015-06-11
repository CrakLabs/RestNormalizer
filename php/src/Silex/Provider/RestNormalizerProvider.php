<?php
/**
 * This file is property of crakmedia (http://crakmedia.com)
 *
 * PHP Version 5.4
 *
 * @copyright 2015 Crakmedia
 */

namespace Crak\Component\RestNormalizer\Silex\Provider;

use Crak\Component\RestNormalizer\Builder\ResponseBuilder;
use Crak\Component\RestNormalizer\HttpMethod;
use Crak\Component\RestNormalizer\Parameter;
use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * Class RestNormalizerProvider
 *
 * @package  Crak\Component\RestNormalizer\Silex\Provider
 * @author   Christophe Rosello <crosello@crakmedia.com>
 */
class RestNormalizerProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     */
    public function register(Application $app)
    {
        $app['rest_normalizer.version'] = '0.1.0';
        $app['rest_normalizer.builder'] = $app->protect(
            function ($object = null) use ($app) {
                $version = $app['rest_normalizer.version'];
                $request = $app['request'];
                /** @var $request \Symfony\Component\HttpFoundation\Request */

                $builder = ResponseBuilder::create(
                    $version,
                    HttpMethod::valueOf($request->getMethod()),
                    $object
                );

                foreach ($request->request->all() as $key => $value) {
                    $parameter = Parameter::create($key, $value);
                    $builder->addParameter($parameter);
                }

                return $builder;
            }
        );
    }

    /**
     * Bootstraps the application.
     *
     * This method is called after all services are registered
     * and should be used for "dynamic" configuration (whenever
     * a service must be requested).
     */
    public function boot(Application $app)
    {
    }
}
