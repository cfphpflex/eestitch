 


-- create database;
CREATE DATABASE stitchliteAPI;


CREATE TABLE stitchliteAPI.shopify_products (
	product_id bigint(19) DEFAULT 0 NOT NULL,
	productname varchar(250) NOT NULL,
	sku varchar(50) NOT NULL,
	quantity int(10) DEFAULT 0 NOT NULL,
	price decimal(10,2) DEFAULT 0.00 NOT NULL,
	created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
	updated_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE stitchliteAPI.stitchlite_products (
	product_id bigint(19) NOT NULL auto_increment,
	sku varchar(50) NOT NULL,
	productname varchar(250) NOT NULL,
	quantity int(10) DEFAULT 0 NOT NULL,
	price decimal(10,2) DEFAULT 0.00 NOT NULL,
	created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
	updated_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE stitchliteAPI.sync_logs (
	sync_id int(10) NOT NULL auto_increment,
	result mediumtext NOT NULL,
	created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE stitchliteAPI.vend_products (
	product_id varchar(200) NOT NULL,
	productname varchar(250) NOT NULL,
	sku varchar(50) NOT NULL,
	quantity int(10) DEFAULT 0 NOT NULL,
	price decimal(10,2) DEFAULT 0.00 NOT NULL,
	created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
	updated_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX product_id ON stitchliteapi.stitchlite_products (product_id);

CREATE INDEX sku ON stitchliteapi.vend_products (sku);

CREATE INDEX sku ON stitchliteapi.shopify_products (sku);

