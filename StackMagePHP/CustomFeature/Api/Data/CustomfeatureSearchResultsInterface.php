<?php

declare(strict_types=1);

namespace StackMagePHP\CustomFeature\Api\Data;

interface CustomfeatureSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Customfeature list.
     * @return \StackMagePHP\CustomFeature\Api\Data\CustomfeatureInterface[]
     */
    public function getItems();

    /**
     * Set title list.
     * @param \StackMagePHP\CustomFeature\Api\Data\CustomfeatureInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

