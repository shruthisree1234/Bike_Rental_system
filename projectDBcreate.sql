CREATE TABLE Fall22_S004_3_User ( 
    UserID VARCHAR2(26) NOT NULL,
    FirstName VARCHAR2(26),
    LastName VARCHAR2(26),
    Address VARCHAR2(128),
    Gender VARCHAR2(26),
    DOB DATE,
    PRIMARY KEY(UserID)
);
 
CREATE TABLE Fall22_S004_3_Admin ( 
    UserID VARCHAR2(26) NOT NULL,
    PRIMARY KEY(UserID),
    FOREIGN KEY (UserID)
        REFERENCES Fall22_S004_3_User(UserID)
        ON DELETE CASCADE    
);

CREATE TABLE Fall22_S004_3_Student ( 
    UserID VARCHAR2(26),
    Major VARCHAR2(26),
    RegisterDate DATE,
    PRIMARY KEY(UserID),
    FOREIGN KEY (UserID)
        REFERENCES Fall22_S004_3_User(UserID)
        ON DELETE CASCADE    
);

CREATE TABLE Fall22_S004_3_UserPhoneNumber ( 
    UserID VARCHAR2(26),
    PhoneNumber NUMBER(38),
    PRIMARY KEY(UserID),
    FOREIGN KEY (UserID)
        REFERENCES Fall22_S004_3_User(UserID)
        ON DELETE CASCADE 
);
 
 
 CREATE TABLE Fall22_S004_3_User_Email (
    UserID VARCHAR2(15) NOT NULL,
    Email VARCHAR2(255),
    PRIMARY KEY(UserID,Email),
    FOREIGN KEY (UserID)
        REFERENCES Fall22_S004_3_User(UserID)
        ON DELETE CASCADE
 );
 
CREATE TABLE Fall22_S004_3_Location (
	LocationID VARCHAR2(26) NOT NULL,
	Address VARCHAR2(50),
	LocName VARCHAR2(50),
	PRIMARY KEY (LocationID)
);

CREATE TABLE Fall22_S004_3_Vehicle (
	VehicleID VARCHAR2(26) NOT NULL,
	Availability VARCHAR2(26),
	Rate NUMBER(38),
	Condition VARCHAR2(26),
	Model VARCHAR2(26),
	Type VARCHAR2(26),
	PRIMARY KEY (VehicleID)
);

CREATE TABLE Fall22_S004_3_Location_Vehicle (
	LocationID VARCHAR2(26) NOT NULL,
    VehicleID VARCHAR2(26) NOT NULL,
	PRIMARY KEY (VehicleID,LocationID),
    FOREIGN KEY (LocationID)
        REFERENCES Fall22_S004_3_Location(LocationID)
        ON DELETE CASCADE,
	FOREIGN KEY (VehicleID)
        REFERENCES Fall22_S004_3_Vehicle(VehicleID)
        ON DELETE CASCADE
);



CREATE TABLE Fall22_S004_3_Manage ( 
    UserID VARCHAR2(26) NOT NULL,
    VehicleID VARCHAR2(26) NOT NULL,
    PRIMARY KEY(UserID,VehicleID),
    FOREIGN KEY (UserID)
        REFERENCES Fall22_S004_3_Admin(UserID)
        ON DELETE CASCADE,
    FOREIGN KEY (VehicleID)
        REFERENCES Fall22_S004_3_Vehicle(VehicleID)
        ON DELETE CASCADE
);
 

  CREATE TABLE Fall22_S004_3_Booking (
    BookingID VARCHAR2(26) NOT NULL,
    PickupDate DATE,
    ReturnDate DATE,
    VehicleID VARCHAR2(26),
    UserID VARCHAR2(26),
    PRIMARY KEY(BookingID),
    FOREIGN KEY (VehicleID)
        REFERENCES Fall22_S004_3_Vehicle(VehicleID)
        ON DELETE CASCADE,
    FOREIGN KEY (UserID)
        REFERENCES Fall22_S004_3_Student(UserID)
        ON DELETE CASCADE
 );
 
 
CREATE TABLE Fall22_S004_3_Penalty (
    PenaltyID VARCHAR2(26) NOT NULL,
    BookingID VARCHAR2(26),
    Damage VARCHAR2(26),
    OverdueDate DATE,
    PenaltyCharge NUMBER(38),
    PRIMARY KEY(PenaltyID),
    FOREIGN KEY (BookingID)
        REFERENCES Fall22_S004_3_Booking(BookingID)
        ON DELETE CASCADE
 );