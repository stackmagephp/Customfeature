<?php

declare(strict_types=1);

namespace StackMagePHP\Customfeature\Model\ResourceModel\Customfeature;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'customfeature_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \StackMagePHP\Customfeature\Model\Customfeature::class,
            \StackMagePHP\Customfeature\Model\ResourceModel\Customfeature::class
        );
    }
}

