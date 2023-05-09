
## Creating a new database

```bash
CREATE DATABASE SUST_AUTO_RICKSHAW_MANGEMENT_SYSTEM;
```


## Showing already created databases

```bash
SHOW DATABASE;
```

## Delete a database

```bash
DROP DATABASE SUST_AUTO_RICKSHAW_MANGEMENT_SYSTEM;
```

## Creating a new database

```bash
CREATE DATABASE SUST_AUTO_RICKSHAW_MANGEMENT_SYSTEM
```


## Creating a student table wit data and data types

```bash
CREATE TABLE Student(

    Roll int(5),
    Name varchar(20),
    Gender varchar(15),
    GPA double(3,2),
    City varchar(10),
    DateBirth Date,
    PRIMARY KEY(Roll)
    
);
```
## Renaming Table

```bash
RENAME TABLE Student TO StudentInfo ;
```

## Deleting Table

```bash
DROP TABLE StudentInfo ;
```

## Inserting Data in table

```bash
INSERT INTO studentinfo
VALUES
(102,'Mridul','Male',3.95,'Dhaka','2000-04-11'),
(103,'Mridul','Male',3.95,'Dhaka','2000-03-11');
```
```bash
INSERT INTO studentinfo
(Roll,Name,Gender,GPA,City,Datebirth)
VALUES
(102,'Mridul','Male',3.95,'Dhaka','2000-04-11'),
(103,'Mridul','Male',3.95,'Dhaka','2000-03-11');
```

## Seleting Data in table (Finding Data)

##### Selecting Only One Column
```bash
SELECT Roll FROM studentinfo;
```
##### Selecting Multiple Column
```bash
SELECT Roll,Name 
FROM studentinfo;
```
##### Selecting All Column
```bash
SELECT *
FROM studentinfo;
```
##### Use Distinct to remove duplicates values from selected column
```bash
SELECT DISTINCT Name
FROM studentinfo;
```

##### Use Order by to sort duplicates values from selected column
```bash
SELECT GPA 
FROM studentinfo
ORDER BY GPA;
```
```bash
SELECT GPA 
FROM studentinfo
ORDER BY GPA DESC;
```

##### Use Where to Search Data from selected column with condition
```bash
SELECT Roll
FROM studentinfo
WHERE GPA > 3.90 ;
```
```bash
SELECT GPA 
FROM studentinfo
ORDER BY GPA DESC;
```

## Updating Data in table

```bash
UPDATE studentinfo
SET Name = 'Sumonta'
WHERE Roll = 102;
```

## Deleting Data in table

```bash
DELETE FROM studentinfo
WHERE Roll 103;
```