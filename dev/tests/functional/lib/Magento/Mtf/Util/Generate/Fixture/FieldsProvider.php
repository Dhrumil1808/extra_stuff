<?php
/**
<<<<<<< HEAD
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Tests
 * @package     Tests_Functional
 * @copyright  Copyright (c) 2006-2016 X.commerce, Inc. and affiliates (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
=======
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
 */

namespace Magento\Mtf\Util\Generate\Fixture;

<<<<<<< HEAD
/**
 * Fixture fields provider.
 */
class FieldsProvider implements FieldsProviderInterface
{
    /**
     * @constructor
     */
    public function __construct()
    {
        $this->initMage();
=======
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\ObjectManagerInterface;
use Magento\Eav\Model\Config;
use Magento\Framework\DB\Adapter\AdapterInterface;

/**
 * Provider of fields from database.
 */
class FieldsProvider
{
    /**
     * EAV configuration.
     *
     * @var Config
     */
    protected $eavConfig;

    /**
     * Resources and connections registry and factory.
     *
     * @var Resource
     */
    protected $resource;

    /**
     * Magento connection.
     *
     * @var AdapterInterface
     */
    protected $connection;

    /**
     * @constructor
     * @param ObjectManagerInterface $objectManager
     */
    public function __construct(ObjectManagerInterface $objectManager)
    {
        $this->eavConfig = $objectManager->create('Magento\Eav\Model\Config');
        $this->resource = $objectManager->create('Magento\Framework\App\ResourceConnection');
    }

    /**
     * Check connection to DB.
     *
     * @return bool
     */
    public function checkConnection()
    {
        $this->connection = $this->getConnection('core');
        if (!$this->connection || $this->connection instanceof \Zend_Db_Adapter_Exception) {
            echo ('Connection to Magento 2 database is absent. Fixture data has not been fetched.' . PHP_EOL);
            return false;
        }

        return true;
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
    }

    /**
     * Collect fields for the entity based on its type.
     *
     * @param array $fixture
     * @return array
     */
    public function getFields(array $fixture)
    {
        $method = $fixture['type'] . 'CollectFields';
        if (!method_exists($this, $method)) {
            return [];
        }

        return $this->$method($fixture);
    }

    /**
     * Collect fields for the entity with eav type.
     *
     * @param array $fixture
     * @return array
     */
    protected function eavCollectFields(array $fixture)
    {
<<<<<<< HEAD
        $entity = $fixture['entity_type'];
        $collection = \Mage::getSingleton('eav/config')->getEntityType($entity)->getAttributeCollection();
=======
        $entityType = $fixture['entity_type'];
        $collection = $this->eavConfig->getEntityType($entityType)->getAttributeCollection();
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
        $attributes = [];
        foreach ($collection as $attribute) {
            if (isset($fixture['product_type'])) {
                $applyTo = $attribute->getApplyTo();
                if (!empty($applyTo) && !in_array($fixture['product_type'], $applyTo)) {
                    continue;
                }
            }
<<<<<<< HEAD

            /** @var \Mage_Eav_Model_Attribute $attribute */
            $code = $attribute->getAttributeCode();
            $attributes[$code] = array(
=======
            /** @var $attribute \Magento\Eav\Model\Entity\Attribute */
            $code = $attribute->getAttributeCode();
            $attributes[$code] = [
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
                'attribute_code' => $code,
                'backend_type' => $attribute->getBackendType(),
                'is_required' => $attribute->getIsRequired(),
                'default_value' => $attribute->getDefaultValue(),
<<<<<<< HEAD
                'input' => $attribute->getFrontendInput()
            );
=======
                'input' => $attribute->getFrontendInput(),
            ];
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
        }

        return $attributes;
    }

    /**
     * Collect fields for the entity with table type.
     *
     * @param array $fixture
     * @return array
     */
    protected function tableCollectFields(array $fixture)
    {
        return $this->flatCollectFields($fixture);
    }

    /**
     * Collect fields for the entity with flat type.
     *
     * @param array $fixture
     * @return array
     */
    protected function flatCollectFields(array $fixture)
    {
        $entityType = $fixture['entity_type'];
<<<<<<< HEAD
        $fields = $this->getConnection()->describeTable($this->retrieveTableName($entityType));

        $attributes = [];
        foreach ($fields as $code => $field) {
            $attributes[$code] = array(
=======

        /** @var $connection \Magento\Framework\DB\Adapter\AdapterInterface */
        $fields = $this->connection->describeTable($entityType);

        $attributes = [];
        foreach ($fields as $code => $field) {
            $attributes[$code] = [
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
                'attribute_code' => $code,
                'backend_type' => $field['DATA_TYPE'],
                'is_required' => ($field['PRIMARY'] || $field['IDENTITY']),
                'default_value' => $field['DEFAULT'],
<<<<<<< HEAD
                'input' => ''
            );
=======
                'input' => '',
            ];
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
        }

        return $attributes;
    }

    /**
     * Collect fields for the entity with composite type.
     *
     * @param array $fixture
     * @return array
     */
    protected function compositeCollectFields(array $fixture)
    {
        $entityTypes = $fixture['entities'];

<<<<<<< HEAD
        $connection = $this->getConnection();
        $fields = [];
        foreach ($entityTypes as $entityType) {
            $fields = array_merge($fields, $connection->describeTable($this->retrieveTableName($entityType)));
=======
        $fields = [];
        foreach ($entityTypes as $entityType) {
            $fields = array_merge($fields, $this->connection->describeTable($entityType));
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
        }

        $attributes = [];
        foreach ($fields as $code => $field) {
            $attributes[$code] = [
                'attribute_code' => $code,
                'backend_type' => $field['DATA_TYPE'],
                'is_required' => ($field['PRIMARY'] || $field['IDENTITY']),
                'default_value' => $field['DEFAULT'],
<<<<<<< HEAD
                'input' => ''
=======
                'input' => '',
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
            ];
        }

        return $attributes;
    }

    /**
<<<<<<< HEAD
     * Mage init.
     *
     * @return void
     */
    protected function initMage()
    {
        require_once realpath(__DIR__ . "/../../../../../../../../../app/Mage.php");
        \Mage::app('default');
    }

    /**
     * Get DB connection.
     *
     * @return \Magento_Db_Adapter_Pdo_Mysql
     */
    protected function getConnection()
    {
        return \Mage::getSingleton('core/resource')->getConnection('core_write');
    }

    /**
     * Get DB table name with prefix.
     *
     * @param string $entity
     * @return string
     */
    protected function retrieveTableName($entity)
    {
        return \Mage::getSingleton('core/resource')->getTableName($entity);
    }

    /**
     * Check connection to DB.
     *
     * @return bool
     */
    public function checkConnection()
    {
        return $this->getConnection();
=======
     * Retrieve connection to resource specified by $resourceName.
     *
     * @param string $resourceName
     * @return \Exception|false|\Magento\Framework\DB\Adapter\AdapterInterface|\Zend_Exception
     */
    protected function getConnection($resourceName)
    {
        try {
            $connection = $this->resource->getConnection($resourceName);
            return $connection;
        } catch (\Zend_Exception $e) {
            echo $e->getMessage() . PHP_EOL;
            return $e;
        }
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
    }
}
