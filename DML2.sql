USE sharebox;

CREATE TABLE users (
    id INT AUTO_INCREMENT,
    username VARCHAR(25),
    email VARCHAR(25),
    password VARCHAR(25),
    join_at date,
    CONSTRAINT order_pk PRIMARY KEY (order_id)
);

CREATE TABLE productItem (
    order_id INT NOT NULL,
    item_name VARCHAR(25),
    item_description VARCHAR(125),
    CONSTRAINT productItem_fk FOREIGN KEY (order_id) REFERENCES orders(order_id)
);