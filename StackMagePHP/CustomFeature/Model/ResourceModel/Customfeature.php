<?php

declare(strict_types=1);

namespace StackMagePHP\Customfeature\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Customfeature extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('stackmagephp_customfeature', 'id');
    }
}

