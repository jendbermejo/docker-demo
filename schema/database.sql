CREATE DATABASE IF NOT EXISTS stock;

USE stock;

CREATE TABLE IF NOT EXISTS stock (
    item_id BIGINT NOT NULL AUTO_INCREMENT, 
    item_uuid VARCHAR(36) UNIQUE NOT NULL,
    quantity INT NOT NULL, 
    location_uuid VARCHAR(36) UNIQUE NULL,
    updated_at TIMESTAMP, 
    PRIMARY KEY (item_id)
);
