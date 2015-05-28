DELIMITER //
DROP PROCEDURE IF EXISTS ApplyInternship; //
CREATE PROCEDURE ApplyInternship(
	IN StudID INT,
	IN InternID INT)
BEGIN
	INSERT INTO Interest(StudentID, InternshipID, IsPlaced) VALUES(StudID, InternID, 0);
END //
DELIMITER ;