use regol;

INSERT INTO `regol`.`department` VALUES ('Mathematics', 'Department of Mathematics, IIT Roorkee', '9887331321');
INSERT INTO `regol`.`department` VALUES ('Computer Science', 'Electronics and Computer Department, IIT Roorkee', '9143234566');
INSERT INTO `regol`.`course` VALUES (1, 'Mathematics', 'Integrated MSc', 'Applied Mathematics', 5);
INSERT INTO `regol`.`course` VALUES (2, 'Computer Science', 'Bachelor of Technology', 'Computer Science and Engineering', 4);
INSERT INTO `regol`.`batch` VALUES (1, 14, 2022);
INSERT INTO `regol`.`batch` VALUES (2, 38, 2021);
INSERT INTO `regol`.`person` VALUES (1);       
INSERT INTO `regol`.`person` VALUES (2);       
INSERT INTO `regol`.`person` VALUES (3);       
INSERT INTO `regol`.`person` VALUES (4);       
INSERT INTO `regol`.`person` VALUES (5);       
INSERT INTO `regol`.`person` VALUES (6);       
INSERT INTO `regol`.`student` (person_id, enrollment_no, bhawan_name, room_number, course_id, batch_id) VALUES (1, 17312014, 'RJB', 'AF-046', 1, 2);
INSERT INTO `regol`.`student` (person_id, enrollment_no, bhawan_name, room_number, course_id, batch_id) VALUES (4, 17313030, 'RJB', 'BF-105', 2, 1);      
INSERT INTO `regol`.`personal_info` (person_id, name) VALUES (1, 'Varun Sharma');
INSERT INTO `regol`.`personal_info` (person_id, name) VALUES (2, 'Hans Raj Sharma');
INSERT INTO `regol`.`personal_info` (person_id, name) VALUES (3, 'Jyoti Sharma');
INSERT INTO `regol`.`personal_info` (person_id, name) VALUES (4, 'Rohan Kapoor');
INSERT INTO `regol`.`personal_info` (person_id, name) VALUES (5, 'Pawan Kapoor');
INSERT INTO `regol`.`personal_info` (person_id, name) VALUES (6, 'Anita Kapoor');
INSERT INTO `regol`.`secret_keys` VALUES (17312014, 'xFsfe882');
INSERT INTO `regol`.`secret_keys` VALUES (17313030, 'tBsqr134');
INSERT INTO `regol`.`verified` (enrollment_no) VALUES (17312014);
INSERT INTO `regol`.`verified` (enrollment_no) VALUES (17313030);
INSERT INTO `regol`.`parent_child` VALUES (2, 1);
INSERT INTO `regol`.`parent_child` VALUES (3, 1);
INSERT INTO `regol`.`parent_child` VALUES (5, 4);
INSERT INTO `regol`.`parent_child` VALUES (6, 4);
