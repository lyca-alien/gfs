<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: grafeas/v1/intoto_provenance.proto

namespace Grafeas\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Other properties of the build.
 *
 * Generated from protobuf message <code>grafeas.v1.Metadata</code>
 */
class Metadata extends \Google\Protobuf\Internal\Message
{
    /**
     * Identifies the particular build invocation, which can be useful for finding
     * associated logs or other ad-hoc analysis. The value SHOULD be globally
     * unique, per in-toto Provenance spec.
     *
     * Generated from protobuf field <code>string build_invocation_id = 1;</code>
     */
    private $build_invocation_id = '';
    /**
     * The timestamp of when the build started.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp build_started_on = 2;</code>
     */
    private $build_started_on = null;
    /**
     * The timestamp of when the build completed.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp build_finished_on = 3;</code>
     */
    private $build_finished_on = null;
    /**
     * Indicates that the builder claims certain fields in this message to be
     * complete.
     *
     * Generated from protobuf field <code>.grafeas.v1.Completeness completeness = 4;</code>
     */
    private $completeness = null;
    /**
     * If true, the builder claims that running the recipe on materials will
     * produce bit-for-bit identical output.
     *
     * Generated from protobuf field <code>bool reproducible = 5;</code>
     */
    private $reproducible = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $build_invocation_id
     *           Identifies the particular build invocation, which can be useful for finding
     *           associated logs or other ad-hoc analysis. The value SHOULD be globally
     *           unique, per in-toto Provenance spec.
     *     @type \Google\Protobuf\Timestamp $build_started_on
     *           The timestamp of when the build started.
     *     @type \Google\Protobuf\Timestamp $build_finished_on
     *           The timestamp of when the build completed.
     *     @type \Grafeas\V1\Completeness $completeness
     *           Indicates that the builder claims certain fields in this message to be
     *           complete.
     *     @type bool $reproducible
     *           If true, the builder claims that running the recipe on materials will
     *           produce bit-for-bit identical output.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Grafeas\V1\IntotoProvenance::initOnce();
        parent::__construct($data);
    }

    /**
     * Identifies the particular build invocation, which can be useful for finding
     * associated logs or other ad-hoc analysis. The value SHOULD be globally
     * unique, per in-toto Provenance spec.
     *
     * Generated from protobuf field <code>string build_invocation_id = 1;</code>
     * @return string
     */
    public function getBuildInvocationId()
    {
        return $this->build_invocation_id;
    }

    /**
     * Identifies the particular build invocation, which can be useful for finding
     * associated logs or other ad-hoc analysis. The value SHOULD be globally
     * unique, per in-toto Provenance spec.
     *
     * Generated from protobuf field <code>string build_invocation_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setBuildInvocationId($var)
    {
        GPBUtil::checkString($var, True);
        $this->build_invocation_id = $var;

        return $this;
    }

    /**
     * The timestamp of when the build started.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp build_started_on = 2;</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getBuildStartedOn()
    {
        return $this->build_started_on;
    }

    public function hasBuildStartedOn()
    {
        return isset($this->build_started_on);
    }

    public function clearBuildStartedOn()
    {
        unset($this->build_started_on);
    }

    /**
     * The timestamp of when the build started.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp build_started_on = 2;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setBuildStartedOn($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->build_started_on = $var;

        return $this;
    }

    /**
     * The timestamp of when the build completed.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp build_finished_on = 3;</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getBuildFinishedOn()
    {
        return $this->build_finished_on;
    }

    public function hasBuildFinishedOn()
    {
        return isset($this->build_finished_on);
    }

    public function clearBuildFinishedOn()
    {
        unset($this->build_finished_on);
    }

    /**
     * The timestamp of when the build completed.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp build_finished_on = 3;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setBuildFinishedOn($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->build_finished_on = $var;

        return $this;
    }

    /**
     * Indicates that the builder claims certain fields in this message to be
     * complete.
     *
     * Generated from protobuf field <code>.grafeas.v1.Completeness completeness = 4;</code>
     * @return \Grafeas\V1\Completeness|null
     */
    public function getCompleteness()
    {
        return $this->completeness;
    }

    public function hasCompleteness()
    {
        return isset($this->completeness);
    }

    public function clearCompleteness()
    {
        unset($this->completeness);
    }

    /**
     * Indicates that the builder claims certain fields in this message to be
     * complete.
     *
     * Generated from protobuf field <code>.grafeas.v1.Completeness completeness = 4;</code>
     * @param \Grafeas\V1\Completeness $var
     * @return $this
     */
    public function setCompleteness($var)
    {
        GPBUtil::checkMessage($var, \Grafeas\V1\Completeness::class);
        $this->completeness = $var;

        return $this;
    }

    /**
     * If true, the builder claims that running the recipe on materials will
     * produce bit-for-bit identical output.
     *
     * Generated from protobuf field <code>bool reproducible = 5;</code>
     * @return bool
     */
    public function getReproducible()
    {
        return $this->reproducible;
    }

    /**
     * If true, the builder claims that running the recipe on materials will
     * produce bit-for-bit identical output.
     *
     * Generated from protobuf field <code>bool reproducible = 5;</code>
     * @param bool $var
     * @return $this
     */
    public function setReproducible($var)
    {
        GPBUtil::checkBool($var);
        $this->reproducible = $var;

        return $this;
    }

}

