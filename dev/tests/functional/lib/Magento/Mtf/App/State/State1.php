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
=======
use Magento\Mtf\ObjectManager;

>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
/**
 * Example Application State class.
 */
class State1 extends AbstractState
{
    /**
<<<<<<< HEAD
     * Get name of the Application State Profile.
=======
     * Object Manager.
     *
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * Data for configuration state.
     *
     * @var string
     */
    protected $config ='admin_session_lifetime_1_hour, wysiwyg_disabled, admin_account_sharing_enable';

    /**
     * @construct
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Apply set up configuration profile.
     *
     * @return void
     */
    public function apply()
    {
        parent::apply();
        if (file_exists(dirname(dirname(dirname(MTF_BP))) . '/app/etc/config.php')) {
            $this->objectManager->create(
                '\Magento\Config\Test\TestStep\SetupConfigurationStep',
                ['configData' => $this->config]
            )->run();
        }
    }

    /**
     * Get name of the Application State Profile.
     *
     * @return string
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     */
    public function getName()
    {
        return 'Configuration Profile #1';
    }
}
