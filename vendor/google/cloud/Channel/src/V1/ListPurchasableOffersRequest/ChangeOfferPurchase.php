<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/channel/v1/service.proto

namespace Google\Cloud\Channel\V1\ListPurchasableOffersRequest;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * List Offers for ChangeOffer purchase.
 *
 * Generated from protobuf message <code>google.cloud.channel.v1.ListPurchasableOffersRequest.ChangeOfferPurchase</code>
 */
class ChangeOfferPurchase extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Resource name of the entitlement.
     * Format:
     * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
     *
     * Generated from protobuf field <code>string entitlement = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $entitlement = '';
    /**
     * Optional. Resource name of the new target SKU. Provide this SKU when
     * upgrading or downgrading an entitlement. Format:
     * products/{product_id}/skus/{sku_id}
     *
     * Generated from protobuf field <code>string new_sku = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $new_sku = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $entitlement
     *           Required. Resource name of the entitlement.
     *           Format:
     *           accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
     *     @type string $new_sku
     *           Optional. Resource name of the new target SKU. Provide this SKU when
     *           upgrading or downgrading an entitlement. Format:
     *           products/{product_id}/skus/{sku_id}
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Channel\V1\Service::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Resource name of the entitlement.
     * Format:
     * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
     *
     * Generated from protobuf field <code>string entitlement = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getEntitlement()
    {
        return $this->entitlement;
    }

    /**
     * Required. Resource name of the entitlement.
     * Format:
     * accounts/{account_id}/customers/{customer_id}/entitlements/{entitlement_id}
     *
     * Generated from protobuf field <code>string entitlement = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setEntitlement($var)
    {
        GPBUtil::checkString($var, True);
        $this->entitlement = $var;

        return $this;
    }

    /**
     * Optional. Resource name of the new target SKU. Provide this SKU when
     * upgrading or downgrading an entitlement. Format:
     * products/{product_id}/skus/{sku_id}
     *
     * Generated from protobuf field <code>string new_sku = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getNewSku()
    {
        return $this->new_sku;
    }

    /**
     * Optional. Resource name of the new target SKU. Provide this SKU when
     * upgrading or downgrading an entitlement. Format:
     * products/{product_id}/skus/{sku_id}
     *
     * Generated from protobuf field <code>string new_sku = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setNewSku($var)
    {
        GPBUtil::checkString($var, True);
        $this->new_sku = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChangeOfferPurchase::class, \Google\Cloud\Channel\V1\ListPurchasableOffersRequest_ChangeOfferPurchase::class);

