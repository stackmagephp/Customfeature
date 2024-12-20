<?php

declare(strict_types=1);

namespace StackMagePHP\Customfeature\Api\Data;

interface CustomfeatureInterface
{

    const TITLE = 'title';
    const CUSTOMFEATURE_ID = 'id';
    const CONTENT = 'content';
    const CREATED_AT = 'created_at';

    /**
     * Get customfeature_id
     * @return string|null
     */
    public function getCustomfeatureId();

    /**
     * Set customfeature_id
     * @param string $customfeatureId
     * @return \StackMagePHP\Customfeature\Api\Data\CustomfeatureInterface
     */
    public function setCustomfeatureId($customfeatureId);

    /**
     * Get title
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     * @param string $title
     * @return \StackMagePHP\Customfeature\Api\Data\CustomfeatureInterface
     */
    public function setTitle($title);

    /**
     * Get content
     * @return string|null
     */
    public function getContent();

    /**
     * Set content
     * @param string $content
     * @return \StackMagePHP\Customfeature\Api\Data\CustomfeatureInterface
     */
    public function setContent($content);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \StackMagePHP\Customfeature\Api\Data\CustomfeatureInterface
     */
    public function setCreatedAt($createdAt);
}

