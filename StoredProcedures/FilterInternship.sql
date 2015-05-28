DELIMITER //
DROP PROCEDURE IF EXISTS FilterInternship; //
CREATE PROCEDURE FilterInternship(
	IN SearchText VARCHAR(20),
	IN SearchCriteria VARCHAR(20))
BEGIN
	SET @dynamicQuery = NULL;
    IF SearchText IS NOT NULL THEN
		SET @dynamicQuery = CONCAT('SELECT i.InternshipID, i.Title, b.Name FROM Internship i INNER JOIN Business b ON i.CompanyID = 
		b.CompanyID WHERE ', SearchCriteria, ' LIKE \'', SearchText, '\'');
	ELSE
		SET @dynamicQuery = CONCAT('SELECT i.InternshipID, i.Title, b.Name FROM Internship i INNER JOIN Business b ON i.CompanyID = 
		b.CompanyID');
	END IF;
    
    PREPARE stmt FROM @dynamicQuery;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END //
DELIMITER ;