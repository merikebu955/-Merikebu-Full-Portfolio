<?php
require_once __DIR__ . '/config/functions.php';

$pageTitle = 'My Professional Journey';
$items = [];
$stats = [];

try {
    $items = $pdo->query("SELECT * FROM experiences ORDER BY sort_order, id")->fetchAll();
} catch (Throwable $e) {
    $items = [];
}
try {
    $stats = $pdo->query("SELECT * FROM achievements ORDER BY sort_order, id")->fetchAll();
} catch (Throwable $e) {
    $stats = [];
}

include __DIR__ . '/includes/header.php';
?>

<section class="inner-hero journey-hero">
    <div class="container">
        <span class="eyebrow">LEARNING · DEVELOPMENT · INNOVATION</span>
        <h1>My Professional <b>Journey</b></h1>
        <p class="journey-lead">From learning technology to building solutions, from overcoming challenges to creating opportunities.</p>
        <p class="journey-intro">I am Merikebu Gashu Mengesha, an Information Technology student at Ambo University, an aspiring Full-Stack Developer, AI Engineer, and technology entrepreneur. I am committed to using technology to solve real-world problems, create meaningful digital solutions, and make knowledge more accessible.</p>
        <div class="d-flex flex-wrap gap-2 mt-4">
            <a class="btn btn-accent" href="<?= BASE_URL ?>/projects.php">Explore my projects <i class="fa-solid fa-arrow-right ms-2"></i></a>
            <a class="btn btn-outline-light" href="<?= BASE_URL ?>/contact-page.php">Connect with me</a>
        </div>
    </div>
</section>

<section class="section journey-section">
    <div class="container">
        <div class="journey-heading">
            <span class="eyebrow">01 · EDUCATION</span>
            <h2>My Educational Foundation</h2>
            <p>Education is the foundation of my professional development. At Ambo University, I am pursuing a Bachelor's degree in Information Technology and strengthening my understanding of computing and digital systems.</p>
        </div>
        <div class="journey-feature">
            <div class="journey-icon"><i class="fa-solid fa-graduation-cap"></i></div>
            <div>
                <h3>Information Technology Student</h3>
                <h4>Ambo University</h4>
                <p>My academic learning includes programming, database management, computer networks, web technologies, information systems, object-oriented programming, and software engineering principles. I complement classroom learning with independent practice, personal projects, and continuous research.</p>
                <p class="mb-0"><strong>My approach:</strong> Theoretical knowledge builds understanding; practical experience turns knowledge into working solutions.</p>
            </div>
        </div>
    </div>
</section>

<section class="section journey-section journey-soft">
    <div class="container">
        <div class="journey-heading">
            <span class="eyebrow">02 · SOFTWARE DEVELOPMENT</span>
            <h2>From Learning to Building</h2>
            <p>I enjoy transforming ideas into functional digital products, designing user-friendly interfaces, developing application logic, and connecting technologies to create complete solutions.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4"><article class="journey-card"><div class="journey-icon"><i class="fa-solid fa-display"></i></div><h3>Frontend Development</h3><p>HTML5, CSS3, JavaScript, Bootstrap, React, responsive layouts, and accessible user interfaces.</p></article></div>
            <div class="col-md-6 col-lg-4"><article class="journey-card"><div class="journey-icon"><i class="fa-solid fa-code"></i></div><h3>Backend Development</h3><p>PHP, Node.js, Express.js, C#, ASP.NET, server-side programming, and REST API concepts.</p></article></div>
            <div class="col-md-6 col-lg-4"><article class="journey-card"><div class="journey-icon"><i class="fa-solid fa-database"></i></div><h3>Database Development</h3><p>MySQL, phpMyAdmin, Microsoft SQL Server, relational database design, and SQL queries.</p></article></div>
            <div class="col-md-6 col-lg-4"><article class="journey-card"><div class="journey-icon"><i class="fa-solid fa-layer-group"></i></div><h3>Full-Stack Applications</h3><p>Frontend and backend integration, authentication, admin dashboards, form processing, and database-driven applications.</p></article></div>
            <div class="col-md-6 col-lg-4"><article class="journey-card"><div class="journey-icon"><i class="fa-solid fa-pen-ruler"></i></div><h3>UI/UX Design</h3><p>Clean layouts, consistent visual systems, responsive experiences, and user-centered design.</p></article></div>
            <div class="col-md-6 col-lg-4"><article class="journey-card"><div class="journey-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div><h3>Development Tools</h3><p>Visual Studio Code, Git, GitHub, XAMPP, Postman, Vercel, and Netlify.</p></article></div>
        </div>
        <p class="journey-note mt-4">My goal is to become a skilled Full-Stack Developer who can design, develop, test, deploy, and maintain secure, reliable, and accessible software applications.</p>
    </div>
</section>

<section class="section journey-section">
    <div class="container">
        <div class="journey-heading">
            <span class="eyebrow">03 · ARTIFICIAL INTELLIGENCE</span>
            <h2>Exploring Intelligent Technology</h2>
            <p>I am expanding my knowledge of Artificial Intelligence and exploring how intelligent systems can improve education, accessibility, productivity, and business operations.</p>
        </div>
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-7">
                <div class="journey-feature h-100">
                    <div class="journey-icon"><i class="fa-solid fa-brain"></i></div>
                    <div>
                        <h3>My AI Interests</h3>
                        <ul class="journey-list">
                            <li>AI-powered chatbots and virtual assistants</li>
                            <li>Large Language Model (LLM) integration</li>
                            <li>Intelligent learning platforms and educational assistants</li>
                            <li>Automation and smart information systems</li>
                            <li>AI integration with web applications</li>
                            <li>Responsible and useful AI-powered services</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="journey-card journey-blue-card h-100">
                    <div class="journey-icon"><i class="fa-solid fa-lightbulb"></i></div>
                    <h3>My Direction</h3>
                    <p>My long-term ambition is to develop advanced expertise in Artificial Intelligence and become an AI Engineer who builds practical, responsible, and impactful intelligent systems.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section journey-section journey-soft">
    <div class="container">
        <div class="journey-heading">
            <span class="eyebrow">04 · MILESTONES</span>
            <h2>Innovation, Achievements and Growth</h2>
            <p>Learning opportunities and innovation activities have helped me build confidence, strengthen my problem-solving skills, and connect technical knowledge with practical challenges.</p>
        </div>
        <div class="journey-timeline">
            <article class="journey-timeline-item">
                <span class="journey-year">2024</span>
                <div><h3>First-Ever Ambo University Web Development Hackathon</h3><span class="journey-award">1st Place · 24-hour challenge</span><p>I achieved first place in a 24-hour web development challenge. The experience strengthened my ability to work under time pressure, collaborate, solve problems, and turn ideas into a working digital solution.</p></div>
            </article>
            <article class="journey-timeline-item">
                <span class="journey-year">2025</span>
                <div><h3>Ambo University Incubation Program</h3><span class="journey-award">Selected Innovator · STI HUB</span><p>I was selected through Ambo University's STI HUB incubation initiative, focusing on e-learning platform innovation. This experience encouraged me to explore educational technology and the entrepreneurial side of software development.</p></div>
            </article>
            <article class="journey-timeline-item">
                <span class="journey-year">Training</span>
                <div><h3>Evangadi – AI-Powered Full-Stack Application Development</h3><p>I participated in training focused on AI-powered application development and full-stack technologies, broadening my understanding of modern application development.</p></div>
            </article>
            <article class="journey-timeline-item">
                <span class="journey-year">Ongoing</span>
                <div><h3>Continuous Professional Development</h3><p>I continue to learn through independent practice, online training, technical communities, programming exercises, and personal projects.</p></div>
            </article>
        </div>
        <?php if (!empty($items)): ?>
            <div class="journey-heading mt-5">
                <span class="eyebrow">ADDITIONAL EXPERIENCE</span>
                <h2>More Learning and Experience</h2>
            </div>
            <div class="journey-timeline">
                <?php foreach ($items as $item): ?>
                    <article class="journey-timeline-item">
                        <span class="journey-year"><?= e($item['period'] ?? '') ?></span>
                        <div>
                            <h3><?= e($item['role'] ?? '') ?></h3>
                            <h4><?= e($item['organization'] ?? '') ?></h4>
                            <p><?= e($item['description'] ?? '') ?></p>
                            <?php if (!empty($item['highlights'])): ?>
                                <div class="d-flex flex-wrap gap-2"><?php foreach (explode(';', $item['highlights']) as $tag): ?><span class="tag-pill"><?= e(trim($tag)) ?></span><?php endforeach; ?></div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="section journey-section">
    <div class="container">
        <div class="journey-heading">
            <span class="eyebrow">05 · ENTREPRENEURSHIP</span>
            <h2>My Entrepreneurial Journey – Merinova TechVerse</h2>
            <p>My interest in technology extends beyond software development into entrepreneurship and innovation. I want to create digital products and services that support individuals, businesses, educational institutions, and communities.</p>
        </div>
        <div class="journey-brand">
            <span class="journey-brand-mark">M</span>
            <div><h3>Merinova TechVerse</h3><strong>Learn. Build. Innovate. Succeed.</strong></div>
        </div>
        <div class="row g-3 mt-3">
            <div class="col-md-6 col-lg-4"><article class="journey-card"><h3>Web Development</h3><p>Modern websites, business platforms, personal portfolios, and database-driven web applications.</p></article></div>
            <div class="col-md-6 col-lg-4"><article class="journey-card"><h3>Educational Technology</h3><p>Learning management systems, online learning platforms, student portals, and digital resources.</p></article></div>
            <div class="col-md-6 col-lg-4"><article class="journey-card"><h3>AI-Powered Solutions</h3><p>Intelligent applications, AI assistants, automation tools, and smart digital services.</p></article></div>
            <div class="col-md-6 col-lg-4"><article class="journey-card"><h3>Digital Creativity</h3><p>Graphic design, visual identity, and creative digital experiences.</p></article></div>
            <div class="col-md-6 col-lg-4"><article class="journey-card"><h3>Technology Education</h3><p>Programming knowledge, educational content, and support for beginner developers.</p></article></div>
            <div class="col-md-6 col-lg-4"><article class="journey-card"><h3>Digital Transformation</h3><p>Helping organizations explore digital tools and improve their services and workflows.</p></article></div>
        </div>
        <p class="journey-note mt-4">My vision is to grow Merinova TechVerse into a trusted technology brand that empowers people and organizations to learn, build, innovate, and succeed.</p>
    </div>
</section>

<section class="section journey-section journey-soft">
    <div class="container">
        <div class="journey-heading">
            <span class="eyebrow">06 · COMMUNITY</span>
            <h2>Knowledge Sharing and Community Impact</h2>
            <p>I believe knowledge becomes more valuable when it is shared. As I develop my own skills, I want to encourage other young people to explore technology, learn programming, and build confidence through practice.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-7"><div class="journey-card h-100"><h3>How I Hope to Contribute</h3><ul class="journey-list"><li>Share programming tutorials and technology lessons.</li><li>Create educational content for beginner developers.</li><li>Support students who are learning web development.</li><li>Promote digital literacy and technology awareness.</li><li>Encourage young people to explore innovation and entrepreneurship.</li><li>Promote accessible and inclusive digital education.</li></ul></div></div>
            <div class="col-lg-5"><div class="journey-quote h-100"><span class="eyebrow">MY PERSONAL MOTTO</span><h3>“Disability Is Not Inability.”</h3><p>Challenges do not determine our potential. Determination, education, creativity, and opportunity can help us pursue meaningful goals.</p></div></div>
        </div>
    </div>
</section>

<section class="section journey-section">
    <div class="container">
        <div class="journey-heading">
            <span class="eyebrow">07 · FUTURE VISION</span>
            <h2>Where I Am Going</h2>
            <p>My professional journey is still evolving. I know that meaningful growth requires patience, dedication, continuous learning, and the willingness to adapt.</p>
        </div>
        <div class="row g-3">
            <?php
            $goals = [
                ['fa-code', 'Professional Software Developer', 'Build high-quality applications and grow as a capable Full-Stack Developer.'],
                ['fa-brain', 'AI Engineer', 'Develop deeper expertise in artificial intelligence and intelligent application development.'],
                ['fa-rocket', 'Technology Entrepreneur', 'Grow Merinova TechVerse into a sustainable technology business.'],
                ['fa-book-open', 'Educational Innovator', 'Create digital learning solutions that improve access to education.'],
                ['fa-globe', 'Technology Contributor', 'Contribute to meaningful technology projects and digital transformation in Ethiopia.'],
                ['fa-people-group', 'Community Mentor', 'Encourage students and beginner developers through knowledge sharing.']
            ];
            foreach ($goals as $goal): ?>
                <div class="col-md-6 col-lg-4"><article class="journey-card journey-goal"><div class="journey-icon"><i class="fa-solid <?= e($goal[0]) ?>"></i></div><h3><?= e($goal[1]) ?></h3><p><?= e($goal[2]) ?></p></article></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section journey-section journey-soft">
    <div class="container">
        <div class="journey-heading text-center">
            <span class="eyebrow">08 · PROFESSIONAL IDENTITY</span>
            <h2>Merikebu Gashu Mengesha</h2>
            <p class="journey-role">Information Technology Student · Full-Stack Developer · Aspiring AI Engineer · Tech Entrepreneur</p>
            <p>Learn. Build. Innovate. Succeed.</p>
        </div>
        <div class="row g-3">
            <div class="col-6 col-lg-3"><article class="journey-value"><i class="fa-solid fa-book-open"></i><h3>Continuous Learning</h3><p>Growing through knowledge and practice.</p></article></div>
            <div class="col-6 col-lg-3"><article class="journey-value"><i class="fa-solid fa-lightbulb"></i><h3>Innovation</h3><p>Turning ideas into meaningful solutions.</p></article></div>
            <div class="col-6 col-lg-3"><article class="journey-value"><i class="fa-solid fa-people-group"></i><h3>Collaboration</h3><p>Learning and achieving together.</p></article></div>
            <div class="col-6 col-lg-3"><article class="journey-value"><i class="fa-solid fa-heart"></i><h3>Social Impact</h3><p>Using technology to make a difference.</p></article></div>
        </div>
        <div class="journey-final">
            <p>My journey is not defined by where I started, but by what I continue to learn, build, and contribute. Every challenge is an opportunity to grow, every project is a chance to innovate, and every achievement is motivation to move forward.</p>
            <strong>I am Merikebu Gashu Mengesha. This is my story, my ambition, and my commitment to building a better future through technology.</strong>
        </div>
        <div class="text-center mt-4">
            <a class="btn btn-accent" href="<?= BASE_URL ?>/contact-page.php">Let's connect <i class="fa-solid fa-arrow-right ms-2"></i></a>
            <a class="btn btn-outline-primary ms-2" href="<?= BASE_URL ?>/projects.php">View my work</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
