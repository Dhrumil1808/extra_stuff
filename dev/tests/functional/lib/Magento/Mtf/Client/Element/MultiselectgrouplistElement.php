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
use Magento\Mtf\Client\ElementInterface;

/**
<<<<<<< HEAD
 * Typified element class for multiselect with group.
=======
 * Class MultiselectgrouplistElement
 * Typified element class for multiselect with group
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
 */
class MultiselectgrouplistElement extends MultiselectElement
{
    /**
<<<<<<< HEAD
     * Indent length.
=======
     * Indent length
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     */
    const INDENT_LENGTH = 4;

    /**
<<<<<<< HEAD
     * Locator for search optgroup by label.
=======
     * Locator for search optgroup by label
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @var string
     */
    protected $optgroupByLabel = './/optgroup[@label="%s"]';

    /**
<<<<<<< HEAD
     * Locator for search optgroup by number.
=======
     * Locator for search optgroup by number
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @var string
     */
    protected $optgroupByNumber = './/optgroup[%d]';

    /**
<<<<<<< HEAD
     * Locator for search next optgroup.
=======
     * Locator for search next optgroup
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @var string
     */
    protected $nextOptgroup = './/following-sibling::optgroup[%d]';

    /**
<<<<<<< HEAD
     * Locator for search child optgroup.
=======
     * Locator for search child optgroup
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @var string
     */
    protected $childOptgroup = ".//following-sibling::optgroup[%d][@label='%s']";

    /**
<<<<<<< HEAD
     * Locator for search parent optgroup.
=======
     * Locator for search parent optgroup
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @var string
     */
    protected $parentOptgroup = 'optgroup[option[text()="%s"]]';

    /**
<<<<<<< HEAD
     * Locator for search preceding sibling optgroup.
=======
     * Locator for search preceding sibling optgroup
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @var string
     */
    protected $precedingOptgroup = '/preceding-sibling::optgroup[1][substring(@label,1,%d)="%s"]';

    /**
<<<<<<< HEAD
     * Locator for option.
=======
     * Locator for option
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @var string
     */
    protected $option = './/option[text()="%s"]';

    /**
<<<<<<< HEAD
     * Locator search for option by number.
=======
     * Locator search for option by number
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @var string
     */
    protected $childOptionByNumber = './/optgroup[%d]/option[%d]';

    /**
<<<<<<< HEAD
     * Locator for search parent option.
=======
     * Locator search for option by data-text attribute
     *
     * @var string
     */
    protected $uiOptionText = './/option[@data-title="%s"]';

    /**
     * Locator for search parent option
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @var string
     */
    protected $optionByNumber = './option[%d]';

    /**
<<<<<<< HEAD
     * Indent, four symbols non breaking space.
=======
     * Indent, four symbols non breaking space
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @var string
     */
    protected $indent = "\xC2\xA0\xC2\xA0\xC2\xA0\xC2\xA0";

    /**
<<<<<<< HEAD
     * Trim symbols.
=======
     * Trim symbols
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @var string
     */
    protected $trim = "\xC2\xA0 ";

    /**
<<<<<<< HEAD
     * Set values.
=======
     * Set values
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @param array|string $values
     * @return void
     */
    public function setValue($values)
    {
        $this->deselectAll();
        $values = is_array($values) ? $values : [$values];
        foreach ($values as $value) {
            $this->selectOption($value);
        }
    }

    /**
<<<<<<< HEAD
     * Select option.
=======
     * Select option
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @param string $option
     * @return void
     * @throws \Exception
     */
    protected function selectOption($option)
    {
<<<<<<< HEAD
=======
        $optionElement = $this->find(sprintf($this->uiOptionText, $option), Locator::SELECTOR_XPATH);
        if ($optionElement->isVisible()) {
            if (!$optionElement->isSelected()) {
                $optionElement->click();
            }
            return;
        }

>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
        $isOptgroup = false;
        $optgroupIndent = '';
        $values = explode('/', $option);
        $context = $this;

        foreach ($values as $value) {
            $optionIndent = $isOptgroup ? $this->indent : '';
            $optionElement = $context->find(sprintf($this->option, $optionIndent . $value), Locator::SELECTOR_XPATH);
            if ($optionElement->isVisible()) {
                if (!$optionElement->isSelected()) {
                    $optionElement->click();
                }
                return;
            }

            $value = $optgroupIndent . $value;
            $optgroupIndent .= $this->indent;
            if ($isOptgroup) {
                $context = $this->getChildOptgroup($value, $context);
            } else {
                $context = $this->getOptgroup($value, $context);
                $isOptgroup = true;
            }
        }
        throw new \Exception("Can't find option \"{$option}\".");
    }

    /**
<<<<<<< HEAD
     * Get optgroup.
=======
     * Get optgroup
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @param string $value
     * @param ElementInterface $context
     * @return ElementInterface
     * @throws \Exception
     */
    protected function getOptgroup($value, ElementInterface $context)
    {
        $optgroup = $context->find(sprintf($this->optgroupByLabel, $value), Locator::SELECTOR_XPATH);
        if (!$optgroup->isVisible()) {
            throw new \Exception("Can't find group \"{$value}\".");
        }

        return $optgroup;
    }

    /**
<<<<<<< HEAD
     * Get child optgroup.
=======
     * Get child optgroup
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @param string $value
     * @param ElementInterface $context
     * @return ElementInterface
     * @throws \Exception
     */
    protected function getChildOptgroup($value, ElementInterface $context)
    {
        $childOptgroup = null;
        $count = 1;
        while (!$childOptgroup) {
            $optgroup = $context->find(sprintf($this->nextOptgroup, $count), Locator::SELECTOR_XPATH);
            if (!$optgroup->isVisible()) {
                throw new \Exception("Can't find child group \"{$value}\"");
            }

            $childOptgroup = $context->find(
                sprintf($this->childOptgroup, $count, $value),
                Locator::SELECTOR_XPATH
            );
            if (!$childOptgroup->isVisible()) {
                $childOptgroup = null;
            }
            ++$count;
        }

        return $childOptgroup;
    }

    /**
<<<<<<< HEAD
     * Get value.
=======
     * Get value
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @return array
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function getValue()
    {
        $values = [];
        $indentOption = str_repeat(' ', self::INDENT_LENGTH);

        foreach ($this->getSelectedOptions() as $option) {
            $value = [];

            /** @var ElementInterface $option */
            $optionText = $option->getText();
            $optionValue = trim($optionText, $this->trim);
            $value[] = $optionValue;
            if (0 !== strpos($optionText, $indentOption)) {
                $values[] = implode('/', $value);
                continue;
            }

            $pathOptgroup = sprintf($this->parentOptgroup, $this->indent . $optionValue);
            $optgroup = $this->find($pathOptgroup, Locator::SELECTOR_XPATH);
            $optgroupText = $optgroup->getAttribute('label');
            $optgroupValue = trim($optgroupText, $this->trim);
            $amountIndent = strlen($optgroupText) - strlen($optgroupValue);
            $amountIndent = $amountIndent ? ($amountIndent / strlen($this->indent)) : 0;
            $value[] = $optgroupValue;
            if (0 == $amountIndent) {
                $values[] = implode('/', $value);
                continue;
            }

            --$amountIndent;
            $indent = $amountIndent ? str_repeat($this->indent, $amountIndent) : '';
            $pathOptgroup .= sprintf($this->precedingOptgroup, $amountIndent * self::INDENT_LENGTH, $indent);
            while (0 <= $amountIndent && $this->find($pathOptgroup, Locator::SELECTOR_XPATH)->isVisible()) {
                $optgroup = $this->find($pathOptgroup, Locator::SELECTOR_XPATH);
                $optgroupText = $optgroup->getAttribute('label');
                $optgroupValue = trim($optgroupText, $this->trim);
                $value[] = $optgroupValue;

                --$amountIndent;
                $indent = (0 < $amountIndent) ? str_repeat($this->indent, $amountIndent) : '';
                $pathOptgroup .= sprintf($this->precedingOptgroup, $amountIndent * self::INDENT_LENGTH, $indent);
            }

            $values[] = implode('/', array_reverse($value));
        }

        return $values;
    }

    /**
<<<<<<< HEAD
     * Get options.
=======
     * Get options
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @return ElementInterface[]
     */
    protected function getOptions()
    {
        $options = [];

        $countOption = 1;
        $option = $this->find(sprintf($this->optionByNumber, $countOption), Locator::SELECTOR_XPATH);
        while ($option->isVisible()) {
            $options[] = $option;
            ++$countOption;
            $option = $this->find(sprintf($this->optionByNumber, $countOption), Locator::SELECTOR_XPATH);
        }

        $countOptgroup = 1;
        $optgroup = $this->find(sprintf($this->optgroupByNumber, $countOptgroup), Locator::SELECTOR_XPATH);
        while ($optgroup->isVisible()) {
            $countOption = 1;
            $option = $this->find(
                sprintf($this->childOptionByNumber, $countOptgroup, $countOption),
                Locator::SELECTOR_XPATH
            );
            while ($option->isVisible()) {
                $options[] = $option;
                ++$countOption;
                $option = $this->find(
                    sprintf($this->childOptionByNumber, $countOptgroup, $countOption),
                    Locator::SELECTOR_XPATH
                );
            }

            ++$countOptgroup;
            $optgroup = $this->find(sprintf($this->optgroupByNumber, $countOptgroup), Locator::SELECTOR_XPATH);
        }

        return $options;
    }

    /**
<<<<<<< HEAD
     * Get selected options.
=======
     * Get selected options
>>>>>>> 86b9222525c862e3ab299f3f137030666df5eb32
     *
     * @return array
     */
    protected function getSelectedOptions()
    {
        $options = [];
        foreach ($this->getOptions() as $option) {
            if ($option->isSelected()) {
                $options[] = $option;
            }
        }

        return $options;
    }
}
