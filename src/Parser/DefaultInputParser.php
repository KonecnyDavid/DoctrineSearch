<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 24/09/2018
 * Time: 23:01
 */

namespace TheCookieShows\DoctrineSearch\Parser;


/**
 * Class DefaultInputParser
 * @package App\Utilities\Search\Parser
 */
class DefaultInputParser implements InputParserInterface
{
    /**
     * Input parser used for default string to string parse
     * @param string $in
     * @return mixed|string
     */
    public static function parse(string $in)
    {
        return $in;
    }
}