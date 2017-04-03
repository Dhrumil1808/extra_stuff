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

namespace Magento\Mtf\TestSuite;

use Magento\Mtf\ObjectManager;
use Magento\Mtf\ObjectManagerFactory;

/**
<<<<<<< HEAD
 * Injectable tests class.
=======
 * Class InjectableTests
 *
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
 */
class InjectableTests extends \PHPUnit_Framework_TestSuite
{
    /**
<<<<<<< HEAD
     * Object manager.
     *
=======
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     * @var ObjectManager
     */
    protected $objectManager;

    /**
<<<<<<< HEAD
     * Test suite.
     *
=======
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     * @var \PHPUnit_Framework_TestSuite
     */
    protected $suite;

    /**
<<<<<<< HEAD
     * Test result
     *
=======
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     * @var \PHPUnit_Framework_TestResult
     */
    protected $result;

    /**
<<<<<<< HEAD
     * Run collected tests.
=======
     * Run collected tests
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @param \PHPUnit_Framework_TestResult $result
     * @param bool $filter
     * @param array $groups
     * @param array $excludeGroups
     * @param bool $processIsolation
<<<<<<< HEAD
=======
     *
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     * @return \PHPUnit_Framework_TestResult|void
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function run(
        \PHPUnit_Framework_TestResult $result = null,
        $filter = false,
        array $groups = [],
        array $excludeGroups = [],
        $processIsolation = false
    ) {
        if ($result === null) {
            $this->result = $this->createResult();
        }
    }

    /**
<<<<<<< HEAD
     * Prepare test suite.
=======
     * Prepare test suite
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @return mixed
     */
    public static function suite()
    {
        $suite = new self();
        return $suite->prepareSuite();
    }

    /**
<<<<<<< HEAD
     * Prepare test suite and apply application state.
     *
     * @return AppState
=======
     * Prepare test suite and apply application state
     *
     * @return \Magento\Mtf\TestSuite\AppState
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     */
    public function prepareSuite()
    {
        $this->init();
        return $this->objectManager->create('Magento\Mtf\TestSuite\AppState');
    }

    /**
<<<<<<< HEAD
     * Call the initialization of ObjectManager.
     *
     * @return void
=======
     * Call the initialization of ObjectManager
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     */
    public function init()
    {
        $this->initObjectManager();
    }

    /**
<<<<<<< HEAD
     * Initialize ObjectManager.
     *
     * @return void
=======
     * Initialize ObjectManager
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     */
    private function initObjectManager()
    {
        if (!isset($this->objectManager)) {
            $objectManagerFactory = new ObjectManagerFactory();

            $configFileName = isset($_ENV['testsuite_rule']) ? $_ENV['testsuite_rule'] : 'basic';
            $configFilePath = realpath(MTF_BP . '/testsuites/' . $_ENV['testsuite_rule_path']);

            /** @var \Magento\Mtf\Config\DataInterface $configData */
            $configData = $objectManagerFactory->getObjectManager()->create('Magento\Mtf\Config\TestRunner');
            $configData->setFileName($configFileName . '.xml')->load($configFilePath);

            $this->objectManager = $objectManagerFactory->create(
                ['Magento\Mtf\Config\TestRunner' => $configData]
            );
        }
    }
}
