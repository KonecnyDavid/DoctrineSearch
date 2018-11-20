<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 24/09/2018
 * Time: 21:26
 */

namespace TheCookieShows\DoctrineSearch;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\QueryBuilder;

/**
 * For helping QueryBuilder in Repositories
 * Class QueryBuilderHelper
 * @package App\Utilities\Search
 */
class QueryBuilderHelper
{
    /**
     * Adds dql conditions based on given SearchableFields
     * Depends on type of SearchableField
     * @param QueryBuilder $queryBuilder
     * @param ArrayCollection $searchFieldCollection
     * @param string $qbName
     * @return QueryBuilder
     */
    public static function conditions(QueryBuilder $queryBuilder, ArrayCollection $searchFieldCollection, string $qbName) : QueryBuilder
    {
        foreach ($searchFieldCollection as $field){
            if ($field->getValue() !== "all"){
                $type = $field->getType();
                $type->addCriteria($queryBuilder, $qbName, $field);
            }
        }
        return $queryBuilder;
    }
}