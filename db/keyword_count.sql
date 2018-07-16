SET SESSION AUTHORIZATION 'postgres';

SET search_path = "public", pg_catalog;

-- Definition

-- DROP TABLE "public"."keyword_count";
CREATE TABLE "public"."keyword_count" (
    "Id" integer NOT NULL DEFAULT nextval('"keyword_count_Id_seq"'::regclass),
    "Keyword" character varying(5),
    "Key_Count" integer,
    CONSTRAINT "keyword_count_Id_key" UNIQUE ("Id"),
    CONSTRAINT "keyword_count_pkey" PRIMARY KEY ("Id")
) WITHOUT OIDS;

-- Comment

COMMENT ON TABLE "public"."keyword_count" IS 'keyword count';

COPY "keyword_count" FROM stdin;
2	Publi	2
4	Test	1
5	test2	1
7	test3	1
3	hello	2
8	Hello	1
6	test1	5
\.

-- Indexes

CREATE UNIQUE INDEX "keyword_count_Id_key" ON keyword_count USING btree ("Id");
CREATE UNIQUE INDEX keyword_count_pkey ON keyword_count USING btree ("Id");
