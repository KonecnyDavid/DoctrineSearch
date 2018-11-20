<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 20/11/2018
 * Time: 19:25
 */

namespace TheCookieShows\DoctrineSearch\Type;


use Doctrine\ORM\QueryBuilder;
use TheCookieShows\DoctrineSearch\SearchableField;

class DefaultType implements TypeInterface
{
    public function addCriteria(QueryBuilder $queryBuilder, string $qbName, SearchableField $field) : void
    {
        $queryBuilder->andWhere("$qbName.{$field->getName()} {$field->getOperator()} :{$field->getName()}");
        $queryBuilder->setParameter($field->getName(), $field->getValue());
    }

    public function getParser()
    {
        return false;
    }
}