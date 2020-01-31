CREATE SCHEMA wishList;

CREATE TABLE wishList.user(
userid SERIAL NOT NULL,
firstName text NOT NULL,
lastName text NOT NULL,
CONSTRAINT user_p_key PRIMARY KEY (userID)
);

CREATE TABLE wishList.list(
listid BIGSERIAL NOT NULL,
listName TEXT NOT NULL,
listDescription TEXT,
userid INT NOT NULL,
subListid INT,
CONSTRAINT list_p_key PRIMARY KEY (listid),
CONSTRAINT "list_sublistkey" FOREIGN KEY (sublistid)
   REFERENCES wishlist.list (listid) MATCH SIMPLE,
CONSTRAINT "list_userkey" FOREIGN KEY (userID)
   REFERENCES wishlist.user (userid) MATCH SIMPLE
);

CREATE TABLE wishList.item(
itemID BIGSERIAL NOT NULL,
itemName TEXT NOT NULL,
itemCost DECIMAL (6, 2),
itemLocation TEXT,
itemInfo TEXT,
listid INT NOT NULL,
CONSTRAINT item_p_key PRIMARY KEY (itemid),
CONSTRAINT item_list_key FOREIGN KEY (listid)
   REFERENCES wishlist.list (listid) MATCH SIMPLE
);