SET SESSION AUTHORIZATION 'postgres';

SET search_path = "public", pg_catalog;

-- Definition

-- DROP TABLE "public"."user_info";
CREATE TABLE "public"."user_info" (
    "User_Id" integer NOT NULL DEFAULT nextval('"user_info_User_Id_seq"'::regclass),
    "User_name" character varying(200),
    "Email_Id" character varying(200),
    "Password" character varying(200),
    "Mobile_Number" character varying(20),
    "Created_On" timestamp without time zone DEFAULT now(),
    CONSTRAINT "user_info_pkey" PRIMARY KEY ("User_Id")
) WITHOUT OIDS;

-- Comment

COMMENT ON TABLE "public"."user_info" IS 'User Information';

COPY "user_info" FROM stdin;
1	Ravi	r@g.c	51ac406cb5a22b4e7283e6871a3b6e05	9874563210	2018-07-15 14:54:32.190053
2	Prateek	p@g.com	51ac406cb5a22b4e7283e6871a3b6e05	9874563210	2018-07-15 17:26:30.099169
3	Prateek	p@g.com	51ac406cb5a22b4e7283e6871a3b6e05	9874563210	2018-07-15 17:29:09.584219
4	Thakur	p@g.com	51ac406cb5a22b4e7283e6871a3b6e05	9874563210	2018-07-15 17:29:47.430589
5	Sanjay	s@gmail.com	51ac406cb5a22b4e7283e6871a3b6e05	9874563210	2018-07-15 17:31:04.475119
\.

-- Indexes

CREATE UNIQUE INDEX user_info_pkey ON user_info USING btree ("User_Id");
