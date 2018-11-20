<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 20/11/2018
 * Time: 19:24
 */

namespace TheCookieShows\DoctrineSearch\Type;


use Doctrine\ORM\QueryBuilder;
use RequestParameterManager\Parser\ParserInterface;
use TheCookieShows\DoctrineSearch\SearchableField;

interface TypeInterface
{
    public function addCriteria(QueryBuilder $queryBuilder, string $qbName, SearchableField $field) : void;

    public function getParser();
}