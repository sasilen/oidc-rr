-- MySQL dump 10.14  Distrib 5.5.68-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: rr
-- ------------------------------------------------------
-- Server version	5.5.68-MariaDB
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO,POSTGRESQL' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table "allowed_auth_methods"
--

DROP TABLE IF EXISTS "allowed_authentication_methods";
DROP TABLE IF EXISTS "allowed_auth_methods";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "allowed_auth_methods" (
  "id" serial NOT NULL,
  "auth_method" varchar(30) NOT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "federations"
--

DROP TABLE IF EXISTS "federations";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "federations" (
  "id" serial NOT NULL,
  "name" varchar(50) DEFAULT NULL,
  "description" varchar(255) DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "grant_types"
--

DROP TABLE IF EXISTS "grant_types";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "grant_types" (
  "id" serial NOT NULL,
  "grant_type" varchar(255) DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "phinxlog"
--

DROP TABLE IF EXISTS "phinxlog";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "phinxlog" (
  "version" bigint NOT NULL,
  "migration_name" varchar(100) DEFAULT NULL,
  "start_time" timestamp NULL DEFAULT NULL,
  "end_time" timestamp NULL DEFAULT NULL,
  "breakpoint" smallint NOT NULL DEFAULT '0',
  PRIMARY KEY ("version")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "redirect_uris"
--

DROP TABLE IF EXISTS "redirect_uris";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "redirect_uris" (
  "id" serial NOT NULL,
  "rp_id" int DEFAULT NULL,
  "redirect_uri" varchar(255) DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "resources"
--

DROP TABLE IF EXISTS "resources";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "resources" (
  "id" serial NOT NULL,
  "resourceserver_id" int NOT NULL,
  "resource" varchar(255) DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "resources_rps"
--

DROP TABLE IF EXISTS "resources_rps";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "resources_rps" (
  "resource_id" int NOT NULL,
  "rp_id" int NOT NULL,
  PRIMARY KEY ("resource_id","rp_id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "resourceservers"
--

DROP TABLE IF EXISTS "resourceservers";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "resourceservers" (
  "id" serial NOT NULL,
  "resourceserver" varchar(255) NOT NULL,
  "description" varchar(500) DEFAULT NULL,
  "contacts" varchar(500) DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "resourceservers_users"
--

DROP TABLE IF EXISTS "resourceservers_users";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "resourceservers_users" (
  "user_id" int NOT NULL,
  "resourceserver_id" int NOT NULL,
  PRIMARY KEY ("user_id","resourceserver_id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "response_types"
--

DROP TABLE IF EXISTS "response_types";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "response_types" (
  "id" serial NOT NULL,
  "response_type" varchar(255) DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "rps"
--

DROP TABLE IF EXISTS "rps";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "rps" (
  "id" serial NOT NULL,
  "client_identifier" varchar(255) DEFAULT NULL,
  "client_secret" varchar(255) DEFAULT NULL,
  "client_name" varchar(255) DEFAULT NULL,
  "token_endpoint_auth_method" varchar(20) DEFAULT NULL,
  "redirect_uris" varchar(500) DEFAULT NULL,
  "contacts" varchar(500) DEFAULT NULL,
  "policy_uri" varchar(255) DEFAULT NULL,
  "initiate_login_uri" varchar(255) DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "rps_allowed_auth_methods"
--

DROP TABLE IF EXISTS "rps_allowed_authentication_methods";
DROP TABLE IF EXISTS "rps_allowed_auth_methods";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "rps_allowed_auth_methods" (
  "rp_id" int NOT NULL,
  "allowed_auth_method_id" int NOT NULL,
  PRIMARY KEY ("rp_id","allowed_auth_method_id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "rps_federations"
--

DROP TABLE IF EXISTS "rps_federations";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "rps_federations" (
  "rp_id" int NOT NULL,
  "federation_id" int NOT NULL,
  "status" varchar(10) DEFAULT NULL,
  PRIMARY KEY ("rp_id","federation_id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "rps_grant_types"
--

DROP TABLE IF EXISTS "rps_grant_types";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "rps_grant_types" (
  "rp_id" int NOT NULL,
  "grant_type_id" int NOT NULL,
  PRIMARY KEY ("rp_id","grant_type_id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "rps_response_types"
--

DROP TABLE IF EXISTS "rps_response_types";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "rps_response_types" (
  "rp_id" int NOT NULL,
  "response_type_id" int NOT NULL,
  PRIMARY KEY ("rp_id","response_type_id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "rps_scopes"
--

DROP TABLE IF EXISTS "rps_scopes";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "rps_scopes" (
  "rp_id" int NOT NULL,
  "scope_id" int NOT NULL,
  PRIMARY KEY ("rp_id","scope_id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "rps_token_endpoint_auth_methods"
--

DROP TABLE IF EXISTS "rps_token_endpoint_auth_methods";
DROP TABLE IF EXISTS "rps_token_endpoint_authentication_methods";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "rps_token_endpoint_auth_methods" (
  "rp_id" int NOT NULL,
  "token_endpoint_auth_method_id" int NOT NULL,
  PRIMARY KEY ("rp_id","token_endpoint_auth_method_id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "rps_users"
--

DROP TABLE IF EXISTS "rps_users";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "rps_users" (
  "user_id" int NOT NULL,
  "rp_id" int NOT NULL,
  PRIMARY KEY ("user_id","rp_id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "scopes"
--

DROP TABLE IF EXISTS "scopes";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "scopes" (
  "id" serial NOT NULL,
  "scope" varchar(255) DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "token_endpoint_auth_methods"
--

DROP TABLE IF EXISTS "token_endpoint_auth_methods";
DROP TABLE IF EXISTS "token_endpoint_authentication_methods";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "token_endpoint_auth_methods" (
  "id" serial NOT NULL,
  "token_endpoint_auth_method" varchar(30) NOT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "tokens"
--

DROP TABLE IF EXISTS "tokens";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "tokens" (
  "id" serial NOT NULL,
  "expires" varchar(255) DEFAULT NULL,
  "token" varchar(255) DEFAULT NULL,
  "modified" timestamp DEFAULT NULL,
  "created" timestamp DEFAULT NULL,
  "expired" timestamp DEFAULT NULL,
  "status" smallint DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table "users"
--

DROP TABLE IF EXISTS "users";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "users" (
  "id" serial NOT NULL,
  "username" varchar(255) DEFAULT NULL,
  "eppn" varchar(255) DEFAULT NULL,
  "family_name" varchar(255) DEFAULT NULL,
  "given_name" varchar(255) DEFAULT NULL,
  "email" varchar(255) DEFAULT NULL,
  "status" varchar(10) DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-01 13:35:35
