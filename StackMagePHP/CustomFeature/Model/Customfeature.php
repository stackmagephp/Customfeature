<?php

declare(strict_types=1);

namespace StackMagePHP\CustomFeature\Model;

use Magento\Framework\Model\AbstractModel;
use StackMagePHP\CustomFeature\Api\Data\CustomfeatureInterface;

class Customfeature extends AbstractModel implements CustomfeatureInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\StackMagePHP\CustomFeature\Model\ResourceModel\Customfeature::class);
    }

    /**
     * @inheritDoc
     */
    public function getCustomfeatureId()
    {
        return $this->getData(self::CUSTOMFEATURE_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCustomfeatureId($customfeatureId)
    {
        return $this->setData(self::CUSTOMFEATURE_ID, $customfeatureId);
    }

    /**
     * @inheritDoc
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * @inheritDoc
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * @inheritDoc
     */
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * @inheritDoc
     */
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}

