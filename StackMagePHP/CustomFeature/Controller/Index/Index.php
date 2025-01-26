<?php

declare(strict_types=1);

namespace StackMagePHP\CustomFeature\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use StackMagePHP\CustomFeature\Api\CustomfeatureRepositoryInterface as Customfeature;
use Magento\Framework\Api\SearchCriteriaBuilder;

class Index implements HttpGetActionInterface
{

    /**
     * @var CustomfeatureRepositoryInterface
     */
    protected $customfeature;

    /**
     * @var SearchCriteriaBuilder
     */
    protected $searchCriteria;

    /**
     * Constructor
     *
     * @param CustomfeatureRepositoryInterface $customfeature
     */
    public function __construct( Customfeature $customfeature,  SearchCriteriaBuilder $searchCriteriaBuilder)
    {
        $this->customfeature = $customfeature;
        $this->searchCriteria = $searchCriteriaBuilder->create();
    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
       
        foreach($this->customfeature->getList($this->searchCriteria)->getItems() as $item){
            echo 'Title:'.$item->getTitle().' Content:'.$item->getContent().'<br/>';
        }
        die('');
        //return $this->resultPageFactory->create();
    }
}
