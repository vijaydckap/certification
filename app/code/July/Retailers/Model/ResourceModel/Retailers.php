<?php


namespace DCKAP\Retailers\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Retailers extends AbstractDb
{
    private $regionFactory;
    private $regionResource;

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Magento\Directory\Model\ResourceModel\Region $regionResource,
        \Magento\Directory\Model\RegionFactory $regionFactory,
        $connectionName = null)
    {
        $this->regionResource = $regionResource;
        $this->regionFactory = $regionFactory;
        parent::__construct($context, $connectionName);
    }

    public function _construct()
    {
        $this->_init("dckap_retailers", 'id');
    }

    public function getRegion($region_id)
    {
        $regionModel = $this->regionFactory->create();
        $this->regionResource->load($regionModel, $region_id);
        return $regionModel->getName();
    }

    public function getAssociateProduct($retailerId)
    {
//        print_r($retailerId);
//        exit;
        $sql = $this->getConnection()->select()
            ->from('dckap_retailer_product')
            ->columns(['product_id'])
            ->where("retailer_id=?", $retailerId);

        $items = $this->getConnection()->fetchAll($sql);
        $productIds = [];
        foreach ($items as $value) {
            $productIds['p_id'] = $value['product_id'];
        }
        return $productIds;
//        return $this->getConnection()->fetchAll($sql, [], \PDO::FETCH_COLUMN);
    }
}