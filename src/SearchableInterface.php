<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 24/09/2018
 * Time: 20:09
 */

namespace TheCookieShows\DoctrineSearch;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * Interface to derive Repositories from to implement search functionality
 * Interface SearchableInterface
 * @package App\Utilities\Search
 */
interface SearchableInterface
{
    /**
     * Basic search function
     * @param string $orderBy
     * @param string $direction
     * @param ArrayCollection $searchFieldCollection
     * @return array|null
     */
    public function findBySearchCriteria(string $orderBy, string $direction, ArrayCollection $searchFieldCollection, int $page, int $limit) : ?Paginator;
}