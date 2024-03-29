<?php

namespace Visol\GoogleCloudStorage\Utility;

/*
 * This file is part of the Visol/GoogleCloudStorage project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

/**
 * Class SortingUtility
 */
class SortingUtility
{

    /**
     * @param array $a
     * @param array $b
     * @return int
     */
    public static function sortByTimeStampAsc(array $a, array $b): int
    {
        $valueA = strtotime($a['updated']);
        $valueB = strtotime($b['updated']);
        if ($valueA === $valueB) {
            return 0;
        }
        return ($valueA < $valueB) ? -1 : 1;
    }

    /**
     * @param array $a
     * @param array $b
     * @return int
     */
    public static function sortByTimeStampDesc(array $a, array $b): int
    {
        $valueA = strtotime($a['updated']);
        $valueB = strtotime($b['updated']);
        if ($valueA === $valueB) {
            return 0;
        }
        return ($valueA > $valueB) ? -1 : 1;
    }

    /**
     * @param array $a
     * @param array $b
     * @return int
     */
    public static function sortByFileNameAsc(array $a, array $b): int
    {
        $valueA = strtolower($a['filename']);
        $valueB = strtolower($b['filename']);
        if ($valueA === $valueB) {
            return 0;
        }
        return ($valueA < $valueB) ? -1 : 1;
    }

    /**
     * @param array $a
     * @param array $b
     * @return int
     */
    public static function sortByFileNameDesc(array $a, array $b): int
    {
        $valueA = strtolower($a['filename']);
        $valueB = strtolower($b['filename']);
        if ($valueA === $valueB) {
            return 0;
        }
        return ($valueA > $valueB) ? -1 : 1;
    }
}
