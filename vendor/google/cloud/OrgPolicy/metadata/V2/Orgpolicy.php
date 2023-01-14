<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/orgpolicy/v2/orgpolicy.proto

namespace GPBMetadata\Google\Cloud\Orgpolicy\V2;

class Orgpolicy
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Cloud\Orgpolicy\V2\Constraint::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        \GPBMetadata\Google\Type\Expr::initOnce();
        $pool->internalAddGeneratedFile(
            '
� 
)google/cloud/orgpolicy/v2/orgpolicy.protogoogle.cloud.orgpolicy.v2google/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto*google/cloud/orgpolicy/v2/constraint.protogoogle/protobuf/empty.protogoogle/protobuf/timestamp.protogoogle/type/expr.proto"�
Policy
name (	B�A3
spec (2%.google.cloud.orgpolicy.v2.PolicySpecE
	alternate (2..google.cloud.orgpolicy.v2.AlternatePolicySpecB:��A�
orgpolicy.googleapis.com/Policy$projects/{project}/policies/{policy}"folders/{folder}/policies/{policy}.organizations/{organization}/policies/{policy}"Z
AlternatePolicySpec
launch (	3
spec (2%.google.cloud.orgpolicy.v2.PolicySpec"�

PolicySpec
etag (	4
update_time (2.google.protobuf.TimestampB�A?
rules (20.google.cloud.orgpolicy.v2.PolicySpec.PolicyRule
inherit_from_parent (
reset (�

PolicyRuleO
values (2=.google.cloud.orgpolicy.v2.PolicySpec.PolicyRule.StringValuesH 
	allow_all (H 
deny_all (H 
enforce (H $
	condition (2.google.type.Expr=
StringValues
allowed_values (	
denied_values (	B
kind"|
ListConstraintsRequest;
parent (	B+�A�A%#orgpolicy.googleapis.com/Constraint
	page_size (

page_token (	"n
ListConstraintsResponse:
constraints (2%.google.cloud.orgpolicy.v2.Constraint
next_page_token (	"u
ListPoliciesRequest7
parent (	B\'�A�A!orgpolicy.googleapis.com/Policy
	page_size (

page_token (	"d
ListPoliciesResponse3
policies (2!.google.cloud.orgpolicy.v2.Policy
next_page_token (	"I
GetPolicyRequest5
name (	B\'�A�A!
orgpolicy.googleapis.com/Policy"R
GetEffectivePolicyRequest5
name (	B\'�A�A!
orgpolicy.googleapis.com/Policy"�
CreatePolicyRequest7
parent (	B\'�A�A!orgpolicy.googleapis.com/Policy6
policy (2!.google.cloud.orgpolicy.v2.PolicyB�A"M
UpdatePolicyRequest6
policy (2!.google.cloud.orgpolicy.v2.PolicyB�A"L
DeletePolicyRequest5
name (	B\'�A�A!
orgpolicy.googleapis.com/Policy2�
	OrgPolicy�
ListConstraints1.google.cloud.orgpolicy.v2.ListConstraintsRequest2.google.cloud.orgpolicy.v2.ListConstraintsResponse"����w#/v2/{parent=projects/*}/constraintsZ$"/v2/{parent=folders/*}/constraintsZ*(/v2/{parent=organizations/*}/constraints�Aparent�
ListPolicies..google.cloud.orgpolicy.v2.ListPoliciesRequest/.google.cloud.orgpolicy.v2.ListPoliciesResponse"}���n /v2/{parent=projects/*}/policiesZ!/v2/{parent=folders/*}/policiesZ\'%/v2/{parent=organizations/*}/policies�Aparent�
	GetPolicy+.google.cloud.orgpolicy.v2.GetPolicyRequest!.google.cloud.orgpolicy.v2.Policy"{���n /v2/{name=projects/*/policies/*}Z!/v2/{name=folders/*/policies/*}Z\'%/v2/{name=organizations/*/policies/*}�Aname�
GetEffectivePolicy4.google.cloud.orgpolicy.v2.GetEffectivePolicyRequest!.google.cloud.orgpolicy.v2.Policy"�����3/v2/{name=projects/*/policies/*}:getEffectivePolicyZ42/v2/{name=folders/*/policies/*}:getEffectivePolicyZ:8/v2/{name=organizations/*/policies/*}:getEffectivePolicy�Aname�
CreatePolicy..google.cloud.orgpolicy.v2.CreatePolicyRequest!.google.cloud.orgpolicy.v2.Policy"�����" /v2/{parent=projects/*}/policies:policyZ)"/v2/{parent=folders/*}/policies:policyZ/"%/v2/{parent=organizations/*}/policies:policy�Aparent,policy�
UpdatePolicy..google.cloud.orgpolicy.v2.UpdatePolicyRequest!.google.cloud.orgpolicy.v2.Policy"�����2\'/v2/{policy.name=projects/*/policies/*}:policyZ02&/v2/{policy.name=folders/*/policies/*}:policyZ62,/v2/{policy.name=organizations/*/policies/*}:policy�Apolicy�
DeletePolicy..google.cloud.orgpolicy.v2.DeletePolicyRequest.google.protobuf.Empty"{���n* /v2/{name=projects/*/policies/*}Z!*/v2/{name=folders/*/policies/*}Z\'*%/v2/{name=organizations/*/policies/*}�AnameL�Aorgpolicy.googleapis.com�A.https://www.googleapis.com/auth/cloud-platformB�
com.google.cloud.orgpolicy.v2BOrgPolicyProtoPZBgoogle.golang.org/genproto/googleapis/cloud/orgpolicy/v2;orgpolicy�Google.Cloud.OrgPolicy.V2�Google\\Cloud\\OrgPolicy\\V2�Google::Cloud::OrgPolicy::V2bproto3'
        , true);

        static::$is_initialized = true;
    }
}

