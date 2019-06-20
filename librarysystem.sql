CREATE TABLE librarysystem.book
(
    book_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    book_name varchar(32) NOT NULL,
    book_author varchar(32) NOT NULL,
    book_publisher varchar(32) NOT NULL,
    book_price int(11) NOT NULL,
    book_callnum varchar(32) NOT NULL,
    lib_id int(11) NOT NULL,
    book_state enum('in', 'out', 'order') DEFAULT 'in'
);
CREATE UNIQUE INDEX book_book_id_uindex ON librarysystem.book (book_id);
CREATE UNIQUE INDEX book_book_callnum_uindex ON librarysystem.book (book_callnum);
INSERT INTO librarysystem.book (book_id, book_name, book_author, book_publisher, book_price, book_callnum, lib_id, book_state) VALUES (110, 'swewe', 'dsds', 'vffs', 36, '091828', 1, 'in');
INSERT INTO librarysystem.book (book_id, book_name, book_author, book_publisher, book_price, book_callnum, lib_id, book_state) VALUES (111, 'ccc', 'frf', 'weqw', 34, '087632', 2, 'order');
INSERT INTO librarysystem.book (book_id, book_name, book_author, book_publisher, book_price, book_callnum, lib_id, book_state) VALUES (122, 'swewe', 'dsds', 'vffs', 36, '091829', 1, 'in');
INSERT INTO librarysystem.book (book_id, book_name, book_author, book_publisher, book_price, book_callnum, lib_id, book_state) VALUES (121, 'sunshine', 'hy', 'hij', 40, '067543', 2, 'in');
CREATE TABLE librarysystem.employee
(
    emp_id varchar(32) PRIMARY KEY NOT NULL,
    emp_name varchar(32) NOT NULL,
    emp_gender enum('male', 'female') NOT NULL,
    emp_phone varchar(11) NOT NULL,
    emp_email varchar(32) NOT NULL,
    lib_id int(11) NOT NULL,
    emp_password varchar(32) NOT NULL
);
CREATE UNIQUE INDEX employee_emp_id_uindex ON librarysystem.employee (emp_id);
CREATE UNIQUE INDEX employee_emp_phone_uindex ON librarysystem.employee (emp_phone);
CREATE UNIQUE INDEX employee_emp_email_uindex ON librarysystem.employee (emp_email);
INSERT INTO librarysystem.employee (emp_id, emp_name, emp_gender, emp_phone, emp_email, lib_id, emp_password) VALUES ('A072056', 'bob', 'male', '0903401737', 'heyun@163.com', 1, '123');
INSERT INTO librarysystem.employee (emp_id, emp_name, emp_gender, emp_phone, emp_email, lib_id, emp_password) VALUES ('A072051', 'chen', 'female', '0903192819', 'chen@gmail.com', 2, '123');
CREATE TABLE librarysystem.entry
(
    ent_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    book_id int(11) NOT NULL,
    user_id int(11) NOT NULL,
    borrow_time datetime NOT NULL,
    practical_return_time datetime,
    emp_id int(11) NOT NULL
);
CREATE UNIQUE INDEX entry_ent_id_uindex ON librarysystem.entry (ent_id);
INSERT INTO librarysystem.entry (ent_id, book_id, user_id, borrow_time, practical_return_time, emp_id) VALUES (1, 110, 20164450, '2019-05-01 00:00:00', '2019-06-05 08:00:00', 343);
CREATE TABLE librarysystem.fine
(
    fine_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    ent_id int(11) NOT NULL,
    expected_return_time datetime NOT NULL,
    fine_num int(11) DEFAULT '0',
    fine_unit int(11) DEFAULT '1'
);
CREATE UNIQUE INDEX fine_fine_id_uindex ON librarysystem.fine (fine_id);
CREATE UNIQUE INDEX fine_ent_id_uindex ON librarysystem.fine (ent_id);
INSERT INTO librarysystem.fine (fine_id, ent_id, expected_return_time, fine_num, fine_unit) VALUES (1, 1, '2019-05-31 00:00:00', 5, 1);
CREATE TABLE librarysystem.library
(
    lib_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    lib_name varchar(32) NOT NULL,
    lib_address varchar(32) NOT NULL,
    lib_phone varchar(11) NOT NULL,
    lib_email varchar(32) NOT NULL
);
CREATE UNIQUE INDEX library_lib_id_uindex ON librarysystem.library (lib_id);
CREATE UNIQUE INDEX library_lib_name_uindex ON librarysystem.library (lib_name);
CREATE UNIQUE INDEX library_lib_address_uindex ON librarysystem.library (lib_address);
CREATE UNIQUE INDEX library_lib_phone_uindex ON librarysystem.library (lib_phone);
CREATE UNIQUE INDEX library_lib_email_uindex ON librarysystem.library (lib_email);
INSERT INTO librarysystem.library (lib_id, lib_name, lib_address, lib_phone, lib_email) VALUES (1, 'nthu', 'cdhssas', '009121901', 'cc@gmail.com');
INSERT INTO librarysystem.library (lib_id, lib_name, lib_address, lib_phone, lib_email) VALUES (2, 'nctu', 'rtrtere', '281921948', 'nctu@gmail.com');
CREATE TABLE librarysystem.user
(
    user_id varchar(32) PRIMARY KEY NOT NULL,
    user_name varchar(32) NOT NULL,
    user_department varchar(32) NOT NULL,
    user_gender enum('male', 'female') NOT NULL,
    user_phone varchar(11) NOT NULL,
    user_email varchar(32) NOT NULL,
    user_maxnum int(11) NOT NULL,
    user_maxtime int(11) NOT NULL,
    user_password varchar(32) NOT NULL,
    user_type enum('student', 'teacher')
);
CREATE UNIQUE INDEX student_stu_id_uindex ON librarysystem.user (user_id);
CREATE UNIQUE INDEX student_stu_phone_uindex ON librarysystem.user (user_phone);
CREATE UNIQUE INDEX student_stu_email_uindex ON librarysystem.user (user_email);
INSERT INTO librarysystem.user (user_id, user_name, user_department, user_gender, user_phone, user_email, user_maxnum, user_maxtime, user_password, user_type) VALUES ('20164450', 'cyprus', 'cs', 'male', '123456789', 'heyuncc@163.com', 10, 30, '666', 'student');
INSERT INTO librarysystem.user (user_id, user_name, user_department, user_gender, user_phone, user_email, user_maxnum, user_maxtime, user_password, user_type) VALUES ('X1072137', 'heyun', 'ee', 'male', '0903401727', 'heyun@gmail.com', 20, 60, '123', 'teacher');