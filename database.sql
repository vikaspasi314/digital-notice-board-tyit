CREATE DATABASE IF NOT EXISTS notice_board_db;
USE notice_board_db;

CREATE TABLE IF NOT EXISTS notices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    posted_date DATE,
    category VARCHAR(100)
);

INSERT INTO notices (title, description, posted_date, category) VALUES
('Exam Schedule Released', 'The TYIT semester exam timetable has been uploaded. Check the department board.', '2026-08-22', 'Exam'),
('Holiday Vacation Time Table', 'The holiday vacation date has been announced. Please check the college noticeboard or the college official for the information. Thank you.', '2026-08-23', 'Vacation');