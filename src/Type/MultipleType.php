<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 20/11/2018
 * Time: 19:29
 */

namespace TheCookieShows\DoctrineSearch\Type;


use Doctrine\ORM\QueryBuilder;
use TheCookieShows\DoctrineSearch\Parser\StringToArrayInputParser;
use TheCookieShows\DoctrineSearch\SearchableField;

class MultipleType implements TypeInterface
{
    public function addCriteria(QueryBuilder $queryBuilder, string $qbName, SearchableField $field) : void
    {
        $queryBuilder->andWhere("$qbName.{$field->getName()} IN (:{$field->getName()})");
        $queryBuilder->setParameter($field->getName(), $field->getValue());
    }

    public function getParser()
    {
        return StringToArrayInputParser::class;
    }
}