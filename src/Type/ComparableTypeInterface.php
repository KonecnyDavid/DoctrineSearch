<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 20/11/2018
 * Time: 19:36
 */

namespace TheCookieShows\DoctrineSearch\Type;


use Doctrine\ORM\QueryBuilder;
use TheCookieShows\DoctrineSearch\SearchableField;

interface ComparableTypeInterface extends TypeInterface
{
    public function addCriteria(QueryBuilder $queryBuilder, string $qbName, SearchableField $field , string $comparator = "=") : void;
}