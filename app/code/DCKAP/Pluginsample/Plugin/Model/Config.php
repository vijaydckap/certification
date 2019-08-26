<?php


namespace DCKAP\Pluginsample\Plugin\Model;


class Config
{
    const NEWEST_SORT_BY = 'newest';
    const NEWEST_SORT_BY_VALUE = 'Newest';
    /**
     * Adding new sort option
     *
     * @param \Magento\Catalog\Model\Config $subject
     * @param [] $result
     * @return array []
     */
    public function afterGetAttributeUsedForSortByArray(
        \Magento\Catalog\Model\Config $subject,
        $result
    ) {
        return array_merge(
            $result,
            [
                self::NEWEST_SORT_BY => __(self::NEWEST_SORT_BY_VALUE)
            ]
        );
    }
}