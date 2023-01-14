<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/networksecurity/v1beta1/authorization_policy.proto

namespace GPBMetadata\Google\Cloud\Networksecurity\V1Beta1;

class AuthorizationPolicy
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
?google/cloud/networksecurity/v1beta1/authorization_policy.proto$google.cloud.networksecurity.v1beta1google/api/resource.proto google/protobuf/field_mask.protogoogle/protobuf/timestamp.protogoogle/api/annotations.proto"�	
AuthorizationPolicy
name (	B�A
description (	B�A4
create_time (2.google.protobuf.TimestampB�A4
update_time (2.google.protobuf.TimestampB�AZ
labels (2E.google.cloud.networksecurity.v1beta1.AuthorizationPolicy.LabelsEntryB�AU
action (2@.google.cloud.networksecurity.v1beta1.AuthorizationPolicy.ActionB�AR
rules (2>.google.cloud.networksecurity.v1beta1.AuthorizationPolicy.RuleB�A�
Rule[
sources (2E.google.cloud.networksecurity.v1beta1.AuthorizationPolicy.Rule.SourceB�Ae
destinations (2J.google.cloud.networksecurity.v1beta1.AuthorizationPolicy.Rule.DestinationB�A9
Source

principals (	B�A
	ip_blocks (	B�A�
Destination
hosts (	B�A
ports (B�A
methods (	B�Az
http_header_match (2Z.google.cloud.networksecurity.v1beta1.AuthorizationPolicy.Rule.Destination.HttpHeaderMatchB�AO
HttpHeaderMatch
regex_match (	B�AH 
header_name (	B�AB
type-
LabelsEntry
key (	
value (	:8"5
Action
ACTION_UNSPECIFIED 	
ALLOW
DENY:��A�
2networksecurity.googleapis.com/AuthorizationPolicyTprojects/{project}/locations/{location}/authorizationPolicies/{authorization_policy}"�
 ListAuthorizationPoliciesRequest9
parent (	B)�A�A#
!locations.googleapis.com/Location
	page_size (

page_token (	"�
!ListAuthorizationPoliciesResponseY
authorization_policies (29.google.cloud.networksecurity.v1beta1.AuthorizationPolicy
next_page_token (	"i
GetAuthorizationPolicyRequestH
name (	B:�A�A4
2networksecurity.googleapis.com/AuthorizationPolicy"�
 CreateAuthorizationPolicyRequestJ
parent (	B:�A�A4
2networksecurity.googleapis.com/AuthorizationPolicy$
authorization_policy_id (	B�A\\
authorization_policy (29.google.cloud.networksecurity.v1beta1.AuthorizationPolicyB�A"�
 UpdateAuthorizationPolicyRequest4
update_mask (2.google.protobuf.FieldMaskB�A\\
authorization_policy (29.google.cloud.networksecurity.v1beta1.AuthorizationPolicyB�A"l
 DeleteAuthorizationPolicyRequestH
name (	B:�A�A4
2networksecurity.googleapis.com/AuthorizationPolicyB�
(com.google.cloud.networksecurity.v1beta1PZSgoogle.golang.org/genproto/googleapis/cloud/networksecurity/v1beta1;networksecurity�$Google.Cloud.NetworkSecurity.V1Beta1�$Google\\Cloud\\NetworkSecurity\\V1beta1�\'Google::Cloud::NetworkSecurity::V1beta1bproto3'
        , true);

        static::$is_initialized = true;
    }
}

