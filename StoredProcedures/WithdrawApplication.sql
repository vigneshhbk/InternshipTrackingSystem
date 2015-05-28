DELIMITER //
DROP PROCEDURE IF EXISTS WithdrawApplication; //
CREATE PROCEDURE WithdrawApplication(
	IN StudID INT,
    IN InternID INT)
BEGIN
	DELETE FROM Interest WHERE StudentID = StudID AND InternshipID = InternID;
END //
DELIMITER ;