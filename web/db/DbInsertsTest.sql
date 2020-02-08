INSERT INTO wishlist."user" (firstName, lastName)
 Values ('Fred', 'Hicken');

INSERT INTO wishlist."user" (firstName, lastName)
 Values ('Fred', 'Johnson');

INSERT INTO wishlist."user" (firstName, lastName)
 Values ('David', 'Hicken');

INSERT INTO wishlist.list (listname, listdescription, userid)
 VALUES ('Presents', 'Present list 2020', 1);

INSERT INTO wishlist.list (listname, listdescription, userid)
 VALUES ('Presents Time', 'Present list 2019', 1);

INSERT INTO wishlist.list (listname, listdescription, userid)
 VALUES ('Food', 'Shopping List', 3);

INSERT INTO wishlist.list (listname, listdescription, userid, sublistid)
 VALUES ('Smiths', 'Smiths List', 3, 3);

INSERT INTO wishlist.list (listname, listdescription, userid, sublistid)
 VALUES ('Walmart', 'Walmart List', 3, 3);

INSERT INTO wishlist.item (itemname, itemcost, itemlocation, listid)
 VALUES ('Car', 15000, 'Used Cars R Us', 1);

INSERT INTO wishlist.item (itemname, itemcost, itemlocation, listid)
 VALUES ('bread', 4.99, 'smiths', 4);

INSERT INTO wishlist.item (itemname, itemcost, itemlocation, listid)
 VALUES ('sour cream', 3, 'smiths', 4);

INSERT INTO wishlist.item (itemname, itemcost, itemlocation, listid)
 VALUES ('pills', 20, 'walmart', 5);