<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 24/09/2018
 * Time: 23:01
 */

namespace TheCookieShows\DoctrineSearch\Parser;


/**
 * Interface InputParserInterface
 * @package App\Utilities\Search\Parser
 */
interface InputParserInterface
{
    /**
     * Parses string to given format
     * @param string $in
     * @return mixed
     */
    public static function parse(string $in);
}