<?php


namespace DCKAP\Pluginsample\Plugin\Product\ProductList;


class Toolbar
{
    /**
     * @param \Magento\Framework\Registry $registry
     */
    const NEW_SORT = 'New';
    protected $_registry;
    protected $request;
    public function __construct(
        \Magento\Framework\Registry $registry,
        \Magento\Framework\App\RequestInterface $request
    ) {
        $this->_registry = $registry;
        $this->request = $request;
    }
    const NEWEST_SORT_BY = 'newest';

    /**
     * Around Plugin
     *
     * @param \Magento\Catalog\Block\Product\ProductList\Toolbar $subject
     * @param \Closure $proceed
     * @param \Magento\Framework\Data\Collection $collection
     * @return \Magento\Catalog\Block\Product\ProductList\Toolbar
     */
    public function aroundSetCollection(
        \Magento\Catalog\Block\Product\ProductList\Toolbar $subject,
        \Closure $proceed,
        $collection
    ) {
        $currentOrder = $subject->getCurrentOrder();
        $currentDirection = $subject->getCurrentDirection();
        $result = $proceed($collection);

        if ($currentOrder == self::NEWEST_SORT_BY) {
            if ($currentDirection == 'desc') {
                $subject->getCollection()->setOrder('created_at', 'asc');
            } else {
                $subject->getCollection()->setOrder('created_at', 'desc');
            }
        }

        return $result;
    }

    public function afterGetCurrentOrder(\Magento\Catalog\Block\Product\ProductList\Toolbar $sort, $order)
    {
        $category = $this->_registry->registry('current_category');//To do use catlog session insted of registry
        if (count($this->request->getParams()) < 2) {
            if ($category->getName()==self::NEW_SORT) {//To do Get value from config
                $order= "newest";
            }
        }
        return $order;
    }
}