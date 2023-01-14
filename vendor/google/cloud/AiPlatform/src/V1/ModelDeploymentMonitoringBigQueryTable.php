<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/model_deployment_monitoring_job.proto

namespace Google\Cloud\AIPlatform\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * ModelDeploymentMonitoringBigQueryTable specifies the BigQuery table name
 * as well as some information of the logs stored in this table.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.ModelDeploymentMonitoringBigQueryTable</code>
 */
class ModelDeploymentMonitoringBigQueryTable extends \Google\Protobuf\Internal\Message
{
    /**
     * The source of log.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.ModelDeploymentMonitoringBigQueryTable.LogSource log_source = 1;</code>
     */
    private $log_source = 0;
    /**
     * The type of log.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.ModelDeploymentMonitoringBigQueryTable.LogType log_type = 2;</code>
     */
    private $log_type = 0;
    /**
     * The created BigQuery table to store logs. Customer could do their own query
     * & analysis. Format:
     * `bq://<project_id>.model_deployment_monitoring_<endpoint_id>.<tolower(log_source)>_<tolower(log_type)>`
     *
     * Generated from protobuf field <code>string bigquery_table_path = 3;</code>
     */
    private $bigquery_table_path = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $log_source
     *           The source of log.
     *     @type int $log_type
     *           The type of log.
     *     @type string $bigquery_table_path
     *           The created BigQuery table to store logs. Customer could do their own query
     *           & analysis. Format:
     *           `bq://<project_id>.model_deployment_monitoring_<endpoint_id>.<tolower(log_source)>_<tolower(log_type)>`
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\ModelDeploymentMonitoringJob::initOnce();
        parent::__construct($data);
    }

    /**
     * The source of log.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.ModelDeploymentMonitoringBigQueryTable.LogSource log_source = 1;</code>
     * @return int
     */
    public function getLogSource()
    {
        return $this->log_source;
    }

    /**
     * The source of log.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.ModelDeploymentMonitoringBigQueryTable.LogSource log_source = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setLogSource($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\AIPlatform\V1\ModelDeploymentMonitoringBigQueryTable\LogSource::class);
        $this->log_source = $var;

        return $this;
    }

    /**
     * The type of log.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.ModelDeploymentMonitoringBigQueryTable.LogType log_type = 2;</code>
     * @return int
     */
    public function getLogType()
    {
        return $this->log_type;
    }

    /**
     * The type of log.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.ModelDeploymentMonitoringBigQueryTable.LogType log_type = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setLogType($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\AIPlatform\V1\ModelDeploymentMonitoringBigQueryTable\LogType::class);
        $this->log_type = $var;

        return $this;
    }

    /**
     * The created BigQuery table to store logs. Customer could do their own query
     * & analysis. Format:
     * `bq://<project_id>.model_deployment_monitoring_<endpoint_id>.<tolower(log_source)>_<tolower(log_type)>`
     *
     * Generated from protobuf field <code>string bigquery_table_path = 3;</code>
     * @return string
     */
    public function getBigqueryTablePath()
    {
        return $this->bigquery_table_path;
    }

    /**
     * The created BigQuery table to store logs. Customer could do their own query
     * & analysis. Format:
     * `bq://<project_id>.model_deployment_monitoring_<endpoint_id>.<tolower(log_source)>_<tolower(log_type)>`
     *
     * Generated from protobuf field <code>string bigquery_table_path = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setBigqueryTablePath($var)
    {
        GPBUtil::checkString($var, True);
        $this->bigquery_table_path = $var;

        return $this;
    }

}

