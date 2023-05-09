
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
WHERE Roll = 103;
```

<hr>

### Consider the following Banking Database

- branch(branch name, branch city, assets)
- customer(customer name, customer street, customer city)
- loan(loan number, brach name, amount)
- borrower(customer name, loan number)
- account(account number, branch name, balance)
- depositor(customer name, account number)

##### Find the names of all branched located in “Dhaka”

```bash
SELECT branch_Name 
FROM branch
WHERE branch_city = “Dhaka”; 
```

##### Find the names of all borrowers who have a loan in branch “Mirpur”

```bash
SELECT customer_name
FROM Borrower, Loan 
WHERE Borrower.loan_number = loan.loan_number 
and branch_name = “Mirpur”;
```

##### Find all loan numbers with a loan value greater than BDT100,000

```bash
SELECT loan_number 
FROM loan
WHERE amount > 100000;
```

##### Find the names of all depositors who have an account with a value greater than BDT60,000. 

```bash
SELECT customer_name
FROM depositor, account
WHERE account.account_number = depositor.account_number 
and balance > 60000;
```

##### Find the names of all depositors who have an account with a value greater than BDT60,000 at the “Motejheel” branch. 

```bash
SELECT customer_name
FROM depositor, account
WHERE account.account_number = depositor.account_number 
and balance > 60000
and branch_city = “Motejheel”; 
```