<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 24/09/2018
 * Time: 23:15
 */

namespace TheCookieShows\DoctrineSearch\Paginator;


use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * Trait PaginatorTrait
 * @package App\Utilities\Search\Paginator
 * Shorthand trait used for paginating
 */
trait PaginatorTrait
{
    /**
     * @param $dql
     * @param int $page
     * @param int $limit
     * @return Paginator
     * Paginate method
     */
    private function paginate($dql, $page = 1, $limit = 10) : Paginator
    {
        $paginator = new Paginator($dql);

        $paginator->getQuery()
            ->setFirstResult($limit * ($page - 1)) // Offset
            ->setMaxResults($limit); // Limit

        return $paginator;
    }
}