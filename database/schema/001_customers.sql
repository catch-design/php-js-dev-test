CREATE TABLE customer ( 
    id          SERIAL PRIMARY KEY,
    first_name  VARCHAR,
    last_name   VARCHAR,
    email       VARCHAR,
    gender      VARCHAR,
    ip_address  VARCHAR,
    company     VARCHAR,
    city        VARCHAR,
    title       VARCHAR,
    website     VARCHAR
);
