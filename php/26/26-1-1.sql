SELECT `studentId`, `studentName`, `studentGender`
FROM `students` 
WHERE `studentGender` = "男"

SELECT `studentId`, `studentName`, `studentGender`,`studentBirthday`,`studentPhoneNumber`
FROM `students` 
WHERE `studentBirthday` = "1983-10-02"

SELECT `studentId`, `studentName`, `studentGender`,`studentBirthday`,`studentPhoneNumber`
FROM `students` 
ORDER BY `studentBirthday` ASC
