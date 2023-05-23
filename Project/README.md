# Project Code 😎

#### Creating SUST Autorickshaw Database
```code
CREATE DATABASE SUST_AutoRickshaw_Management_System ;

```

#### Creating Owner Table
```code
create table Owner(
    owner_nid varchar(15) PRIMARY key,
    owner_name varchar(30),
    owner_address varchar(40),
    owner_date_of_birth date
);
```

#### Creating Autorickshaw Table
```code
create table Autorickshaw(
    autorickshaw_number int primary key,
    autorickshaw_company varchar(30),
    autorickshaw_model varchar(30),
    autorickshaw_color varchar(20),
    
    owner_nid int,
    foreign key (owner_nid) REFERENCES owner(owner_nid)
);
```

#### Creating Driver Table
```code
create table Driver(
    driver_nid varchar(30) PRIMARY key,
    driver_name varchar(30),
    driver_address varchar(40),
    driver_date_of_birth date,
    
    autorickshaw_number int,
    foreign key(autorickshaw_number) REFERENCES autorickshaw(autorickshaw_number)
);
```

#### Creating Authority Table
```code
create table Authority(
    authority_name varchar(30),
    authority_job_title varchar(30),
    authority_signature varchar(10),
    authority_id varchar(15) PRIMARY KEY
);
```
#### Creating Permission Table
```code
create table Permission(
    permission_area varchar(20),
    permission_date date,
    expiration_date date,
    permission_agreement varchar(40),
    
    autorickshaw_number int,
    FOREIGN KEY (autorickshaw_number) REFERENCES autorickshaw(autorickshaw_number),
    authority_id varchar(15),
    FOREIGN KEY(authority_id) REFERENCES authority(authority_id)
);
```
#### Creating Manager Table
```code
create table Manager(
    manager_nid varchar(15) PRIMARY key,
    manager_name varchar(30),
    manager_address varchar(40),
    manager_date_of_birth date
);
```

#### Creating Round Table
```code
create table Round(
    round_number int PRIMARY KEY,
    round_date date,
    start_time time,
    end_time time,
    round_area varchar(30),
    
    autorickshaw_number int,
    FOREIGN key(autorickshaw_number) REFERENCES autorickshaw(autorickshaw_number),
    
    manager_nid varchar(15),
    FOREIGN key(manager_nid) REFERENCES manager(manager_nid)
);
```
#### Creating Serial Table
```code
create table Serial(
    serial_number INT,
    serial_time time, 
    serial_date date,
    serial_status varchar(10),
    
    round_number int,
    FOREIGN key(round_number) REFERENCES round(round_number),
    
    manager_nid varchar(15),
    FOREIGN key(manager_nid) REFERENCES manager(manager_nid)
);
```

#### Inserting Owner Data
```code
INSERT INTO owner
VALUES
(6877807200,    'Md.Selim Reza',			'Sust, Sylhet',				'1963-04-11'),
(6877807201,    'Md. Oman Sani',			'Staff, Sylhet',			'1962-02-12'),
(6877807202,    'Shekh Azizur Rahaman',		'Sust, Sylhet', 			'1968-01-19'),
(6877807203,	'Md. Shawon Rahaman',		'Modina Market, Sylhet',	'1970-01-21'),
(6877807204,	'Md. Mofizur Rahaman' ,		'Sust, Sylhet',				'1968-01-19'),
(6877807205,	'Nazim Uddin',	     		'Ambarkhana, Sylhet',		'1975-11-08'),
(6877807206,	'Md. Sayed Ahmed',			'Modina Market, Sylhet',	'1978-06-28'),
(6877807207,	'Md. Alomgir Hossain' ,		'Sust, Sylhet',				'1965-07-29'),
(6877807208,	'Shekh Mostofa Kamal' ,		'Akhalia, Sylhet',			'1980-11-09'),
(6877807209,	'Belal Khan',				'Staff, Sylhet',			'1971-10-14'),
(6877807210,	'Abdul Moyeen Khan' ,		'Akhalia, Sylhet',			'1973-01-10');

```

#### Inserting Driver Data
```code

INSERT INTO driver
VALUES
(6877807895,'Dulal Miya','Akhaliya','1990-04-12',40);


```


#### Query - 1 : Sort Owner based on Dateofbirth
```code

SELECT *
FROM owner
ORDER BY  owner_date_of_birth;

```



