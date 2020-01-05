<?php

namespace NetUtils;

class Ip
{

    const CIDR_PATTERN = '/^([0-9]{1,3}\.){3}[0-9]{1,3}(\/([0-9]|[1-2][0-9]|3[0-2]))?$/';

    /**
     * Generate range of ip
     *
     * @param string $ipStart
     * @param string $ipFinal
     * @return \Generator
     */
    public static function range($ipStart, $ipFinal)
    {
        if (empty($ipStart) || empty($ipFinal)) {
            throw new \InvalidArgumentException('Ip start and final are required');
        }

        $ipA = ip2long($ipStart);
        $ipB = ip2long($ipFinal);
        while ($ipA <= $ipB) {
            yield long2ip($ipA++);
        }
    }

    /**
     * Generate range of ip via cidr notation
     *
     * @param string $notation
     * @return \Generator
     */
    public static function cidr($notation)
    {
        if (!preg_match(self::CIDR_PATTERN, $notation)) {
            throw new \InvalidArgumentException('Invalid cidr notation: ' . $notation);
        }

        $range = array();
        $cidr = explode('/', $notation);
        $range['ipStart'] = long2ip((ip2long($cidr[0])) & ((-1 << (32 - (int)$cidr[1]))));
        $range['ipFinal'] = long2ip((ip2long($range['ipStart'])) + pow(2, (32 - (int)$cidr[1])) - 1);
        return self::range($range['ipStart'], $range['ipFinal']);
    }
}
