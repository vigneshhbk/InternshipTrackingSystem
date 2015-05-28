DELIMITER //
DROP PROCEDURE IF EXISTS DisplayDetails; //
CREATE PROCEDURE DisplayDetails(
	IN InternID INT,
    IN StudID INT)
BEGIN
	DECLARE AppliedFlag BIT;
	DECLARE StudentWork_Hours FLOAT;
	SET StudentWork_Hours = (SELECT Work_Hours FROM Student WHERE StudentID = StudID);
    SET AppliedFlag = (SELECT IsPlaced FROM Interest WHERE InternshipID = InternID AND StudentID = StudID);
	SELECT StudentWork_Hours, CASE AppliedFlag WHEN 0 THEN 1 WHEN 1 THEN 1 ELSE 0 END AS IsApplied, i.InternshipID, i.Title, i.Work_Hour, i.Business_Type, TRUNCATE(i.Pay, 2) AS Pay, i.Start_Date, i.End_Date, i.Semester, i.Number_Of_Position, 
	CONCAT(p.First_Name, ' ', p.Last_Name) AS SupervisorName, p.Email, p.Phone_Number, b.Name FROM Internship i 
	INNER JOIN Business b ON i.CompanyID = b.CompanyID
	INNER JOIN Person p ON i.SupervisorID = p.PersonID WHERE i.InternshipID = InternID;
END //
DELIMITER ;