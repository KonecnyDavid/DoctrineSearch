<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 24/09/2018
 * Time: 19:47
 */

namespace TheCookieShows\DoctrineSearch;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Request;

/**
 * Search Engine base class
 * Here should be all Engine related methods
 * Class SearchEngine
 * @package App\Utilities\Search
 */
class SearchEngine
{
    private $repository;

    private $limit;

    private $queryProcessor;

    private $searchFields;
    /**
     * @var ?Paginator
     */
    private $result;

    public function __construct(
        SearchableInterface $repository,
        ArrayCollection $searchFieldCollection,
        Request $request,
        int $limit = 15
    ){
        $this->repository = $repository;
        $this->limit = $limit;
        $this->queryProcessor = new QueryProcessor($request, $searchFieldCollection);
        $this->searchFields = $this->queryProcessor->getSearchFieldsCollection();
    }

    /**
     * @param SearchableInterface $repository
     * @param Request $request
     * @param ArrayCollection $searchFieldCollection
     * @return ArrayCollection
     */
    public function search() : self
    {
        $this->result = $this->repository->findBySearchCriteria(
            $this->queryProcessor->getOrderBy(),
            $this->queryProcessor->getDirection(),
            $this->searchFields,
            $this->queryProcessor->getPage(),
            $this->limit
        );
        return $this;
    }

    public function getMaxPages()
    {
        return ceil($this->result->count()/$this->limit);
    }
    /**
     * @return mixed
     */
    public function getResult() : Paginator
    {
        return $this->result;
    }

    public function getCurrentPage() : int
    {
        return $this->queryProcessor->getPage();
    }

    public function getQueryParams() : array
    {
        $params = [];
        foreach ($this->searchFields as $field){
            if ($field->hasValue())
                $params[$field->getName()] = $field->getPlainValue();
        }
        return $params;
    }
}