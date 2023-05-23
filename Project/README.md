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
    
    owner_nid varchar(15),
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
INSERT INTO Owner (owner_nid, owner_name, owner_address, owner_date_of_birth)
VALUES
    (6877807200, 'Md.Selim Reza', 'Sust, Sylhet', '1963-04-11'),
    (6877807201, 'Md. Oman Sani', 'Staff, Sylhet', '1962-02-12'),
    (6877807202, 'Shekh Azizur Rahaman', 'Sust, Sylhet', '1968-01-19'),
    (6877807203, 'Md. Shawon Rahaman', 'Modina Market, Sylhet', '1970-01-21'),
    (6877807206, 'Md. Sayed Ahmed', 'Modina Market, Sylhet', '1978-06-28'),   
```


#### Inserting Autorickshaw Data
```code

INSERT INTO autorickshaw (autorickshaw_number, autorickshaw_company, autorickshaw_color, autorickshaw_model, owner_nid)
VALUES
(40, 'Shotota Enterprise', 'Mahindra Mini', 'red', '6877807200');
(18, 'Sadia Enterprise', 'TVS King', 'blue', '6877807201');
(7, 'Sadia Enterprise', 'TVS King', 'green', '6877807202');
(51, 'Ma Enterprise', 'TVS King', 'green', '6877807203');
(47, 'Shotota Enterprise', 'Mahindra Mini', 'blue', '6877807201');
(32, 'Shotota Enterprise', 'Mahindra Mini', 'red', '6877807201');
(52, 'Ma Enterprise', 'Porag', 'red', '6877807206');
(17, 'Ma Enterprise', 'Porag', 'blue', '6877807200');
(33, 'Mayer Doa Enterprise', 'TVS King', 'red', '6877807203');
(56, 'Shotota Enterprise', 'Mahindra Mini', 'green', '6877807203');
(30, 'Sadia Enterprise', 'porag', 'blue', '6877807203');


```

#### Inserting Driver Data
```code
INSERT INTO driver (driver_nid, driver_name, driver_address, driver_date_of_birth, autorickshaw_number)
VALUES
  ('3762328990', 'Dulal Mia', 'Akhalia, Sylhet', '1963-04-11', 40),
  ('3372328999', 'Hasan Ahmed', 'Fulbari, Sylhet', '1962-12-10', 18),
  ('8229191111', 'Abbir Hossain', 'Akhalia, Sylhet', '1964-04-15', 7),
  ('3427688883', 'Tareq Mia', 'Fulbari, Sylhet', '1981-04-20', 30),
  ('5474232556', 'Ismail Hossain', 'Akhalia, Sylhet', '1963-06-17', 51),
  ('6592324244', 'Ahsan Haque', 'Modina Market, Sylhet', '1985-09-11', 47),
  ('7975644334', 'Rezaul Karim', 'Kalibari, Sylhet', '1964-02-13', 32),
  ('6565784979', 'Md. Ikbal Hossain', 'Modina Market, Sylhet', '1963-11-11', 52),
  ('7777533547', 'Md. Alomgir Hossain', 'SUST, Sylhet', '1973-10-29', 17),
  ('9821903083', 'Faruk Mia', 'Akhalia, Sylhet', '1993-04-11', 33),
  ('5454433338', 'Abdul Jobbar', 'SUST, Sylhet', '1983-01-23', 56);

```

#### Inserting Authority Data
```code

INSERT INTO authority (authority_name, authority_job_title, authority_signature, authority_id)
VALUES
    ('Dr. Md. Alomgir Kabir', 'Proctor', 'A Kabir', '4291923818'),
    ('Md. Israt Ibn Ismail', 'Proctor', 'Ismail', '4291923857'),
    ('Md. Abu Hena Pohil', 'Proctor', 'Pohil', '4291923856');
```

#### Inserting Permission Data
```code

INSERT INTO permission(permission_area, permission_date,expiration_date, permission_agreement, autorickshaw_number, authority_id)
VALUES
  ('SUST, Sylhet', '2020-07-08', '2023-11-11', 'agreed', 40, '4291923818'),
  ('SUST, Sylhet', '2019-05-30', '2023-08-07', 'agreed', 18, '4291923857'),
  ('SUST, Sylhet', '2019-05-05', '2023-10-16', 'agreed', 7, '4291923818'),
  ('SUST, Sylhet', '2021-05-09', '2023-11-11', 'agreed', 51, '4291923856'),
  ('SUST, Sylhet', '2020-07-12', '2023-10-08', 'agreed', 47, '4291923856'),
  ('SUST, Sylhet', '2019-10-13', '2023-08-27', 'agreed', 32, '4291923857'),
  ('SUST, Sylhet', '2019-05-30', '2023-12-11', 'agreed', 52, '4291923818'),
  ('SUST, Sylhet', '2019-05-12', '2023-05-31', 'agreed', 17, '4291923856'),
  ('SUST, Sylhet', '2019-05-30', '2023-11-19', 'agreed', 33, '4291923856'),
  ('SUST, Sylhet', '2020-06-17', '2023-12-10', 'agreed', 56, '4291923856'),
  ('SUST, Sylhet', '2019-05-09', '2024-01-18', 'agreed', 30, '4291923857');
```

#### Inserting Manager Data
```code

INSERT INTO `manager`(`manager_nid`, `manager_name`, `manager_address`, `manager_date_of_birth`)
VALUES
  ('9474232550', 'Misbah Ullah', 'SUST, Sylhet', '1980-01-01'),
  ('3762324990', 'Wasif Ullah', 'SUST, Sylhet', '1990-01-01'),
  ('5299322300', 'Zaman Chowdhury', 'SUST, Sylhet', '1985-01-01');

```


#### Query - 1 : Sort Owner based on Dateofbirth
```code

SELECT *
FROM owner
ORDER BY  owner_date_of_birth;

```

#### Query - 2 : AutoRickshaw details of owner Name Md.Selim Reza
```code

SELECT *
FROM owner
ORDER BY  owner_date_of_birth;

```

