sudo php bin/magento setup:upgrade
sudo php bin/magento setup:di:compile
sudo php bin/magento setup:static-content:deploy -f
sudo php bin/magento cache:flush
sudo chmod 777 -R .
