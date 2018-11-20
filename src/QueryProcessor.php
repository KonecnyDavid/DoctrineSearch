<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 24/09/2018
 * Time: 20:21
 */

namespace TheCookieShows\DoctrineSearch;


use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;

/**
 * For processing query parameters
 * Class QueryProcessor
 * @package App\Utilities\Search
 */
class QueryProcessor
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var \Symfony\Component\HttpFoundation\ParameterBag
     */
    private $query;
    /**
     * @var ArrayCollection
     */
    private $searchFieldCollection;

    /**
     * QueryProcessor constructor.
     * @param Request $request
     * @param ArrayCollection $searchFieldCollection
     */
    public function __construct(Request $request, ArrayCollection $searchFieldCollection)
    {
        $this->request = $request;
        $this->query = $request->query;
        $this->searchFieldCollection = $searchFieldCollection;
    }

    /**
     * Returns OrderBy Parameter
     * @return string
     */
    public function getOrderBy() : string
    {
        return $this->query->has('orderBy') ? $this->query->get('orderBy') : 'id';
    }

    /**
     * Returns Direction Parameter
     * @return string
     */
    public function getDirection() : string
    {
        return $this->query->has('direction') ? $this->query->get('direction') : 'ASC';
    }

    /**
     * Returns Page Parameter
     * @return int
     */
    public function getPage() : int
    {
        return $this->query->has('page') ? $this->query->get('page') : 1;
    }

    /**
     * Returns all SearchableFields filled with data from Https query
     * @return ArrayCollection
     */
    public function getSearchFieldsCollection() : ArrayCollection
    {
        foreach ($this->searchFieldCollection as $field){
            if ($this->query->has($field->getName())){
                $field->setValue($this->query->get($field->getName()));
            }
        }
        return $this->searchFieldCollection;
    }
}