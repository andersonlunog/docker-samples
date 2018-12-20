<?php
return [
    'zf-content-negotiation' => [
        'selectors' => [],
    ],
    'db' => [
        'adapters' => [
            'dummy' => [],
        ],
    ],
    'zf-apigility-doctrine-query-provider' => [
        'aliases' => [
            'default_orm' => \ZF\Doctrine\QueryBuilder\Query\Provider\DefaultOrm::class,
            'default_odm' => \ZF\Doctrine\QueryBuilder\Query\Provider\DefaultOdm::class,
        ],
        'factories' => [
            \ZF\Doctrine\QueryBuilder\Query\Provider\DefaultOrm::class => \ZF\Doctrine\QueryBuilder\Query\Provider\DefaultOrmFactory::class,
            \ZF\Doctrine\QueryBuilder\Query\Provider\DefaultOdm::class => \ZF\Doctrine\QueryBuilder\Query\Provider\DefaultOdmFactory::class,
        ],
    ],
    'zf-doctrine-querybuilder-options' => [
        'filter_key' => 'filter',
        'order_by_key' => 'order-by',
    ],
    'zf-doctrine-querybuilder-orderby-orm' => [
        'aliases' => [
            'field' => \ZF\Doctrine\QueryBuilder\OrderBy\ORM\Field::class,
        ],
        'factories' => [
            \ZF\Doctrine\QueryBuilder\OrderBy\ORM\Field::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
        ],
    ],
    'zf-doctrine-querybuilder-orderby-odm' => [
        'aliases' => [
            'field' => \ZF\Doctrine\QueryBuilder\OrderBy\ODM\Field::class,
        ],
        'factories' => [
            \ZF\Doctrine\QueryBuilder\OrderBy\ODM\Field::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
        ],
    ],
    'zf-doctrine-querybuilder-filter-orm' => [
        'aliases' => [
            'eq' => \ZF\Doctrine\QueryBuilder\Filter\ORM\Equals::class,
            'neq' => \ZF\Doctrine\QueryBuilder\Filter\ORM\NotEquals::class,
            'lt' => \ZF\Doctrine\QueryBuilder\Filter\ORM\LessThan::class,
            'lte' => \ZF\Doctrine\QueryBuilder\Filter\ORM\LessThanOrEquals::class,
            'gt' => \ZF\Doctrine\QueryBuilder\Filter\ORM\GreaterThan::class,
            'gte' => \ZF\Doctrine\QueryBuilder\Filter\ORM\GreaterThanOrEquals::class,
            'isnull' => \ZF\Doctrine\QueryBuilder\Filter\ORM\IsNull::class,
            'isnotnull' => \ZF\Doctrine\QueryBuilder\Filter\ORM\IsNotNull::class,
            'in' => \ZF\Doctrine\QueryBuilder\Filter\ORM\In::class,
            'notin' => \ZF\Doctrine\QueryBuilder\Filter\ORM\NotIn::class,
            'between' => \ZF\Doctrine\QueryBuilder\Filter\ORM\Between::class,
            'like' => \ZF\Doctrine\QueryBuilder\Filter\ORM\Like::class,
            'notlike' => \ZF\Doctrine\QueryBuilder\Filter\ORM\NotLike::class,
            'ismemberof' => \ZF\Doctrine\QueryBuilder\Filter\ORM\IsMemberOf::class,
            'orx' => \ZF\Doctrine\QueryBuilder\Filter\ORM\OrX::class,
            'andx' => \ZF\Doctrine\QueryBuilder\Filter\ORM\AndX::class,
        ],
        'factories' => [
            \ZF\Doctrine\QueryBuilder\Filter\ORM\Equals::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ORM\NotEquals::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ORM\LessThan::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ORM\LessThanOrEquals::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ORM\GreaterThan::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ORM\GreaterThanOrEquals::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ORM\IsNull::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ORM\IsNotNull::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ORM\In::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ORM\NotIn::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ORM\Between::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ORM\Like::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ORM\NotLike::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ORM\IsMemberOf::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ORM\OrX::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ORM\AndX::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
        ],
    ],
    'zf-doctrine-querybuilder-filter-odm' => [
        'aliases' => [
            'eq' => \ZF\Doctrine\QueryBuilder\Filter\ODM\Equals::class,
            'neq' => \ZF\Doctrine\QueryBuilder\Filter\ODM\NotEquals::class,
            'lt' => \ZF\Doctrine\QueryBuilder\Filter\ODM\LessThan::class,
            'lte' => \ZF\Doctrine\QueryBuilder\Filter\ODM\LessThanOrEquals::class,
            'gt' => \ZF\Doctrine\QueryBuilder\Filter\ODM\GreaterThan::class,
            'gte' => \ZF\Doctrine\QueryBuilder\Filter\ODM\GreaterThanOrEquals::class,
            'isnull' => \ZF\Doctrine\QueryBuilder\Filter\ODM\IsNull::class,
            'isnotnull' => \ZF\Doctrine\QueryBuilder\Filter\ODM\IsNotNull::class,
            'in' => \ZF\Doctrine\QueryBuilder\Filter\ODM\In::class,
            'notin' => \ZF\Doctrine\QueryBuilder\Filter\ODM\NotIn::class,
            'between' => \ZF\Doctrine\QueryBuilder\Filter\ODM\Between::class,
            'like' => \ZF\Doctrine\QueryBuilder\Filter\ODM\Like::class,
            'regex' => \ZF\Doctrine\QueryBuilder\Filter\ODM\Regex::class,
        ],
        'factories' => [
            \ZF\Doctrine\QueryBuilder\Filter\ODM\Equals::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ODM\NotEquals::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ODM\LessThan::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ODM\LessThanOrEquals::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ODM\GreaterThan::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ODM\GreaterThanOrEquals::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ODM\IsNull::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ODM\IsNotNull::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ODM\In::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ODM\NotIn::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ODM\Between::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ODM\Like::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \ZF\Doctrine\QueryBuilder\Filter\ODM\Regex::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'oauth' => [
                'options' => [
                    'spec' => '%oauth%',
                    'regex' => '(?P<oauth>(/api/oauth))',
                ],
                'type' => 'regex',
            ],
        ],
    ],
];
