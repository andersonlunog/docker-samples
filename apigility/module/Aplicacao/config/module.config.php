<?php
return [
    'router' => [
        'routes' => [
            'aplicacao.rest.doctrine.user' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/user[/:user_id]',
                    'defaults' => [
                        'controller' => 'Aplicacao\\V1\\Rest\\User\\Controller',
                    ],
                ],
            ],
            'aplicacao.rpc.http-client' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/httpclient',
                    'defaults' => [
                        'controller' => 'Aplicacao\\V1\\Rpc\\HttpClient\\Controller',
                        'action' => 'httpClient',
                    ],
                ],
            ],
            'aplicacao.rest.doctrine.oauth-users' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/oauth-users[/:oauth_users_id]',
                    'defaults' => [
                        'controller' => 'Aplicacao\\V1\\Rest\\OauthUsers\\Controller',
                    ],
                ],
            ],
            'aplicacao.rest.register-publisher' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/register-publisher[/:register_publisher_id]',
                    'defaults' => [
                        'controller' => 'Aplicacao\\V1\\Rest\\RegisterPublisher\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'aplicacao.rest.doctrine.user',
            1 => 'aplicacao.rpc.http-client',
            2 => 'aplicacao.rest.doctrine.oauth-users',
            3 => 'aplicacao.rest.register-publisher',
        ],
    ],
    'zf-rest' => [
        'Aplicacao\\V1\\Rest\\User\\Controller' => [
            'listener' => \Aplicacao\V1\Rest\User\UserResource::class,
            'route_name' => 'aplicacao.rest.doctrine.user',
            'route_identifier_name' => 'user_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'user',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PUT',
                2 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Application\Entity\User::class,
            'collection_class' => \Aplicacao\V1\Rest\User\UserCollection::class,
            'service_name' => 'User',
        ],
        'Aplicacao\\V1\\Rest\\OauthUsers\\Controller' => [
            'listener' => \Aplicacao\V1\Rest\OauthUsers\OauthUsersResource::class,
            'route_name' => 'aplicacao.rest.doctrine.oauth-users',
            'route_identifier_name' => 'oauth_users_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'oauth_users',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Application\Entity\OauthUsers::class,
            'collection_class' => \Aplicacao\V1\Rest\OauthUsers\OauthUsersCollection::class,
            'service_name' => 'OauthUsers',
        ],
        'Aplicacao\\V1\\Rest\\RegisterPublisher\\Controller' => [
            'listener' => \Aplicacao\V1\Rest\RegisterPublisher\RegisterPublisherResource::class,
            'route_name' => 'aplicacao.rest.register-publisher',
            'route_identifier_name' => 'register_publisher_id',
            'collection_name' => 'register_publisher',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'POST',
                1 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Aplicacao\V1\Rest\RegisterPublisher\RegisterPublisherEntity::class,
            'collection_class' => \Aplicacao\V1\Rest\RegisterPublisher\RegisterPublisherCollection::class,
            'service_name' => 'RegisterPublisher',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Aplicacao\\V1\\Rest\\User\\Controller' => 'HalJson',
            'Aplicacao\\V1\\Rpc\\HttpClient\\Controller' => 'Json',
            'Aplicacao\\V1\\Rest\\OauthUsers\\Controller' => 'HalJson',
            'Aplicacao\\V1\\Rest\\RegisterPublisher\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Aplicacao\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.aplicacao.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Aplicacao\\V1\\Rpc\\HttpClient\\Controller' => [
                0 => 'application/vnd.aplicacao.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'Aplicacao\\V1\\Rest\\OauthUsers\\Controller' => [
                0 => 'application/vnd.aplicacao.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Aplicacao\\V1\\Rest\\RegisterPublisher\\Controller' => [
                0 => 'application/vnd.aplicacao.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Aplicacao\\V1\\Rest\\User\\Controller' => [
                0 => 'application/vnd.aplicacao.v1+json',
                1 => 'application/json',
            ],
            'Aplicacao\\V1\\Rpc\\HttpClient\\Controller' => [
                0 => 'application/vnd.aplicacao.v1+json',
                1 => 'application/json',
            ],
            'Aplicacao\\V1\\Rest\\OauthUsers\\Controller' => [
                0 => 'application/vnd.aplicacao.v1+json',
                1 => 'application/json',
            ],
            'Aplicacao\\V1\\Rest\\RegisterPublisher\\Controller' => [
                0 => 'application/vnd.aplicacao.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Application\Entity\User::class => [
                'route_identifier_name' => 'user_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'aplicacao.rest.doctrine.user',
                'hydrator' => 'Aplicacao\\V1\\Rest\\User\\UserHydrator',
            ],
            \Aplicacao\V1\Rest\User\UserCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'aplicacao.rest.doctrine.user',
                'is_collection' => true,
            ],
            \Application\Entity\OauthUsers::class => [
                'route_identifier_name' => 'oauth_users_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'aplicacao.rest.doctrine.oauth-users',
                'hydrator' => 'Aplicacao\\V1\\Rest\\OauthUsers\\OauthUsersHydrator',
            ],
            \Aplicacao\V1\Rest\OauthUsers\OauthUsersCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'aplicacao.rest.doctrine.oauth-users',
                'is_collection' => true,
            ],
            \Aplicacao\V1\Rest\RegisterPublisher\RegisterPublisherEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'aplicacao.rest.register-publisher',
                'route_identifier_name' => 'register_publisher_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Aplicacao\V1\Rest\RegisterPublisher\RegisterPublisherCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'aplicacao.rest.register-publisher',
                'route_identifier_name' => 'register_publisher_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'doctrine-connected' => [
            \Aplicacao\V1\Rest\User\UserResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Aplicacao\\V1\\Rest\\User\\UserHydrator',
            ],
            \Aplicacao\V1\Rest\OauthUsers\OauthUsersResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Aplicacao\\V1\\Rest\\OauthUsers\\OauthUsersHydrator',
            ],
        ],
    ],
    'doctrine-hydrator' => [
        'Aplicacao\\V1\\Rest\\User\\UserHydrator' => [
            'entity_class' => \Application\Entity\User::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'Aplicacao\\V1\\Rest\\OauthUsers\\OauthUsersHydrator' => [
            'entity_class' => \Application\Entity\OauthUsers::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
    ],
    'zf-content-validation' => [
        'Aplicacao\\V1\\Rest\\User\\Controller' => [
            'input_filter' => 'Aplicacao\\V1\\Rest\\User\\Validator',
        ],
        'Aplicacao\\V1\\Rpc\\HttpClient\\Controller' => [
            'input_filter' => 'Aplicacao\\V1\\Rpc\\HttpClient\\Validator',
        ],
        'Aplicacao\\V1\\Rest\\OauthUsers\\Controller' => [
            'input_filter' => 'Aplicacao\\V1\\Rest\\OauthUsers\\Validator',
        ],
        'Aplicacao\\V1\\Rest\\RegisterPublisher\\Controller' => [
            'input_filter' => 'Aplicacao\\V1\\Rest\\RegisterPublisher\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Aplicacao\\V1\\Rest\\User\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [],
            ],
            1 => [
                'name' => 'password',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [],
            ],
        ],
        'Aplicacao\\V1\\Rpc\\HttpClient\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'name',
            ],
            1 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'description',
            ],
        ],
        'Aplicacao\\V1\\Rest\\OauthUsers\\Validator' => [
            0 => [
                'name' => 'password',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 2000,
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'firstName',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'lastName',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 255,
                        ],
                    ],
                ],
            ],
        ],
        'Aplicacao\\V1\\Rest\\RegisterPublisher\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'channel',
                'field_type' => 'String',
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            'Aplicacao\\V1\\Rpc\\HttpClient\\Controller' => \Aplicacao\V1\Rpc\HttpClient\HttpClientControllerFactory::class,
        ],
    ],
    'zf-rpc' => [
        'Aplicacao\\V1\\Rpc\\HttpClient\\Controller' => [
            'service_name' => 'HttpClient',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'aplicacao.rpc.http-client',
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'Aplicacao\\V1\\Rest\\User\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            \Aplicacao\V1\Rest\RegisterPublisher\RegisterPublisherResource::class => \Aplicacao\V1\Rest\RegisterPublisher\RegisterPublisherResourceFactory::class,
            'MQManagerFactory' => \Aplicacao\Factories\MQManagerFactory::class,
        ],
    ],
];
