<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 24/09/2018
 * Time: 19:47
 */

namespace TheCookieShows\DoctrineSearch;


use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;

/**
 * Search Engine base class
 * Here should be all Engine related methods
 * Class SearchEngine
 * @package App\Utilities\Search
 */
class SearchEngine
{
    /**
     * @param SearchableInterface $repository
     * @param Request $request
     * @param ArrayCollection $searchFieldCollection
     * @return ArrayCollection
     */
    public function search(SearchableInterface $repository, Request $request, ArrayCollection $searchFieldCollection) : ArrayCollection
    {
        $queryProcessor = new QueryProcessor($request, $searchFieldCollection);
        $searchFieldCollection = $queryProcessor->getSearchFieldsCollection();

        return new ArrayCollection($repository->findBySearchCriteria($queryProcessor->getOrderBy(), $queryProcessor->getDirection(), $searchFieldCollection));
    }
}