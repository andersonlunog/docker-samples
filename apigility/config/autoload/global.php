<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c] 2014-2016 Zend Technologies USA Inc. (http://www.zend.com]
 */

use Zend\ServiceManager\Factory\InvokableFactory;

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
            'field' => ZF\Doctrine\QueryBuilder\OrderBy\ORM\Field::class,
        ],
        'factories' => [
            ZF\Doctrine\QueryBuilder\OrderBy\ORM\Field::class => InvokableFactory::class,
        ],
    ],
    'zf-doctrine-querybuilder-orderby-odm' => [
        'aliases' => [
            'field' => ZF\Doctrine\QueryBuilder\OrderBy\ODM\Field::class,
        ],
        'factories' => [
            ZF\Doctrine\QueryBuilder\OrderBy\ODM\Field::class => InvokableFactory::class,
        ],
    ],
    'zf-doctrine-querybuilder-filter-orm' => [
        'aliases' => [
            'eq'         => ZF\Doctrine\QueryBuilder\Filter\ORM\Equals::class,
            'neq'        => ZF\Doctrine\QueryBuilder\Filter\ORM\NotEquals::class,
            'lt'         => ZF\Doctrine\QueryBuilder\Filter\ORM\LessThan::class,
            'lte'        => ZF\Doctrine\QueryBuilder\Filter\ORM\LessThanOrEquals::class,
            'gt'         => ZF\Doctrine\QueryBuilder\Filter\ORM\GreaterThan::class,
            'gte'        => ZF\Doctrine\QueryBuilder\Filter\ORM\GreaterThanOrEquals::class,
            'isnull'     => ZF\Doctrine\QueryBuilder\Filter\ORM\IsNull::class,
            'isnotnull'  => ZF\Doctrine\QueryBuilder\Filter\ORM\IsNotNull::class,
            'in'         => ZF\Doctrine\QueryBuilder\Filter\ORM\In::class,
            'notin'      => ZF\Doctrine\QueryBuilder\Filter\ORM\NotIn::class,
            'between'    => ZF\Doctrine\QueryBuilder\Filter\ORM\Between::class,
            'like'       => ZF\Doctrine\QueryBuilder\Filter\ORM\Like::class,
            'notlike'    => ZF\Doctrine\QueryBuilder\Filter\ORM\NotLike::class,
            'ismemberof' => ZF\Doctrine\QueryBuilder\Filter\ORM\IsMemberOf::class,
            'orx'        => ZF\Doctrine\QueryBuilder\Filter\ORM\OrX::class,
            'andx'       => ZF\Doctrine\QueryBuilder\Filter\ORM\AndX::class,
            //'innerJoin'  => ZF\Doctrine\QueryBuilder\Filter\ORM\InnerJoin::class,
            //'leftjoin'  => ZF\Doctrine\QueryBuilder\Filter\ORM\LeftJoin::class,
        ],
        'factories' => [
            ZF\Doctrine\QueryBuilder\Filter\ORM\Equals::class              => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ORM\NotEquals::class           => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ORM\LessThan::class            => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ORM\LessThanOrEquals::class    => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ORM\GreaterThan::class         => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ORM\GreaterThanOrEquals::class => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ORM\IsNull::class              => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ORM\IsNotNull::class           => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ORM\In::class                  => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ORM\NotIn::class               => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ORM\Between::class             => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ORM\Like::class                => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ORM\NotLike::class             => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ORM\IsMemberOf::class          => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ORM\OrX::class                 => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ORM\AndX::class                => InvokableFactory::class,
            //ZF\Doctrine\QueryBuilder\Filter\ORM\InnerJoin::class           => InvokableFactory::class,
            //ZF\Doctrine\QueryBuilder\Filter\ORM\LeftJoin::class            => InvokableFactory::class,
        ],
    ],
    'zf-doctrine-querybuilder-filter-odm' => [
        'aliases' => [
            'eq'        => ZF\Doctrine\QueryBuilder\Filter\ODM\Equals::class,
            'neq'       => ZF\Doctrine\QueryBuilder\Filter\ODM\NotEquals::class,
            'lt'        => ZF\Doctrine\QueryBuilder\Filter\ODM\LessThan::class,
            'lte'       => ZF\Doctrine\QueryBuilder\Filter\ODM\LessThanOrEquals::class,
            'gt'        => ZF\Doctrine\QueryBuilder\Filter\ODM\GreaterThan::class,
            'gte'       => ZF\Doctrine\QueryBuilder\Filter\ODM\GreaterThanOrEquals::class,
            'isnull'    => ZF\Doctrine\QueryBuilder\Filter\ODM\IsNull::class,
            'isnotnull' => ZF\Doctrine\QueryBuilder\Filter\ODM\IsNotNull::class,
            'in'        => ZF\Doctrine\QueryBuilder\Filter\ODM\In::class,
            'notin'     => ZF\Doctrine\QueryBuilder\Filter\ODM\NotIn::class,
            'between'   => ZF\Doctrine\QueryBuilder\Filter\ODM\Between::class,
            'like'      => ZF\Doctrine\QueryBuilder\Filter\ODM\Like::class,
            'regex'     => ZF\Doctrine\QueryBuilder\Filter\ODM\Regex::class,
        ],
        'factories' => [
            ZF\Doctrine\QueryBuilder\Filter\ODM\Equals::class              => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ODM\NotEquals::class           => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ODM\LessThan::class            => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ODM\LessThanOrEquals::class    => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ODM\GreaterThan::class         => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ODM\GreaterThanOrEquals::class => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ODM\IsNull::class              => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ODM\IsNotNull::class           => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ODM\In::class                  => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ODM\NotIn::class               => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ODM\Between::class             => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ODM\Like::class                => InvokableFactory::class,
            ZF\Doctrine\QueryBuilder\Filter\ODM\Regex::class               => InvokableFactory::class,
        ],
    ]
];
