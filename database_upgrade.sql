
USE merikebu_portfolio;

CREATE TABLE IF NOT EXISTS certificates (
 id INT AUTO_INCREMENT PRIMARY KEY,
 title VARCHAR(180) NOT NULL,
 issuer VARCHAR(180) NOT NULL,
 category VARCHAR(100) NOT NULL DEFAULT 'Training',
 description TEXT NOT NULL,
 skills_gained TEXT NOT NULL,
 issue_date VARCHAR(80) DEFAULT '',
 credential_url VARCHAR(500) DEFAULT '',
 certificate_file VARCHAR(255) DEFAULT '',
 sort_order INT NOT NULL DEFAULT 0,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS blog_posts (
 id INT AUTO_INCREMENT PRIMARY KEY,
 title VARCHAR(220) NOT NULL,
 slug VARCHAR(240) NOT NULL UNIQUE,
 excerpt TEXT NOT NULL,
 content LONGTEXT NOT NULL,
 category VARCHAR(100) NOT NULL DEFAULT 'Technology',
 cover_image VARCHAR(255) DEFAULT '',
 published TINYINT(1) NOT NULL DEFAULT 1,
 published_at DATETIME DEFAULT CURRENT_TIMESTAMP,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS experiences (
 id INT AUTO_INCREMENT PRIMARY KEY,
 role VARCHAR(180) NOT NULL,
 organization VARCHAR(180) NOT NULL,
 period VARCHAR(100) NOT NULL,
 description TEXT NOT NULL,
 highlights TEXT NOT NULL,
 sort_order INT NOT NULL DEFAULT 0
);
CREATE TABLE IF NOT EXISTS achievements (
 id INT AUTO_INCREMENT PRIMARY KEY,
 label VARCHAR(120) NOT NULL,
 value VARCHAR(40) NOT NULL,
 description VARCHAR(255) NOT NULL,
 sort_order INT NOT NULL DEFAULT 0
);

INSERT INTO certificates(title,issuer,category,description,skills_gained,issue_date,credential_url,sort_order)
SELECT 'Bachelor of Science in Information Technology','Ambo University','Education','Undergraduate study covering software development, programming, database systems, computer networks and information technology.','Software development; programming; database systems; computer networks','In progress','https://ambou.edu.et/',1
WHERE NOT EXISTS (SELECT 1 FROM certificates WHERE title='Bachelor of Science in Information Technology');
INSERT INTO certificates(title,issuer,category,description,skills_gained,issue_date,credential_url,sort_order)
SELECT 'Full Stack Web Development Training','Evangadi Tech','Training','Practical full-stack web development learning focused on building responsive web applications and understanding front-end and back-end development.','HTML; CSS; JavaScript; React; backend development; deployment','Training program','',2
WHERE NOT EXISTS (SELECT 1 FROM certificates WHERE title='Full Stack Web Development Training');
INSERT INTO certificates(title,issuer,category,description,skills_gained,issue_date,credential_url,sort_order)
SELECT 'Cloud Computing Fundamentals','Google Cloud Skills Boost','Training','Learning pathway covering cloud infrastructure, cloud concepts and modern cloud technologies.','Cloud infrastructure; cloud computing; AI and cloud technologies','Training program','https://www.cloudskillsboost.google/',3
WHERE NOT EXISTS (SELECT 1 FROM certificates WHERE title='Cloud Computing Fundamentals');
INSERT INTO certificates(title,issuer,category,description,skills_gained,issue_date,credential_url,sort_order)
SELECT 'Artificial Intelligence & AI Tools','AI Training','Training','Learning about artificial intelligence tools and practical ways to use AI to support productivity and content creation.','Prompt engineering; AI productivity; AI content creation','Training program','',4
WHERE NOT EXISTS (SELECT 1 FROM certificates WHERE title='Artificial Intelligence & AI Tools');
INSERT INTO certificates(title,issuer,category,description,skills_gained,issue_date,credential_url,sort_order)
SELECT 'Cyber Security Fundamentals','Cyber Security Training','Training','Foundational learning in security concepts, networks and digital protection.','Security concepts; networks; digital protection','Training program','',5
WHERE NOT EXISTS (SELECT 1 FROM certificates WHERE title='Cyber Security Fundamentals');
INSERT INTO certificates(title,issuer,category,description,skills_gained,issue_date,credential_url,sort_order)
SELECT 'Web Development Hackathon Achievement','Hackathon Achievement','Achievement','Participation and achievement in a web development competition focused on problem solving, teamwork and innovative software development.','Problem solving; teamwork; software innovation','Achievement','',6
WHERE NOT EXISTS (SELECT 1 FROM certificates WHERE title='Web Development Hackathon Achievement');

INSERT INTO blog_posts(title,slug,excerpt,content,category,published) SELECT
'How I Started My Programming Journey','my-programming-journey','My journey from a rural community to Information Technology, learning programming and building software solutions.',
'Every developer starts somewhere. My journey began with curiosity about how technology can solve everyday problems. As I learned more about Information Technology, I began exploring programming, databases and web development.

I continue to learn by building projects, practicing new concepts and sharing what I discover. My goal is to create useful digital solutions and encourage other learners to keep moving forward.','Personal Journey',1
WHERE NOT EXISTS (SELECT 1 FROM blog_posts WHERE slug='my-programming-journey');
INSERT INTO blog_posts(title,slug,excerpt,content,category,published) SELECT
'How To Build A Portfolio Website','build-a-portfolio-website','A practical introduction to building a professional portfolio with HTML, CSS, JavaScript and modern web technologies.',
'A portfolio website presents your skills, projects and professional story. Start by planning clear sections: Home, About, Skills, Projects, Experience and Contact.

Use semantic HTML for structure, CSS or Bootstrap for responsive layouts, and JavaScript for useful interactions. Add real project descriptions, working repository links and a contact form. Test the website on mobile and desktop before publishing.','Web Development',1
WHERE NOT EXISTS (SELECT 1 FROM blog_posts WHERE slug='build-a-portfolio-website');
INSERT INTO blog_posts(title,slug,excerpt,content,category,published) SELECT
'Artificial Intelligence For Students','artificial-intelligence-for-students','Understanding AI tools, automation and how students can use artificial intelligence for learning and productivity.',
'Artificial intelligence tools can help students brainstorm, organize research, practice concepts and explore unfamiliar topics. They should support learning rather than replace independent thinking.

Always verify important information, respect academic integrity and protect private data. Learning how to ask clear questions and evaluate AI-generated answers is an important digital skill.','Artificial Intelligence',1
WHERE NOT EXISTS (SELECT 1 FROM blog_posts WHERE slug='artificial-intelligence-for-students');
INSERT INTO blog_posts(title,slug,excerpt,content,category,published) SELECT
'Database Design Fundamentals','database-design-fundamentals','An introduction to database concepts, SQL, data management and reliable application design.',
'Databases store information in a structured way so applications can retrieve and update it reliably. Relational database design begins with identifying entities, attributes and relationships.

Use primary keys to identify records, foreign keys to connect related tables, and constraints to protect data quality. Learn SQL queries, prepared statements and regular backups as part of responsible database development.','Programming',1
WHERE NOT EXISTS (SELECT 1 FROM blog_posts WHERE slug='database-design-fundamentals');
INSERT INTO blog_posts(title,slug,excerpt,content,category,published) SELECT
'Responsive Web Design','responsive-web-design','How to create websites that work smoothly on computers, tablets and mobile devices.',
'Responsive web design adapts a layout to different screen sizes. Start with flexible containers, responsive images and a mobile-friendly navigation system.

CSS media queries and Bootstrap breakpoints help adjust columns, spacing and typography. Test real pages at multiple viewport widths and make sure buttons and forms are comfortable to use on touch screens.','Web Development',1
WHERE NOT EXISTS (SELECT 1 FROM blog_posts WHERE slug='responsive-web-design');
INSERT INTO blog_posts(title,slug,excerpt,content,category,published) SELECT
'Technology And Entrepreneurship','technology-and-entrepreneurship','Using innovation and technology to create opportunities and solve community problems.',
'Technology entrepreneurship begins with understanding a real problem and the people experiencing it. A useful digital product should be accessible, reliable and designed around user needs.

Start small: talk to potential users, build a simple prototype, test it and improve it using feedback. Consistent learning and collaboration help turn an idea into a valuable solution.','Digital Innovation',1
WHERE NOT EXISTS (SELECT 1 FROM blog_posts WHERE slug='technology-and-entrepreneurship');

INSERT INTO experiences(role,organization,period,description,highlights,sort_order)
SELECT 'Founder','Merinova WebTech','2026 – Present','Building a technology brand focused on websites, software solutions, AI systems and digital services.','Website development; AI solutions; digital innovation; technology training',1
WHERE NOT EXISTS (SELECT 1 FROM experiences WHERE role='Founder' AND organization='Merinova WebTech');
INSERT INTO experiences(role,organization,period,description,highlights,sort_order)
SELECT 'Information Technology Student','Ambo University','Third-Year Student','Bachelor of Science studies developing knowledge in software engineering, databases, networking, programming and information technology.','Software development; programming; database systems; computer networks','2'
WHERE NOT EXISTS (SELECT 1 FROM experiences WHERE role='Information Technology Student' AND organization='Ambo University');
INSERT INTO experiences(role,organization,period,description,highlights,sort_order)
SELECT 'Full Stack Developer Training','Evangadi Tech','Training Program','Practical full-stack web development training focused on responsive applications and front-end and back-end technologies.','HTML; CSS; JavaScript; React; backend development',3
WHERE NOT EXISTS (SELECT 1 FROM experiences WHERE role='Full Stack Developer Training' AND organization='Evangadi Tech');
INSERT INTO experiences(role,organization,period,description,highlights,sort_order)
SELECT 'Freelance Developer','Web & Digital Solutions','Project-based','Working on website concepts, digital designs, content solutions and technology services.','Portfolio websites; business websites; UI design; digital content',4
WHERE NOT EXISTS (SELECT 1 FROM experiences WHERE role='Freelance Developer' AND organization='Web & Digital Solutions');
INSERT INTO experiences(role,organization,period,description,highlights,sort_order)
SELECT 'Community & Leadership','Technology Education','Ongoing','Sharing knowledge, supporting students and promoting technology education.','Mentoring; content creation; technology awareness',5
WHERE NOT EXISTS (SELECT 1 FROM experiences WHERE role='Community & Leadership' AND organization='Technology Education');

INSERT INTO achievements(label,value,description,sort_order) SELECT 'Projects','5+','Personal and academic software projects',1 WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE label='Projects');
INSERT INTO achievements(label,value,description,sort_order) SELECT 'Certificates & Training','5+','Learning programs and professional development',2 WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE label='Certificates & Training');
INSERT INTO achievements(label,value,description,sort_order) SELECT 'Technology Areas','5+','Web, mobile, backend, databases and AI',3 WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE label='Technology Areas');
INSERT INTO achievements(label,value,description,sort_order) SELECT 'Continuous Learning','10+','A commitment to ongoing growth and practice',4 WHERE NOT EXISTS (SELECT 1 FROM achievements WHERE label='Continuous Learning');
