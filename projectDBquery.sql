/*Retrive customer names, vehicleID and the total gender of the booking transactions (duplicated customer can be counted)*/
SELECT FirstName,LastName,VehicleID,COUNT(Gender) OVER (PARTITION BY Gender) AS GendersTotal
FROM Fall22_S004_3_Booking b JOIN Fall22_S004_3_User u ON b.UserID = u.UserID;

/*Retrive top 5 max penalty charges and customer's name that causes that damage*/
SELECT FirstName,LastName,PenaltyCharge
FROM (Fall22_S004_3_Penalty  NATURAL JOIN Fall22_S004_3_Booking)
    NATURAL JOIN  Fall22_S004_3_User
ORDER BY PenaltyCharge DESC
FETCH NEXT 5 ROWS ONLY;


--Total number of bookings based on vehicle type and vehicle model using ROLLUP
SELECT v.Type AS VEHICLE_TYPE, v.Model AS VEHICLE_MODEL, COUNT(b.BookingID) AS BOOKING_COUNT
FROM Fall22_S004_3_Vehicle v
JOIN
Fall22_S004_3_Booking b ON v.VehicleID= b.VehicleID
GROUP BY ROLLUP(v.Type, v.Model)
ORDER BY v.Type, v.Model;

 --Number of Bookings per user
SELECT u.UserID, u.FirstName, u.LastName, r.BOOKINGS_PER_USER
FROM Fall22_S004_3_User u  
JOIN
(SELECT b.UserID, COUNT(b.BookingID) AS BOOKINGS_PER_USER
FROM Fall22_S004_3_Booking b GROUP BY b.UserID) r
ON r.UserID = u.UserID ORDER BY r.BOOKINGS_PER_USER DESC;


----- cube/rollup
--Provides the total number of vehicles from each Location, vehicle-type, vehicle-model using CUBE
SELECT l.LocName, v.Type as Vehicle_Type, v.Model as Vehicle_Model, COUNT (l_v.VehicleID) AS Number_Of_Vehicles
FROM Fall22_s004_3_Vehicle v JOIN Fall22_S004_3_Location_Vehicle l_v ON v.VehicleID = l_v.VehicleID 
    NATURAL JOIN Fall22_S004_3_Location l
GROUP BY CUBE (l.LocName, v.Type, v.Model)
ORDER BY l.LocName, v.Type, v.Model;

    
--Retieve the highest revenue from booking table
SELECT BookingID,(ReturnDate-PickupDate) * 
        (SELECT rate 
        FROM Fall22_s004_3_Vehicle v
        WHERE v.VehicleID = b.VehicleID) AS Revenue
FROM Fall22_s004_3_Booking b
ORDER BY Revenue DESC;




