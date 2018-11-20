<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 24/09/2018
 * Time: 23:03
 */

namespace TheCookieShows\DoctrineSearch\Parser;


/**
 * Class StringToArrayInputParser
 * @package App\Utilities\Search\Parser
 */
class StringToArrayInputParser implements InputParserInterface
{
    /**
     * Used for multiple SearchFields where conversion from string to array is needed
     * @param string $in
     * @return array|mixed
     */
    public static function parse(string $in)
    {
        return explode(',', $in);
    }
}