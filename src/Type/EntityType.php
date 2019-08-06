<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 20/11/2018
 * Time: 19:29
 */

namespace TheCookieShows\DoctrineSearch\Type;


use Doctrine\ORM\QueryBuilder;
use TheCookieShows\DoctrineSearch\SearchableField;

class EntityType implements TypeInterface
{
    private $join;

    public function __construct(string $join)
    {
        $this->join = $join;
    }

    public function addCriteria(QueryBuilder $queryBuilder, string $qbName, SearchableField $field) : void
    {
        $queryBuilder->join("$qbName.{$field->getName()}", "xx");
        $queryBuilder->andWhere("xx.$this->join LIKE :{$field->getName()}");
        $queryBuilder->setParameter($field->getName(), '%'.$field->getValue().'%');
    }
    public function getParser()
    {
        return false;
    }
}