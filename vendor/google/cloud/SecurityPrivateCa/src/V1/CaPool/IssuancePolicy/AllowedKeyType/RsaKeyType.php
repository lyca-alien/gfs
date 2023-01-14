<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/security/privateca/v1/resources.proto

namespace Google\Cloud\Security\PrivateCA\V1\CaPool\IssuancePolicy\AllowedKeyType;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Describes an RSA key that may be used in a [Certificate][google.cloud.security.privateca.v1.Certificate] issued from
 * a [CaPool][google.cloud.security.privateca.v1.CaPool].
 *
 * Generated from protobuf message <code>google.cloud.security.privateca.v1.CaPool.IssuancePolicy.AllowedKeyType.RsaKeyType</code>
 */
class RsaKeyType extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. The minimum allowed RSA modulus size (inclusive), in bits. If this is
     * not set, or if set to zero, the service-level min RSA modulus size
     * will continue to apply.
     *
     * Generated from protobuf field <code>int64 min_modulus_size = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $min_modulus_size = 0;
    /**
     * Optional. The maximum allowed RSA modulus size (inclusive), in bits. If this is
     * not set, or if set to zero, the service will not enforce an explicit
     * upper bound on RSA modulus sizes.
     *
     * Generated from protobuf field <code>int64 max_modulus_size = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $max_modulus_size = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $min_modulus_size
     *           Optional. The minimum allowed RSA modulus size (inclusive), in bits. If this is
     *           not set, or if set to zero, the service-level min RSA modulus size
     *           will continue to apply.
     *     @type int|string $max_modulus_size
     *           Optional. The maximum allowed RSA modulus size (inclusive), in bits. If this is
     *           not set, or if set to zero, the service will not enforce an explicit
     *           upper bound on RSA modulus sizes.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Security\Privateca\V1\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional. The minimum allowed RSA modulus size (inclusive), in bits. If this is
     * not set, or if set to zero, the service-level min RSA modulus size
     * will continue to apply.
     *
     * Generated from protobuf field <code>int64 min_modulus_size = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return int|string
     */
    public function getMinModulusSize()
    {
        return $this->min_modulus_size;
    }

    /**
     * Optional. The minimum allowed RSA modulus size (inclusive), in bits. If this is
     * not set, or if set to zero, the service-level min RSA modulus size
     * will continue to apply.
     *
     * Generated from protobuf field <code>int64 min_modulus_size = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param int|string $var
     * @return $this
     */
    public function setMinModulusSize($var)
    {
        GPBUtil::checkInt64($var);
        $this->min_modulus_size = $var;

        return $this;
    }

    /**
     * Optional. The maximum allowed RSA modulus size (inclusive), in bits. If this is
     * not set, or if set to zero, the service will not enforce an explicit
     * upper bound on RSA modulus sizes.
     *
     * Generated from protobuf field <code>int64 max_modulus_size = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return int|string
     */
    public function getMaxModulusSize()
    {
        return $this->max_modulus_size;
    }

    /**
     * Optional. The maximum allowed RSA modulus size (inclusive), in bits. If this is
     * not set, or if set to zero, the service will not enforce an explicit
     * upper bound on RSA modulus sizes.
     *
     * Generated from protobuf field <code>int64 max_modulus_size = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param int|string $var
     * @return $this
     */
    public function setMaxModulusSize($var)
    {
        GPBUtil::checkInt64($var);
        $this->max_modulus_size = $var;

        return $this;
    }

}


