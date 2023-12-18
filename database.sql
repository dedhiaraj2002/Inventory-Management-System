-- Oracle Done
-- Create a sequence for generating ID values (Oracle's equivalent to AUTO_INCREMENT)
CREATE SEQUENCE invdb_seq START WITH 1 INCREMENT BY 1 NOCACHE NOCYCLE;

-- Create a table in Oracle
CREATE TABLE invdb (ID NUMBER PRIMARY KEY NOT NULL, pName VARCHAR2(100 CHAR) NOT NULL, PID VARCHAR2(12 CHAR) UNIQUE NOT NULL, selectEdition VARCHAR2(15 CHAR) CHECK (selectEdition IN ('Regular', 'Limited Edition')) NOT NULL, qtyAvail NUMBER(10) NOT NULL, pType VARCHAR2(15 CHAR) CHECK (pType IN ('Cap', 'TShirt', 'Hoodie', 'SHoodie', 'CMug', 'Notepad')) NOT NULL, priceUSD NUMBER(10, 2) NOT NULL);

-- Insert data into the Oracle table using the sequence for IDs
INSERT INTO invdb (id, pName, PID, selectEdition, qtyAvail, pType, priceUSD) VALUES (invdb_seq.NEXTVAL, 'John Smith', '123', 'Regular', 20, 'Coffee Mug', 100);
