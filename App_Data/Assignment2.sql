
DROP TABLE OrderItem;
DROP TABLE Orders;
DROP TABLE Shoe;
DROP TABLE Supplier;
DROP TABLE Category;
DROP TABLE Customer;

CREATE TABLE Customer (
  CustomerID int(6) unsigned NOT NULL auto_increment,
  User_Name varchar(100) NOT NULL default '',
  Phone_Number varchar(100) NOT NULL default '',
  Email varchar(100) NOT NULL default '',
  Password varchar(100) NOT NULL default '',
  Address varchar(100) NOT NULL default '',
  First_Name varchar(100) NOT NULL default '',
  Last_Name varchar(100) NOT NULL default '',
  Status varchar(100) NOT NULL default '',
  PRIMARY KEY  (CustomerID)
);

CREATE TABLE Category (
  CategoryID int(6) unsigned NOT NULL auto_increment,
  Category varchar(100) NOT NULL default '',
  PRIMARY KEY  (CategoryID)
);
INSERT INTO `Category`( `Category`) VALUES ('Heel');
INSERT INTO `Category`( `Category`) VALUES ('Slip on');
INSERT INTO `Category`( `Category`) VALUES ('Boot');
INSERT INTO `Category`( `Category`) VALUES ('test');

CREATE TABLE Supplier (
  SupplierID int(6) unsigned NOT NULL auto_increment,
  Supplier_Name varchar(100) NOT NULL default '',
  Phone_Number varchar(100) NOT NULL default '',
  Address varchar(100) NOT NULL default '',
  Email varchar(100) NOT NULL default '',
  PRIMARY KEY  (SupplierID)
);
INSERT INTO `Supplier`(`Supplier_Name`, `Phone_Number`, `Address`, `Email`) VALUES ('Shoe Industry1',7894562,'10023 Carrington Road','info@indus.co.nz');
INSERT INTO `Supplier`(`Supplier_Name`, `Phone_Number`, `Address`, `Email`) VALUES ('Boot Store',56412314,'1200 New North Road','info@boot.co.nz');
INSERT INTO `Supplier`(`Supplier_Name`, `Phone_Number`, `Address`, `Email`) VALUES ('Supper Shoes',1324654,'13 Mt Albert Road','info@kia.co.nz');

CREATE TABLE Shoe (
  ShoeID int(6) unsigned NOT NULL auto_increment,
  Shoe_Name varchar(100) NOT NULL default '',
  CategoryID int references Category(CategoryID),
  SupplierID int references Supplier(SupplierID),
  Price decimal(5,2) NOT NULL default 000.00,
  Description varchar(100) NOT NULL default '',
  Image varchar(100) NOT NULL default '',
  PRIMARY KEY  (ShoeID)
);
INSERT INTO `Shoe`(`Shoe_Name`, `CategoryID`, `SupplierID`, `Price`, `Description`, `Image`) VALUES ('Heeld',1,2,117,'Nice Heel','Heel2.jpg')
INSERT INTO `Shoe`(`Shoe_Name`, `CategoryID`, `SupplierID`, `Price`, `Description`, `Image`) VALUES ('Heela',1,1,116,'Nice Heel','Heel3.jpg')
INSERT INTO `Shoe`(`Shoe_Name`, `CategoryID`, `SupplierID`, `Price`, `Description`, `Image`) VALUES ('Heele',1,2,160,'Nice Heel','Heel3.jpg')
INSERT INTO `Shoe`(`Shoe_Name`, `CategoryID`, `SupplierID`, `Price`, `Description`, `Image`) VALUES ('Heel',1,2,130,'Nice Heel','Heel4.jpg')
INSERT INTO `Shoe`(`Shoe_Name`, `CategoryID`, `SupplierID`, `Price`, `Description`, `Image`) VALUES ('Slipona',2,2,71,'Nice slip on','Slipon1.jpg')
INSERT INTO `Shoe`(`Shoe_Name`, `CategoryID`, `SupplierID`, `Price`, `Description`, `Image`) VALUES ('Boota',3,5,95,'Nice Boot','Boot1.jpg')
INSERT INTO `Shoe`(`Shoe_Name`, `CategoryID`, `SupplierID`, `Price`, `Description`, `Image`) VALUES ('Bootb',3,2,69,'Nice Boot','Boot2.jpg')
INSERT INTO `Shoe`(`Shoe_Name`, `CategoryID`, `SupplierID`, `Price`, `Description`, `Image`) VALUES ('Sliponb',2,5,76,'Nice slip on','Slipon2.jpg')
INSERT INTO `Shoe`(`Shoe_Name`, `CategoryID`, `SupplierID`, `Price`, `Description`, `Image`) VALUES ('Heelf',1,2,143,'Nice Heel','Heel6.jpg')
INSERT INTO `Shoe`(`Shoe_Name`, `CategoryID`, `SupplierID`, `Price`, `Description`, `Image`) VALUES ('Sliponc',2,5,101,'Nice slip on','Slipon3.jpg')
INSERT INTO `Shoe`(`Shoe_Name`, `CategoryID`, `SupplierID`, `Price`, `Description`, `Image`) VALUES ('Slipond',2,5,69,'Nice slip on','Slipon4.jpg')
INSERT INTO `Shoe`(`Shoe_Name`, `CategoryID`, `SupplierID`, `Price`, `Description`, `Image`) VALUES ('Bootc',3,1,85,'Nice Boot','Boot3.jpg')
INSERT INTO `Shoe`(`Shoe_Name`, `CategoryID`, `SupplierID`, `Price`, `Description`, `Image`) VALUES ('Bootd',3,5,96,'Nice Boot','Boot4.jpg')


CREATE TABLE Orders (
  OrderID int(6) unsigned NOT NULL auto_increment,
  Status varchar(100) NOT NULL default '',
  OrderDate DATE,
  CustomerID int references Customer(CustomerID),
  Subtotal decimal(5,2) NOT NULL default 000.00,
  GST decimal(5,2) NOT NULL default 000.00,
  GrandTotal decimal(5,2) NOT NULL default 000.00,
  PRIMARY KEY  (OrderID)
);
INSERT INTO `Orders`(`Status`, `OrderDate`, `CustomerID`, `Subtotal`, `GST`, `GrandTotal`) VALUES ('waiting','2012/11/10',2,130,30,160);
INSERT INTO `Orders`(`Status`, `OrderDate`, `CustomerID`, `Subtotal`, `GST`, `GrandTotal`) VALUES ('waiting','2012/11/13',2,123,20,143);
INSERT INTO `Orders`(`Status`, `OrderDate`, `CustomerID`, `Subtotal`, `GST`, `GrandTotal`) VALUES ('waiting','2012/11/10',2,50,8,58);
INSERT INTO `Orders`(`Status`, `OrderDate`, `CustomerID`, `Subtotal`, `GST`, `GrandTotal`) VALUES ('waiting','2012/06/10',2,30,4.5,34.5);
INSERT INTO `Orders`(`Status`, `OrderDate`, `CustomerID`, `Subtotal`, `GST`, `GrandTotal`) VALUES ('waiting','2012/11/10',2,100,15,115);
INSERT INTO `Orders`(`Status`, `OrderDate`, `CustomerID`, `Subtotal`, `GST`, `GrandTotal`) VALUES ('waiting','2012/10/10',2,200,30,230);
INSERT INTO `Orders`(`Status`, `OrderDate`, `CustomerID`, `Subtotal`, `GST`, `GrandTotal`) VALUES ('waiting','2012/11/10',2,200,30,230);
INSERT INTO `Orders`(`Status`, `OrderDate`, `CustomerID`, `Subtotal`, `GST`, `GrandTotal`) VALUES ('waiting','2012/01/10',2,300,45,345);

CREATE TABLE OrderItem (
  OrderItemID int(6) unsigned NOT NULL auto_increment,
  ShoeID int references Shoe(ShoeID),
  Quantity int ,
  Price decimal(5,2) NOT NULL default 000.00,
  OrderID int references Order(OrderID),
  PRIMARY KEY  (OrderItemID)
  );
  
  INSERT INTO `OrderItem`( `ShoeID`, `Quantity`, `Price`, `OrderID`) VALUES (3,2,232,2);
INSERT INTO `OrderItem`( `ShoeID`, `Quantity`, `Price`, `OrderID`) VALUES (4,1,160,3);
INSERT INTO `OrderItem`( `ShoeID`, `Quantity`, `Price`, `OrderID`) VALUES (6,1,130,3);
INSERT INTO `OrderItem`( `ShoeID`, `Quantity`, `Price`, `OrderID`) VALUES (7,1,71,4);
INSERT INTO `OrderItem`( `ShoeID`, `Quantity`, `Price`, `OrderID`) VALUES (6,1,145,3);
INSERT INTO `OrderItem`( `ShoeID`, `Quantity`, `Price`, `OrderID`) VALUES (4,1,160,3);
INSERT INTO `OrderItem`( `ShoeID`, `Quantity`, `Price`, `OrderID`) VALUES (4,1,160,3);
INSERT INTO `OrderItem`( `ShoeID`, `Quantity`, `Price`, `OrderID`) VALUES (4,1,160,3);