<?php
/*
 * Copyright (c) Shaymaa Saied  24/03/2021, 01:30.
 */
namespace MageArab\WishlistApi\Api\Data;

use MageArab\CatalogApi\Api\Data\ProductPriceInterface;
use MageArab\CatalogApi\Api\Data\ProductStockInterface;

interface WishlistItemInterface
{
    const ID_FIELD_KEY                                  = 'id';
    const SKU_FIELD_KEY                                 = 'sku';
    const NAME_FIELD_KEY                                = 'name';
    const TYPE_ID_FIELD_KEY                             = 'type_id';
    const PRICE_FIELD_KEY                               = 'price';
    const TIER_PRICES_FIELD_KEY                         = 'tier_prices';
    const STOCK_FIELD_KEY                               = 'stock';
    const BRAND                                         = 'brand';
    const WEIGHT_UNIT                                   = 'weight_unit';
    const TOFAHA_WEIGHT                                 = 'tofaha_weight';
    const ADDED_TO_WISHLIS                              = 'added_to_wishlist';
    const ADDED_TO_CART                                 = 'added_to_cart';
    const CATEGORY_NAME                                 = 'category_name';
    const PRODUCT_ID                                    = 'product_id';
    const THUMBNAIL                                     = 'thumbnail';
    const TYPE_ID                                       = 'type_id';
    const QUOTE_QTY                                    = 'quote_qty';

    /**
     * Get item id
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Set item id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get product id
     *
     * @return int
     */
    public function getProductId(): int;

    /**
     * Set product id
     *
     * @param int $productId
     * @return $this
     */
    public function setProductId($productId);

    /**
     * Get product type
     *
     * @return string
     */
    public function getTypeId(): string;

    /**
     * Set product type
     *
     * @param string $typeId
     * @return $this
     */
    public function setTypeId($typeId);

    /**
     * Get product sku
     *
     * @return string
     */
    public function getSku();

    /**
     * Set product sku
     *
     * @param string $sku
     * @return $this
     */
    public function setSku($sku);

    /**
     * Get product thumbnail
     *
     * @return string
     */
    public function getThumbnail();

    /**
     * Set product thumbnail
     *
     * @param string $thumbnail
     * @return $this
     */
    public function setThumbnail($thumbnail);

    /**
     * Get product name
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Set product name
     *
     * @param string $name
     * @return $this
     */
    public function setName( $name);

    /**
     * Get product brand
     *
     * @return string
     */
    public function getBrand();

    /**
     * Set product brand
     *
     * @param string $brand
     * @return $this
     */
    public function setBrand($brand);

    /**
     * Get product Category name
     *
     * @return string
     */
    public function getCategoryName();

    /**
     * Set product category
     *
     * @param string $categoryName
     * @return $this
     */
    public function setCategoryName($categoryName);
    /**
     * Get product added to wishlist flag
     *
     * @return int
     */
    public function getAddedToWishlist();

    /**
     * Set product added to wishlist flag
     *
     * @param int $addedToWishlist
     * @return $this
     */
    public function setAddedToWishlist($addedToWishlist);

    /**
     * Get product added to cart flag
     *
     * @return int
     */
    public function getAddedToCart();

    /**
     * Set product added to cart flag
     *
     * @param int $addedToCart
     * @return $this
     */
    public function setAddedToCart($addedToCart);

    /**
     * Get product quote qty
     *
     * @return int
     */
    public function getQuoteQty();

    /**
     * Set product added to cart flag
     *
     * @param int $quoteQty
     * @return $this
     */
    public function setQuoteQty($quoteQty);

    /**
     * Get Weight Unit
     *
     * @return string
     */
    public function getWeightUnit();
    /**
     * Set weight unit
     *
     * @param string $weightUnit
     * @return $this
     */
    public function setWeightUnit($weightUnit);

    /**
     * Get Tofaha Weight
     *
     * @return string
     */
    public function getTofahaWeight();
    /**
     * Set tofaha weight
     *
     * @param string $tofahaWeight
     * @return $this
     */
    public function setTofahaWeight($tofahaWeight);


    /**
     * Get product price object
     *
     * @return \MageArab\CatalogApi\Api\Data\ProductPriceInterface
     */

    public function getPrice();

    /**
     * Set product price
     *
     * @param ProductPriceInterface $price
     * @return $this
     */
    public function setPrice(ProductPriceInterface $price);

    /**
     * Get stock info
     *
     * @return \MageArab\CatalogApi\Api\Data\ProductStockInterface
     */
    public function getStock();

    /**
     * Set product stock
     *
     * @param ProductStockInterface $stock
     * @return $this
     */
    public function setStock(ProductStockInterface $stock);


}