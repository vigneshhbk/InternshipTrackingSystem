DELIMITER //
DROP PROCEDURE IF EXISTS DisplayApplications; //
CREATE PROCEDURE DisplayApplications(
	IN StudID INT)
BEGIN
	SELECT i.InternshipID AS InternshipID, intern.Title AS Title, b.Name AS CompanyName, 
    CASE i.IsPlaced WHEN 1 THEN 'Placed' ELSE 'Under Review' END AS Status FROM Interest i INNER JOIN Internship intern ON i.InternshipID = intern.InternshipID
    INNER JOIN Business b ON intern.CompanyID = b.CompanyID WHERE i.StudentID = StudID;
END //
DELIMITER ;