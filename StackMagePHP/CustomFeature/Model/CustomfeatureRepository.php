<?php

declare(strict_types=1);

namespace StackMagePHP\Customfeature\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use StackMagePHP\Customfeature\Api\CustomfeatureRepositoryInterface;
use StackMagePHP\Customfeature\Api\Data\CustomfeatureInterface;
use StackMagePHP\Customfeature\Api\Data\CustomfeatureInterfaceFactory;
use StackMagePHP\Customfeature\Api\Data\CustomfeatureSearchResultsInterfaceFactory;
use StackMagePHP\Customfeature\Model\ResourceModel\Customfeature as ResourceCustomfeature;
use StackMagePHP\Customfeature\Model\ResourceModel\Customfeature\CollectionFactory as CustomfeatureCollectionFactory;

class CustomfeatureRepository implements CustomfeatureRepositoryInterface
{

    /**
     * @var CustomfeatureCollectionFactory
     */
    protected $customfeatureCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var Customfeature
     */
    protected $searchResultsFactory;

    /**
     * @var CustomfeatureInterfaceFactory
     */
    protected $customfeatureFactory;

    /**
     * @var ResourceCustomfeature
     */
    protected $resource;


    /**
     * @param ResourceCustomfeature $resource
     * @param CustomfeatureInterfaceFactory $customfeatureFactory
     * @param CustomfeatureCollectionFactory $customfeatureCollectionFactory
     * @param CustomfeatureSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceCustomfeature $resource,
        CustomfeatureInterfaceFactory $customfeatureFactory,
        CustomfeatureCollectionFactory $customfeatureCollectionFactory,
        CustomfeatureSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->customfeatureFactory = $customfeatureFactory;
        $this->customfeatureCollectionFactory = $customfeatureCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(CustomfeatureInterface $customfeature)
    {
        try {
            $this->resource->save($customfeature);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the customfeature: %1',
                $exception->getMessage()
            ));
        }
        return $customfeature;
    }

    /**
     * @inheritDoc
     */
    public function get($customfeatureId)
    {
        $customfeature = $this->customfeatureFactory->create();
        $this->resource->load($customfeature, $customfeatureId);
        if (!$customfeature->getId()) {
            throw new NoSuchEntityException(__('Customfeature with id "%1" does not exist.', $customfeatureId));
        }
        return $customfeature;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->customfeatureCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(CustomfeatureInterface $customfeature)
    {
        try {
            $customfeatureModel = $this->customfeatureFactory->create();
            $this->resource->load($customfeatureModel, $customfeature->getCustomfeatureId());
            $this->resource->delete($customfeatureModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Customfeature: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($customfeatureId)
    {
        return $this->delete($this->get($customfeatureId));
    }
}

