/*
 Navicat Premium Data Transfer

 Source Server         : Local - postgresql
 Source Server Type    : PostgreSQL
 Source Server Version : 110500
 Source Host           : localhost
 Source Database       : info
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 110500
 File Encoding         : utf-8

 Date: 04/16/2020 20:58:54 PM
*/

-- ----------------------------
--  Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
	"id" uuid NOT NULL,
	"account" varchar(60) NOT NULL COLLATE "default",
	"password" char(64) NOT NULL COLLATE "default",
	"status" int4 NOT NULL DEFAULT 1,
	"created_at" timestamp(6) WITH TIME ZONE NOT NULL,
	"updated_at" timestamp(6) WITH TIME ZONE NOT NULL
)
WITH (OIDS=FALSE);
ALTER TABLE "public"."users" OWNER TO "postgres";

COMMENT ON COLUMN "public"."users"."account" IS '帳號';
COMMENT ON COLUMN "public"."users"."password" IS '密碼';
COMMENT ON COLUMN "public"."users"."status" IS '使用者狀態';
COMMENT ON COLUMN "public"."users"."created_at" IS '建立日期';
COMMENT ON COLUMN "public"."users"."updated_at" IS '最後更新時間';

-- ----------------------------
--  Primary key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD PRIMARY KEY ("id") NOT DEFERRABLE INITIALLY IMMEDIATE;

