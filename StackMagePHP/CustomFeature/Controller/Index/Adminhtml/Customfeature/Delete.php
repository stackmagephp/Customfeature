<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace StackMagePHP\WTLM\Controller\Adminhtml\Customfeature;

class Delete extends \StackMagePHP\WTLM\Controller\Adminhtml\Customfeature
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('customfeature_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\StackMagePHP\WTLM\Model\Customfeature::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Customfeature.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['customfeature_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Customfeature to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}

