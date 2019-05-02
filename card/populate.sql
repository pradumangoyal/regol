use regol;

INSERT INTO department values ('Mathematics', 'Near gate 7', '9416152030');
INSERT INTO department values ('ICC', 'ECE Circle', '9416156030');
INSERT INTO department values ('Mechanical', 'Near Ravindra bhawan', '9416152130');

INSERT INTO course values (1, 'Mathematics', 'IMSc. Maths', 'MSM', '5');
INSERT INTO course values (2, 'ICC', 'MSc', 'Network Engineering', '5');
INSERT INTO course values (3, 'Mechanical', 'BTech', 'Mechanical Engineering', '4');

INSERT INTO personal_info (person_id, name, date_of_birth, gender, category) values (1, 'Praduman', DATE('06-11-1999'), 'Male', 'Gen');
INSERT INTO personal_info (person_id, name, date_of_birth, gender, category) values (2, 'Vikas', DATE('13-1-1974'), 'Male', 'Gen');
INSERT INTO personal_info (person_id, name, date_of_birth, gender, category) values (3, 'Madhu', DATE('06-11-1973'), 'Female', 'Gen');