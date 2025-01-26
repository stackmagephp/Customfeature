<?php

declare(strict_types=1);

namespace StackMagePHP\CustomFeature\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CustomfeatureRepositoryInterface
{

    /**
     * Save Customfeature
     * @param \StackMagePHP\CustomFeature\Api\Data\CustomfeatureInterface $customfeature
     * @return \StackMagePHP\CustomFeature\Api\Data\CustomfeatureInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \StackMagePHP\CustomFeature\Api\Data\CustomfeatureInterface $customfeature
    );

    /**
     * Retrieve Customfeature
     * @param string $customfeatureId
     * @return \StackMagePHP\CustomFeature\Api\Data\CustomfeatureInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($customfeatureId);

    /**
     * Retrieve Customfeature matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \StackMagePHP\CustomFeature\Api\Data\CustomfeatureSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Customfeature
     * @param \StackMagePHP\CustomFeature\Api\Data\CustomfeatureInterface $customfeature
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \StackMagePHP\CustomFeature\Api\Data\CustomfeatureInterface $customfeature
    );

    /**
     * Delete Customfeature by ID
     * @param string $customfeatureId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($customfeatureId);
}

