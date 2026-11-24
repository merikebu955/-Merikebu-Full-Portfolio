CREATE DATABASE IF NOT EXISTS merikebu_portfolio CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE merikebu_portfolio;
CREATE TABLE IF NOT EXISTS users(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100) NOT NULL,email VARCHAR(190) NOT NULL UNIQUE,password_hash VARCHAR(255) NOT NULL,role ENUM('user','admin') NOT NULL DEFAULT 'user',created_at DATETIME NOT NULL);
CREATE TABLE IF NOT EXISTS projects(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(180) NOT NULL,description TEXT NOT NULL,technologies VARCHAR(255) NOT NULL,project_url VARCHAR(500) DEFAULT '',image VARCHAR(255) DEFAULT '',is_published TINYINT(1) NOT NULL DEFAULT 1,sort_order INT NOT NULL DEFAULT 0);
CREATE TABLE IF NOT EXISTS skills(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100) NOT NULL,category VARCHAR(100) NOT NULL,level TINYINT UNSIGNED NOT NULL DEFAULT 70,sort_order INT NOT NULL DEFAULT 0);
CREATE TABLE IF NOT EXISTS services(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(150) NOT NULL,description TEXT NOT NULL,icon VARCHAR(120) NOT NULL DEFAULT 'fa-solid fa-code',is_active TINYINT(1) NOT NULL DEFAULT 1,sort_order INT NOT NULL DEFAULT 0);
CREATE TABLE IF NOT EXISTS messages(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100) NOT NULL,email VARCHAR(190) NOT NULL,subject VARCHAR(180) NOT NULL,message TEXT NOT NULL,created_at DATETIME NOT NULL);
CREATE TABLE IF NOT EXISTS settings(id INT AUTO_INCREMENT PRIMARY KEY,setting_key VARCHAR(100) NOT NULL UNIQUE,setting_value TEXT NOT NULL);
INSERT IGNORE INTO settings(setting_key,setting_value) VALUES('site_name','Merikebu Gashu Mengesha');
INSERT INTO skills(name,category,level,sort_order) VALUES
('HTML5 & CSS3','Frontend',90,1),('JavaScript','Frontend',82,2),('Bootstrap 5','Frontend',88,3),('React','Frontend',75,4),
('PHP','Backend',85,5),('Node.js','Backend',72,6),('MySQL','Database',85,7),('MongoDB','Database',70,8),
('Flutter & Dart','Mobile',78,9),('Java & Kotlin','Mobile',65,10),('REST APIs','Backend',78,11),('Git & GitHub','Tools',75,12);
INSERT INTO services(title,description,icon,sort_order) VALUES
('Web Development','Responsive, accessible websites and full-stack web applications built around your needs.','fa-solid fa-code',1),
('Mobile App Development','Cross-platform mobile application development with Flutter and Dart.','fa-solid fa-mobile-screen-button',2),
('Backend & API Development','PHP, Node.js, MySQL and REST API development with secure data handling.','fa-solid fa-database',3);
INSERT INTO projects(title,description,technologies,project_url,image,is_published,sort_order) VALUES
('AU Performance360 / UniPulse','Academic and administrative performance evaluation system concept for Ambo University.','PHP, MySQL, Bootstrap, JavaScript','','',1,1),
('MerinovaWebTech Academy','Learning management system concept with student, instructor and administrator experiences.','PHP, MySQL, Bootstrap','','',1,2),
('Online Bookshop Website','E-commerce platform for books with user authentication, shopping cart and order management.','PHP, MySQL, JavaScript, Bootstrap','','',1,3),
('Face Web Attendance','Attendance tracking concept using facial recognition with a PHP/MySQL dashboard.','Python, PHP, MySQL, JavaScript','','',1,4);
