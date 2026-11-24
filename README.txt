MERIKEBU GASHU - FULL PHP/MYSQL PORTFOLIO
========================================

REQUIREMENTS
- Windows 10/11
- XAMPP with Apache, MySQL and PHP 8+
- Web browser

INSTALLATION
1. Extract the ZIP file.
2. Copy the folder "Merikebu_Full_Portfolio" into C:\xampp\htdocs\
3. Open XAMPP Control Panel and start Apache and MySQL.
4. Open http://localhost/phpmyadmin
5. Choose Import, select database.sql from this project, then click Import/Go.
6. Open config/config.php. Default XAMPP settings are:
   DB_HOST=localhost, DB_NAME=merikebu_portfolio, DB_USER=root, DB_PASS=''
   BASE_URL='/Merikebu_Full_Portfolio'
7. Visit http://localhost/Merikebu_Full_Portfolio/setup_admin.php ONCE.
8. The first admin account is:
   Email: admin@merikebu.local
   Password: ChangeMe@12345
9. Immediately delete setup_admin.php from the project folder after it creates the admin.
10. Open http://localhost/Merikebu_Full_Portfolio/admin/login.php

PUBLIC WEBSITE
http://localhost/Merikebu_Full_Portfolio/

USER REGISTRATION / LOGIN
http://localhost/Merikebu_Full_Portfolio/auth/register.php
http://localhost/Merikebu_Full_Portfolio/auth/login.php

ADMIN
http://localhost/Merikebu_Full_Portfolio/admin/login.php

FEATURES
- Responsive Bootstrap portfolio
- Real profile photos included
- Dark/light theme and typing headline
- Skills, services and project content loaded from MySQL
- Contact form stores messages in database
- User registration, login, logout and member dashboard
- Admin dashboard with counts
- Admin can add and delete projects, skills and services
- Admin can view/delete registered users and contact messages
- Password hashing, prepared statements, session regeneration and CSRF tokens

IMPORTANT
- The CV file supplied in the conversation identifies a different person. It is NOT included or linked as your CV.
- Add your own verified CV as assets/uploads/merikebu-cv.pdf and then create a download link if you want it published.
- Replace the sample contact email with your correct email if needed.
- For production hosting, change database credentials, force HTTPS, disable setup scripts, and add rate limiting/backups.
- The project uses CDN links for Bootstrap, Font Awesome and Google Fonts, so internet access is needed for those visual assets.

Dedicated contact page: http://localhost/Merikebu_Full_Portfolio/contact-page.php

About page: http://localhost/Merikebu_Full_Portfolio/about.php
Contact email: merikebgashu@gmail.com


PORTFOLIO CONTENT UPGRADE
1. Import database_upgrade.sql in phpMyAdmin into the existing merikebu_portfolio database.
2. Open the website and use the new menu links: Projects, Skills, Certificates, Blog and Journey.
3. Admin dashboard now includes management tabs for certificates, blog posts, experiences and achievements.
4. Set each project's project_url to its exact GitHub repository URL in Admin > Projects. Until then, the project button opens your GitHub profile.
5. For the CV download, place your actual PDF at assets/files/Merikebu_Gashu_CV.pdf. Do not use a placeholder CV.
6. Ambo University link opens https://ambou.edu.et/.


OPTIONAL AI & IDENTITY FEATURES
See features/README_FEATURES.txt for installation and security notes.
