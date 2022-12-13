--change in user information
INSERT INTO Fall22_S004_3_User (UserID, FirstName, LastName, Address, Gender, DOB)
VALUES ('U101', 'Hans', 'Clark', '8 North Avenue, Eastpoint, MI 48022', 'Female', to_date('05-30-1988', 'MM/DD/RRRR'));


DELETE FROM Fall22_S004_3_User
WHERE UserID = 'U01';

UPDATE Fall22_S004_3_User
SET FirstName = 'Harryson' , LastName = 'John'
WHERE UserID = 'U08';

UPDATE Fall22_S004_3_User
SET FirstName = 'Larry' , LastName = 'Donald'
WHERE UserID = 'U02';


--Change in Student information
UPDATE Fall22_S004_3_Student  
SET Major = NULL
WHERE UserID = 'U02';


UPDATE Fall22_S004_3_Student
SET Major = 'Aeroscience' , RegisterDate = to_date('10-11-2022', 'MM/DD/RRRR')
WHERE UserID = 'U03';

--Phone number updation
UPDATE Fall22_S004_3_UserPhoneNumber
SET PhoneNumber = '9652310023'
WHERE UserID = 'U03';

--email updation
UPDATE Fall22_S004_3_User_Email
SET Email = 'abcd@mavs.uta.edu'
WHERE UserID = 'U08';

--Location updation
UPDATE Fall22_S004_3_Location
SET Address = '655 W Mitchell St, Arlington, TX 76010'
WHERE LocationID = 'L01';

--Change in number of vehicles per location 

INSERT INTO Fall22_S004_3_Vehicle (VehicleID, Availability, Rate, Condition, Model, Type)
VALUES ('V151', 'Available', '20', 'New', 'S2', 'Scooter');

DELETE FROM Fall22_S004_3_Vehicle
WHERE VehicleID = 'V02';
DELETE FROM Fall22_S004_3_Vehicle
WHERE VehicleID = 'V03';
DELETE FROM Fall22_S004_3_Vehicle
WHERE VehicleID = 'V04';
 
--Change in revenue and bookings based on vehicle type
UPDATE Fall22_S004_3_Vehicle
SET Availability = 'Not Available', Rate = '45', Condition = 'Used', Model = 'Bi1', Type = 'Bike'
WHERE VehicleID = 'V01';

UPDATE Fall22_S004_3_Vehicle
SET Rate = '50', Type = 'Scooter'
WHERE VehicleID = 'V09';

UPDATE Fall22_S004_3_Vehicle
SET Rate = '55', Type = 'Bike'
WHERE VehicleID = 'V11';

UPDATE Fall22_S004_3_Vehicle
SET Rate = '60', Type = 'Bike'
WHERE VehicleID = 'V12';


--Change in number of bookings 
DELETE FROM Fall22_S004_3_Booking
WHERE BookingID = 'B17';

DELETE FROM Fall22_S004_3_Booking
WHERE BookingID = 'B19';

DELETE FROM Fall22_S004_3_Booking
WHERE BookingID = 'B01';

DELETE FROM Fall22_S004_3_Booking
WHERE BookingID = 'B02';

DELETE FROM Fall22_S004_3_Booking
WHERE BookingID = 'B03';

DELETE FROM Fall22_S004_3_Booking
WHERE UserID = 'B04';


--Penalty changes
UPDATE Fall22_S004_3_Penalty
SET Damage = 'Overdue', PenaltyCharge = '500'
WHERE BookingID = 'B45';

UPDATE Fall22_S004_3_Penalty
SET PenaltyCharge = '800'
WHERE BookingID = 'B35';

UPDATE Fall22_S004_3_Penalty
SET PenaltyCharge = '600'
WHERE BookingID = 'B25';

UPDATE Fall22_S004_3_Penalty
SET PenaltyCharge = '1000'
WHERE BookingID = 'B29';