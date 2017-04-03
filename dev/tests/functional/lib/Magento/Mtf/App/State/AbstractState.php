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

namespace Magento\Mtf\App\State;

<<<<<<< HEAD
/**
 * Abstract class AbstractState.
=======
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Config\ConfigOptionsListConstants;
use Magento\Framework\App\DeploymentConfig\Reader;
use Magento\Framework\App\DeploymentConfig;

/**
 * Abstract class AbstractState
 *
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
 */
abstract class AbstractState implements StateInterface
{
    /**
<<<<<<< HEAD
     * Specifies whether to clean instance under test.
=======
     * Specifies whether to clean instance under test
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @var bool
     */
    protected $isCleanInstance = false;

    /**
<<<<<<< HEAD
     * Apply set up configuration profile.
     *
     * @return void
     */
    public function apply()
    {
        //
    }

    /**
     * Clear Magento instance: remove all tables in DB and use dump to load new ones, clear Magento cache.
     *
     * @return void
     */
    public function clearInstance()
    {
        //
=======
     * @inheritdoc
     */
    public function apply()
    {
        if ($this->isCleanInstance) {
            $this->clearInstance();
        }
    }

    /**
     * Clear Magento instance: remove all tables in DB and use dump to load new ones, clear Magento cache
     *
     * @throws \Exception
     */
    public function clearInstance()
    {
        $dirList = \Magento\Mtf\ObjectManagerFactory::getObjectManager()
            ->get('Magento\Framework\Filesystem\DirectoryList');

        $configFilePool = \Magento\Mtf\ObjectManagerFactory::getObjectManager()
            ->get('\Magento\Framework\Config\File\ConfigFilePool');

        $driverPool = \Magento\Mtf\ObjectManagerFactory::getObjectManager()
            ->get('\Magento\Framework\Filesystem\DriverPool');

        $reader = new Reader($dirList, $driverPool, $configFilePool);
        $deploymentConfig = new DeploymentConfig($reader);
        $host = $deploymentConfig->get(
            ConfigOptionsListConstants::CONFIG_PATH_DB_CONNECTION_DEFAULT . '/' . ConfigOptionsListConstants::KEY_HOST
        );
        $user = $deploymentConfig->get(
            ConfigOptionsListConstants::CONFIG_PATH_DB_CONNECTION_DEFAULT . '/' . ConfigOptionsListConstants::KEY_USER
        );
        $password = $deploymentConfig->get(
            ConfigOptionsListConstants::CONFIG_PATH_DB_CONNECTION_DEFAULT .
            '/' . ConfigOptionsListConstants::KEY_PASSWORD
        );
        $database = $deploymentConfig->get(
            ConfigOptionsListConstants::CONFIG_PATH_DB_CONNECTION_DEFAULT . '/' . ConfigOptionsListConstants::KEY_NAME
        );

        $fileName = MTF_BP . '/' . $database . '.sql';
        if (!file_exists($fileName)) {
            echo('Database dump was not found by path: ' . $fileName);
            return;
        }

        // Drop all tables in database
        $mysqli = new \mysqli($host, $user, $password, $database);
        $mysqli->query('SET foreign_key_checks = 0');
        if ($result = $mysqli->query("SHOW TABLES")) {
            while ($row = $result->fetch_row()) {
                $mysqli->query('DROP TABLE ' . $row[0]);
            }
        }
        $mysqli->query('SET foreign_key_checks = 1');
        $mysqli->close();

        // Load database dump
        exec("mysql -u{$user} -p{$password} {$database} < {$fileName}", $output, $result);
        if ($result) {
            throw new \Exception('Database dump loading has been failed: ' . $output);
        }

        // Clear cache
        exec("rm -rf {$dirList->getPath(DirectoryList::VAR_DIR)}/*", $output, $result);
        if ($result) {
            throw new \Exception('Cleaning Magento cache has been failed: ' . $output);
        }
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
    }
}
