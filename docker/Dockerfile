FROM bitnami/postgresql:14

ADD ./0_create_user.sql /docker-entrypoint-initdb.d/0_create_user.sql
ADD ./1_create_db.sql /docker-entrypoint-initdb.d/1_create_db.sql
ADD ./2_insert_db.sql /docker-entrypoint-initdb.d/2_insert_db.sql
ADD ./3_views_db.sql /docker-entrypoint-initdb.d/3_views_db.sql
