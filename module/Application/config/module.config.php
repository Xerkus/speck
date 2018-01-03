<?php
declare(strict_types=1);

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            //'default' => array(
            //    'type'    => 'Zend\Mvc\Router\Http\Segment',
            //    'options' => array(
            //        'route'    => '/[:controller[/:action]]',
            //        'constraints' => array(
            //            'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
            //            'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
            //        ),
            //        'defaults' => array(
            //            'controller' => 'index',
            //            'action'     => 'index',
            //        ),
            //    ),
            //),
            'home' => [
                'type' => 'Zend\Router\Http\Literal',
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Application\Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'dependencies' => [
        'factories' => [
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ],
    ],
    'translator' => [
        'locale' => 'en_US',
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Application\Controller\IndexController::class => InvokableFactory::class
        ],
    ],
    'view_manager' => [
        'base_path'                => '/',
        'display_not_found_reason' => false,
        'display_exceptions'       => false,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'index/index'   => __DIR__ . '/../view/index/index.phtml',
            'error/404'     => __DIR__ . '/../view/error/404.phtml',
            'error/index'   => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
