<?php
/*
 * Copyright (c) Shaymaa Saied  24/03/2021, 02:08.
 */

namespace MageArab\WishlistApi\Model;


use MageArab\CatalogApi\Api\Data\ProductPriceInterface;
use MageArab\CatalogApi\Api\Data\ProductStockInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

class WishlistItem  extends AbstractExtensibleModel implements \MageArab\WishlistApi\Api\Data\WishlistItemInterface

{
    /**
     * {@inheritdoc}
     *
     */
    public function getId(): int
    {
        // TODO: Implement getId() method.
        return (int)$this->getData(self::ID_FIELD_KEY);
    }

    /**
     * {@inheritdoc}
     *
     */
    public function setId($id)
    {
        // TODO: Implement setId() method.
        $this->setData(self::ID_FIELD_KEY, $id);
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function getProductId(): int
    {
        // TODO: Implement getProductId() method.
        return (int)$this->getData(self::PRODUCT_ID);
    }

    /**
     * {@inheritdoc}
     *
     */
    public function setProductId($productId)
    {
        // TODO: Implement setProductId() method.
        $this->setData(self::PRODUCT_ID, $productId);
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function getAddedToCart()
    {
        // TODO: Implement getAddedToCart() method.
        return (int)$this->getData(self::ADDED_TO_CART);
    }

    /**
     * {@inheritdoc}
     *
     */
    public function setAddedToCart($addedToCart)
    {
        // TODO: Implement setAddedToCart() method.
        $this->setData(self::ADDED_TO_CART, $addedToCart);
        return $this;
    }

    /**
     * Get product Quote Qty
     *
     * @return int
     */
    public function getQuoteQty(): int
    {
        return (int)$this->getData(self::QUOTE_QTY);
    }

    /**
     * Set quote qty
     *
     * @param int $quoteQty
     * @return $this
     */
    public function setQuoteQty($quoteQty){
        $this->setData(self::QUOTE_QTY, $quoteQty);
        return $this;
    }
    /**
     * {@inheritdoc}
     *
     */
    public function getAddedToWishlist()
    {
        // TODO: Implement getAddedToWishlist() method.
        return (int)$this->getData(self::ADDED_TO_WISHLIS);
    }

    /**
     * {@inheritdoc}
     *
     */
    public function setAddedToWishlist($addedToWishlist)
    {
        // TODO: Implement setAddedToWishlist() method.
        $this->setData(self::ADDED_TO_WISHLIS, $addedToWishlist);
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function getBrand()
    {
        // TODO: Implement getBrand() method.
        return (string)$this->getData(self::BRAND);
    }

    /**
     * {@inheritdoc}
     *
     */
    public function setBrand($brand)
    {
        // TODO: Implement setBrand() method.
        $this->setData(self::BRAND, $brand);
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function getCategoryName()
    {
        // TODO: Implement getCategoryName() method.
        return (string)$this->getData(self::CATEGORY_NAME);
    }

    /**
     * {@inheritdoc}
     *
     */
    public function setCategoryName($categoryName)
    {
        // TODO: Implement setCategoryName() method.
        $this->setData(self::CATEGORY_NAME, $categoryName);
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function getName(): string
    {
        // TODO: Implement getName() method.
        return (string)$this->getData(self::NAME_FIELD_KEY);
    }

    /**
     * {@inheritdoc}
     *
     */
    public function setName($name)
    {
        // TODO: Implement setName() method.
        $this->setData(self::NAME_FIELD_KEY, $name);
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function getPrice()
    {
        // TODO: Implement getPrice() method.
        return $this->getData(self::PRICE_FIELD_KEY);
    }

    /**
     * {@inheritdoc}
     *
     */
    public function setPrice(ProductPriceInterface $price)
    {
        // TODO: Implement setPrice() method.
        $this->setData(self::PRICE_FIELD_KEY, $price);
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function getSku()
    {
        // TODO: Implement getSku() method.
        return (string)$this->getData(self::SKU_FIELD_KEY);
    }

    /**
     * {@inheritdoc}
     *
     */
    public function setSku($sku)
    {
        // TODO: Implement setSku() method.
        $this->setData(self::SKU_FIELD_KEY, $sku);
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function getStock()
    {
        // TODO: Implement getStock() method.
        return $this->getData(self::STOCK_FIELD_KEY);

    }

    /**
     * {@inheritdoc}
     *
     */
    public function setStock(ProductStockInterface $stock)
    {
        // TODO: Implement setStock() method.
        $this->setData(self::STOCK_FIELD_KEY, $stock);
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function getTofahaWeight()
    {
        // TODO: Implement getTofahaWeight() method.
        return (string)$this->getData(self::TOFAHA_WEIGHT);
    }

    /**
     * {@inheritdoc}
     *
     */
    public function setTofahaWeight($tofahaWeight)
    {
        // TODO: Implement setTofahaWeight() method.
        $this->setData(self::TOFAHA_WEIGHT, $tofahaWeight);
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function getWeightUnit()
    {
        // TODO: Implement getWeightUnit() method.
        return (string)$this->getData(self::WEIGHT_UNIT);
    }

    /**
     * {@inheritdoc}
     *
     */
    public function setWeightUnit($weightUnit)
    {
        // TODO: Implement setWeightUnit() method.
        $this->setData(self::WEIGHT_UNIT, $weightUnit);
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function getTypeId(): string
    {
        // TODO: Implement getTypeId() method.
        return (string)$this->getData(self::TYPE_ID);
    }

    /**
     * {@inheritdoc}
     *
     */
    public function setTypeId($typeId)
    {
        // TODO: Implement setTypeId() method.
        $this->setData(self::TYPE_ID, $typeId);
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function getThumbnail()
    {
        // TODO: Implement getThumbnail() method.
        return (string)$this->getData(self::THUMBNAIL);
    }

    /**
     * {@inheritdoc}
     *
     */
    public function setThumbnail($thumbnail)
    {
        // TODO: Implement setThumbnail() method.
        $this->setData(self::THUMBNAIL, $thumbnail);
        return $this;
    }

}