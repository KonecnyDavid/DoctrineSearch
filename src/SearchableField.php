<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 24/09/2018
 * Time: 20:58
 */

namespace TheCookieShows\DoctrineSearch;


use TheCookieShows\DoctrineSearch\Parser\InputParserInterface;
use TheCookieShows\DoctrineSearch\Parser\StringToArrayInputParser;
use TheCookieShows\DoctrineSearch\Type\TypeInterface;

/**
 * Representing SearchableField
 * Class SearchableField
 * @package App\Utilities\Search
 */
class SearchableField
{
    const DEFAULT_VALUE = "all";

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $operator;

    /**
     * @var TypeInterface
     */
    private $type;

    /**
     * SearchableField constructor.
     * @param string $name
     * @param string $value
     * @param string $operator
     * @param string $type
     */
    public function __construct(string $name, TypeInterface $type, string $value = self::DEFAULT_VALUE, string $operator = "=")
    {
        $this->name = $name;
        $this->value = $value;
        $this->operator = $operator;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Formats Value to given format based on Type
     * @return string
     */
    public function getValue()
    {
        $parser = $this->type->getParser();

        if($parser == false || $this->value == self::DEFAULT_VALUE)
            return $this->value;

        return $parser::parse($this->value);

    }

    public function getPlainValue() : string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return TypeInterface
     */
    public function getType()
    {
        return $this->type;
    }

    public function hasValue() : bool
    {
      return !($this->value == self::DEFAULT_VALUE);
    }
}