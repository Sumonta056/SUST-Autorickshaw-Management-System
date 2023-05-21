# Project Code 😎

#### Creating SUST Autorickshaw Database
```code
CREATE DATABASE SUST_AutoRickshaw_Management_System ;

```

#### Creating Owner Table
```code
create table Owner(
    owner_nid INT PRIMARY key,
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
    driver_nid INT PRIMARY key,
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
    authority_id int PRIMARY KEY
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
    authority_id int,
    FOREIGN KEY(authority_id) REFERENCES authority(authority_id)
);
```
#### Creating Manager Table
```code
create table Manager(
    manager_nid INT PRIMARY key,
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
    
    manager_nid int,
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
    
    manager_nid int,
    FOREIGN key(manager_nid) REFERENCES manager(manager_nid)
);
```






