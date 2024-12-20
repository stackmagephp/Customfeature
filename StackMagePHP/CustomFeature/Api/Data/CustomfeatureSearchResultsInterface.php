<?php

declare(strict_types=1);

namespace StackMagePHP\Customfeature\Api\Data;

interface CustomfeatureSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Customfeature list.
     * @return \StackMagePHP\Customfeature\Api\Data\CustomfeatureInterface[]
     */
    public function getItems();

    /**
     * Set title list.
     * @param \StackMagePHP\Customfeature\Api\Data\CustomfeatureInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

