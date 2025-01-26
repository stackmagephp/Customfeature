<?php

declare(strict_types=1);

namespace StackMagePHP\CustomFeature\Model\ResourceModel\Customfeature;

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
            \StackMagePHP\CustomFeature\Model\Customfeature::class,
            \StackMagePHP\CustomFeature\Model\ResourceModel\Customfeature::class
        );
    }
}

