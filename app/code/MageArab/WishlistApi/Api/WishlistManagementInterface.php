<?php
/*
 * Copyright (c) Shaymaa Saied  24/03/2021, 00:59.
 */

namespace MageArab\WishlistApi\Api;


use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

interface  WishlistManagementInterface
{

    /**
     * Return wishlist items.
     *
     * @param int $customerId
     * @return \MageArab\WishlistApi\Api\Data\WishlistItemInterface[]
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function getWishlistItems($customerId);

    /**
     * Return wishlist items.
     *
     * @param int $customerId
     * @param string $productSku
     * @return \MageArab\WishlistApi\Api\Data\WishlistItemInterface[]
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function addItem($customerId, $productSku);

    /**
     * Return wishlist items.
     *
     * @param int $customerId
     * @param int $wishlistItemId
     * @return \MageArab\WishlistApi\Api\Data\WishlistItemInterface[]
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function removeItem($customerId, $wishlistItemId);

    /**
     * Return wishlist items.
     *
     * @param int $customerId
     * @param string $productSku
     * @return \MageArab\WishlistApi\Api\Data\WishlistItemInterface[]
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function removeBySku($customerId, $productSku);
}