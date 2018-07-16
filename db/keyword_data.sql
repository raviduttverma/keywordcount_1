SET SESSION AUTHORIZATION 'postgres';

SET search_path = "public", pg_catalog;

-- Definition

-- DROP TABLE "public"."keyword_data";
CREATE TABLE "public"."keyword_data" (
    "Keyword_id" integer NOT NULL DEFAULT nextval('"keyword_data_Keyword_id_seq"'::regclass),
    "Keyword" character varying(5),
    "User_Id" integer,
    "Entered_On" timestamp without time zone DEFAULT now(),
    CONSTRAINT "keyword_data_pkey" PRIMARY KEY ("Keyword_id")
) WITH OIDS;

-- Comment

COMMENT ON TABLE "public"."keyword_data" IS 'keyword info';

COPY "keyword_data" FROM stdin;
1	Publi	1	2018-07-15 16:04:41.711937
2	Publi	1	2018-07-15 16:04:45.687298
3	hello	1	2018-07-15 16:05:07.389629
4	Test	1	2018-07-15 17:16:57.603159
5	test2	1	2018-07-15 17:18:35.547206
6	test1	1	2018-07-15 17:19:09.409162
7	test3	1	2018-07-15 17:21:06.537328
8	test1	1	2018-07-15 17:21:28.503973
9	hello	1	2018-07-15 17:23:51.942519
10	test1	1	2018-07-15 17:24:11.197389
11	Hello	5	2018-07-15 17:31:33.614138
12	test1	1	2018-07-16 10:24:00.374223
13	test1	1	2018-07-16 12:37:11.476705
\.

-- Indexes

CREATE UNIQUE INDEX keyword_data_pkey ON keyword_data USING btree ("Keyword_id");
