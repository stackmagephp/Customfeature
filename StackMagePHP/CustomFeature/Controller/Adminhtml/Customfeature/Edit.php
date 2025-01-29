<?php

declare(strict_types=1);

namespace StackMagePHP\CustomFeature\Controller\Adminhtml\Customfeature;

class Edit extends \StackMagePHP\CustomFeature\Controller\Adminhtml\Customfeature
{

    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('id');
        
        $model = $this->_objectManager->create(\StackMagePHP\CustomFeature\Model\Customfeature::class);
        
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Customfeature no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('stackmagephp_wtlm_customfeature', $model);
        
        // 3. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Customfeature') : __('New Customfeature'),
            $id ? __('Edit Customfeature') : __('New Customfeature')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Customfeatures'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Customfeature %1', $model->getId()) : __('New Customfeature'));
        return $resultPage;
        
    }
}

