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

namespace Magento\Mtf\Client\Element;

use Magento\Mtf\Client\Locator;

/**
<<<<<<< HEAD
 * Typified element class for Multiple Select List elements.
=======
 * Typified element class for  Multiple Select List elements
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
 */
class MultiselectlistElement extends MultiselectElement
{
    /**
<<<<<<< HEAD
     * Multiple select list options selector.
     *
     * @var string
     */
    protected $optionElement = 'option';

    /**
     * Get all options from multiple select list.
=======
     * XPath selector for finding option by its position number
     *
     * @var string
     */
    protected $optionElement = './/*[contains(@class,"mselect-list-item")][%d]/label';

    /**
     * XPath selector for checking is option checked
     *
     * @var string
     */
    protected $optionCheckedElement = './/*[contains(@class, "mselect-checked")]/following-sibling::span';

    /**
     * Option locator by value.
     *
     * @var string
     */
    protected $optionByValue = './/*[contains(@class,"mselect-list-item")]/label[contains(normalize-space(.), %s)]';

    /**
     * Select options by values in multiple select list
     *
     * @param array|string $values
     * @throws \Exception
     */
    public function setValue($values)
    {
        $options = $this->getOptions();
        $values = is_array($values) ? $values : [$values];

        foreach ($options as $option) {
            /** @var \Magento\Mtf\Client\ElementInterface $option */
            $optionText = $option->getText();
            $isChecked = $option->find($this->optionCheckedElement, Locator::SELECTOR_XPATH)->isVisible();
            $inArray = in_array($optionText, $values);
            if (($isChecked && !$inArray) || (!$isChecked && $inArray)) {
                $option->click();
            }
        }
    }

    /**
     * Method that returns array with checked options in multiple select list
     *
     * @return array|string
     */
    public function getValue()
    {
        $checkedOptions = [];
        $options = $this->getOptions();

        foreach ($options as $option) {
            /** @var \Magento\Mtf\Client\ElementInterface $option */
            $checkedOption = $option->find($this->optionCheckedElement, Locator::SELECTOR_XPATH);
            if ($checkedOption->isVisible()) {
                $checkedOptions[] = $checkedOption->getText();
            }
        }

        return $checkedOptions;
    }

    /**
     * Getting all options in multi select list
     *
     * @return array
     */
    protected function getOptions()
    {
        $options = [];
        $counter = 1;

        $newOption = $this->find(sprintf($this->optionElement, $counter), Locator::SELECTOR_XPATH);
        while ($newOption->isVisible()) {
            $options[] = $newOption;
            $counter++;
            $newOption = $this->find(sprintf($this->optionElement, $counter), Locator::SELECTOR_XPATH);
        }

        return $options;
    }

    /**
     * Method that returns array with all options in multiple select list
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @return array
     */
    public function getAllValues()
    {
        $optionsValue = [];
<<<<<<< HEAD
        $options = $this->getElements($this->optionElement);
=======
        $options = $this->getOptions();
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32

        foreach ($options as $option) {
            /** @var \Magento\Mtf\Client\ElementInterface $option */
            $optionsValue[] = $option->getText();
        }

        return $optionsValue;
    }

    /**
     * Check whether value is visible in the list.
     *
     * @param string $value
     * @return bool
     */
    public function isValueVisible($value)
    {
        $option = $this->find(sprintf($this->optionByValue, $this->escapeQuotes($value)), Locator::SELECTOR_XPATH);
        return $option->isVisible();
    }
<<<<<<< HEAD

=======
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
}
