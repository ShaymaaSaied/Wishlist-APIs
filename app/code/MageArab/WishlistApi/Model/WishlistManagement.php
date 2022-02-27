<?php
/*
 * Copyright (c) Shaymaa Saied  24/03/2021, 00:59.
 */

namespace MageArab\WishlistApi\Model;

use MageArab\CatalogApi\Api\ProductPriceProviderInterface;
use MageArab\CatalogApi\Model\ProductStockProviderInterface;
use MageArab\Core\Helper\Data;
use MageArab\WishlistApi\Api\Data\WishlistItemInterface;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Wishlist\Model\ResourceModel\Item\CollectionFactory;
use Magento\Wishlist\Model\WishlistFactory;

class WishlistManagement implements \MageArab\WishlistApi\Api\WishlistManagementInterface
{
    protected $_wishlistCollectionFactory;
    protected $_wishlistRepository;
    protected $_productRepository;
    protected $_wishlistFactory;
    protected $_itemFactory;
    protected $_storeManager;
    protected $_productFactory;
    protected $_wishlistItem;
    protected $_coreData;
    protected $_productPriceProvider;
    protected $_productStockProvider;
    protected $_productData;

    public function __construct(
        CollectionFactory                                                   $wishlistCollectionFactory,
        WishlistFactory                                                     $wishlistFactory,
        \Magento\Wishlist\Model\WishlistFactory                             $wishlistRepository,
        \Magento\Catalog\Api\ProductRepositoryInterface                     $productRepository,
        \Magento\Store\Model\StoreManagerInterface                          $storeManager,
        \Magento\Catalog\Api\Data\ProductInterfaceFactory                   $productInterfaceFactory,
        \MageArab\WishlistApi\Api\Data\WishlistItemInterfaceFactory         $wishlistItem,
        \MageArab\Catalog\Helper\ProductHelper                              $productData,
        ProductPriceProviderInterface                                       $priceProvider,
        ProductStockProviderInterface                                       $productStockProvider,
        \MageArab\Core\Helper\Data                                          $data,
        \Magento\Wishlist\Model\ItemFactory                                 $itemFactory
    ) {
        $this->_wishlistCollectionFactory           = $wishlistCollectionFactory;
        $this->_wishlistRepository                  = $wishlistRepository;
        $this->_productRepository                   = $productRepository;
        $this->_productStockProvider                = $productStockProvider;
        $this->_productPriceProvider                = $priceProvider;
        $this->_wishlistFactory                     = $wishlistFactory;
        $this->_itemFactory                         = $itemFactory;
        $this->_storeManager                        = $storeManager;
        $this->_productFactory                      = $productInterfaceFactory;
        $this->_wishlistItem                        = $wishlistItem;
        $this->_productData                         = $productData;
        $this->_coreData                            = $data;
    }


    /**
     * {@inheritdoc}
     *
     */

    public function getWishlistItems($customerId)
    {
        $wishlistItems=[];
        // TODO: Implement getWishlistItems() method.
        if (empty($customerId) || !isset($customerId) || $customerId == "") {
            throw new InputException(__('Id required'));
        } else {
            //$wishlistData=$this->getWishlistData($customerId);
            $collection =
                $this->_wishlistCollectionFactory->create()
                    ->addCustomerIdFilter($customerId);
            /*$wishlistData = [];*/
            foreach ($collection as $item) {
                $productId=$item->getProductId();
                $productItem=$item->getProduct();
              //  var_dump($productItem->getData());
                $wishlistItem=$this->_wishlistItem->create();
                $wishlistItem->setId($item->getWishlistItemId());
                $wishlistItem->setProductId($productId);
                $wishlistItem->setSku($productItem->getSku());
                $wishlistItem->setName($productItem->getName());
                $wishlistItem->setTypeId($productItem->getTypeId());
                $wishlistItem->setThumbnail($this->_coreData->getImageUrl($productItem->getThumbnail(),'product'));
                $wishlistItem->setPrice($this->_productPriceProvider->getPriceData($productItem));
                $wishlistItem->setStock($this->_productStockProvider->getStockData($productItem));
                // if()
                if($productItem->getResource()->getAttribute('a_brand')){
                    $wishlistItem->setBrand($productItem->getResource()->getAttribute('a_brand')->getFrontend()->getValue($productItem));

                }
                if($productItem->getResource()->getAttribute('tofafa_weight')){
                    $wishlistItem->setTofahaWeight($productItem->getData('tofaha_weight'));

                }
                if($productItem->getResource()->getAttribute('weight_unit')){
                    $wishlistItem->setWeightUnit($productItem->getResource()->getAttribute('weight_unit')->getFrontend()->getValue($productItem));

                }

                $wishlistItem->setAddedToWishlist($this->_productData->isAddedToWishlist($productItem,$customerId));
                if ($quoteQty=$this->_productData->isAddedToCart($productItem,$customerId)){
                    $wishlistItem->setAddedToCart(true);
                    $wishlistItem->setQuoteQty($quoteQty);
                }
                //$wishlistItem->setAddedToCart($this->_productData->isAddedToCart($productItem,$customerId));
                $wishlistItems[]=$wishlistItem;

            }
            return $wishlistItems;
        }
    }

    /**
     * {@inheritdoc}
     *
     */

    public function addItem($customerId, $productSku)
    {
        // TODO: Implement addItem() method.
        $result=[];
        if ($productSku == null) {
            throw new LocalizedException(__
            ('Invalid product, Please select a valid product'));
        }
        try {
            $product = $this->_productRepository->get($productSku);
        } catch (NoSuchEntityException $e) {
            $product = null;
            throw new LocalizedException(__
            ('Invalid product, Please select a valid product'));
        }
        try {
            $wishlist = $this->_wishlistRepository->create()->loadByCustomerId
            ($customerId, true);
            $data=$wishlist->addNewItem($product);
            $wishlist->save();
            //var_dump($data->getId());
            if($data->getId()){
                $result=$this->getWishlistItems($customerId);
                /*array_push($result,[
                    'status'=>true,
                    'message'=>'Product has been added'
                ]);*/
            }else{
                throw new InputException(__('Error while adding product'));
            }

        } catch (NoSuchEntityException $e) {
            throw new InputException(__('Error while adding product'));
        }
        return $result;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function removeBySku($customerId, $productSku)
    {
        $result=[];
        // TODO: Implement removeBySku() method.
        if ($productSku == null) {
            throw new LocalizedException(__
            ('Invalid product, Please select a valid product'));
        }
        try {
            $product = $this->_productRepository->get($productSku);
        } catch (NoSuchEntityException $e) {
            $product = null;
            throw new LocalizedException(__
            ('Invalid product, Please select a valid product'));
        }
        try {
            $wishlist = $this->_wishlistRepository->create()->loadByCustomerId($customerId, true);
            if (!$wishlist) {
                throw new \Magento\Framework\Exception\NoSuchEntityException(
                    __('The requested Wishlist doesn\'t exist.')
                );
            }
            if (!$wishlist->getId() || $wishlist->getCustomerId() != $customerId) {
                throw new \Magento\Framework\Exception\NoSuchEntityException(
                    __('The requested Wish List doesn\'t exist.')
                );
            }
            $itemData=$this->_wishlistCollectionFactory->create()
                ->addCustomerIdFilter($customerId)
                ->addFieldToFilter('product_id',$product->getId())
                ->getFirstItem();
            $wishlistItemId=$itemData->getId();
            $item = $this->_itemFactory->create()->load($wishlistItemId);

            if (!$item->getId()) {
                throw new \Magento\Framework\Exception\NoSuchEntityException(
                    __('The requested Wishlist Item doesn\'t exist.')
                );

            }
            try {
                $data=$item->delete();
                $wishlist->save();
                if($data->getId()){
                    $result=$this->getWishlistItems($customerId);
                }

            } catch (\Exception $e) {
                throw new \Magento\Framework\Exception\NoSuchEntityException(
                    __('The requested Wish List doesn\'t exist.')
                );
            }
        }catch (\Exception $exception){
            throw new \Magento\Framework\Exception\NoSuchEntityException(
                __('The requested Wish List doesn\'t exist.')
            );
        }
        return $result;
    }

    /**
     * {@inheritdoc}
     *
     */

    public function removeItem($customerId, $wishlistItemId)
    {
        // TODO: Implement removeItem() method.
        $result=[];
        if ($wishlistItemId == null) {
            throw new LocalizedException(__
            ('Invalid wishlist item, Please select a valid item'));
        }
        /*echo $wishlistItemId;
        exit();*/
        $item = $this->_itemFactory->create()->load($wishlistItemId);

        if (!$item->getId()) {
            throw new \Magento\Framework\Exception\NoSuchEntityException(
                __('The requested Wishlist Item doesn\'t exist.')
            );
        }
        $wishlistId = $item->getWishlistId();
        $wishlist = $this->_wishlistFactory->create();

        if ($wishlistId) {
            $wishlist->load($wishlistId);
        } elseif ($customerId) {
            $wishlist->loadByCustomerId($customerId, true);
        }
        if (!$wishlist) {
            throw new \Magento\Framework\Exception\NoSuchEntityException(
                __('The requested Wish List doesn\'t exist.')
            );
        }
        if (!$wishlist->getId() || $wishlist->getCustomerId() != $customerId) {
            throw new \Magento\Framework\Exception\NoSuchEntityException(
                __('The requested Wish List doesn\'t exist.')
            );
        }
        try {
            $data=$item->delete();
            $wishlist->save();
            if($data->getId()){
                $result=$this->getWishlistItems($customerId);
            }

        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\NoSuchEntityException(
                __('The requested Wish List doesn\'t exist.')
            );
        }
        return $result;
    }
}