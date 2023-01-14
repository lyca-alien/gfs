<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/datacatalog/v1/schema.proto

namespace Google\Cloud\DataCatalog\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a schema, for example, a BigQuery, GoogleSQL, or Avro schema.
 *
 * Generated from protobuf message <code>google.cloud.datacatalog.v1.Schema</code>
 */
class Schema extends \Google\Protobuf\Internal\Message
{
    /**
     * The unified GoogleSQL-like schema of columns.
     * The overall maximum number of columns and nested columns is 10,000.
     * The maximum nested depth is 15 levels.
     *
     * Generated from protobuf field <code>repeated .google.cloud.datacatalog.v1.ColumnSchema columns = 2;</code>
     */
    private $columns;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\DataCatalog\V1\ColumnSchema[]|\Google\Protobuf\Internal\RepeatedField $columns
     *           The unified GoogleSQL-like schema of columns.
     *           The overall maximum number of columns and nested columns is 10,000.
     *           The maximum nested depth is 15 levels.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Datacatalog\V1\Schema::initOnce();
        parent::__construct($data);
    }

    /**
     * The unified GoogleSQL-like schema of columns.
     * The overall maximum number of columns and nested columns is 10,000.
     * The maximum nested depth is 15 levels.
     *
     * Generated from protobuf field <code>repeated .google.cloud.datacatalog.v1.ColumnSchema columns = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * The unified GoogleSQL-like schema of columns.
     * The overall maximum number of columns and nested columns is 10,000.
     * The maximum nested depth is 15 levels.
     *
     * Generated from protobuf field <code>repeated .google.cloud.datacatalog.v1.ColumnSchema columns = 2;</code>
     * @param \Google\Cloud\DataCatalog\V1\ColumnSchema[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setColumns($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\DataCatalog\V1\ColumnSchema::class);
        $this->columns = $arr;

        return $this;
    }

}
