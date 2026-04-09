<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AHI Training Survey System</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<style>
    /* Basic Reset and Typography */
    :root {
        --primary-color: #0056b3;
        --secondary-color: #f4f4f4;
        --dark-color: #333;
        --light-color: #fff;
        --accent-color: #28a745;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        line-height: 1.6;
        color: var(--dark-color);
        background-color: var(--light-color);
    }

    .container {
        max-width: 1100px;
        margin: auto;
        overflow: hidden;
        padding: 0 2rem;
    }

    h1,
    h2,
    h3 {
        margin-bottom: 1rem;
        font-weight: 600;
    }

    a {
        text-decoration: none;
        color: var(--primary-color);
    }

    ul {
        list-style: none;
    }

    /* Header and Navigation */
    header {
        background: var(--primary-color);
        color: var(--light-color);
        padding: 1rem 0;
    }

    header .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header .logo {
        font-size: 1.8rem;
    
        
        display: flex;

    }
    .logo img
    {
        margin-right: 15px;
        /* border-radius: 2px solid #f4f4f4; */
    }

    header nav ul {
        display: flex;
    }

    header nav ul li {
        margin-left: 1.5rem;
    }

    header nav ul li a {
        color: var(--light-color);
        font-weight: 400;
        transition: color 0.3s ease;
    }

    header nav ul li a:hover {
        color: var(--secondary-color);
    }

    /* Hero Section */
    .hero {
        background: var(--primary-color);
        color: var(--light-color);
        text-align: center;
        padding: 6rem 0 4rem;
        
    }

    .hero h1 {
        font-size: 3rem;
    }

    .hero p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
    }

    .cta-buttons {
        display: flex;
        justify-content: center;
        gap: 1rem;
    }

    .cta-button {
        display: inline-block;
        padding: 1rem 2rem;
        border-radius: 5px;
        font-weight: 600;
        text-transform: uppercase;
        transition: background-color 0.3s ease;
    }

    .cta-button.primary {
        background: var(--accent-color);
        color: var(--light-color);
    }

    .cta-button.primary:hover {
        background: #218838;
    }

    .cta-button.secondary {
        background: var(--light-color);
        color: var(--primary-color);
        border: 2px solid var(--light-color);
    }

    .cta-button.secondary.disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* Section Styling */
    .section {
        padding: 4rem 0;
    }

    .section h2 {
        text-align: center;
        margin-bottom: 3rem;
        font-size: 2.5rem;
    }

    .section.dark {
        background: var(--secondary-color);
    }

    .about-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        text-align: center;
    }

    .about-item {
        background: var(--light-color);
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Form Styling */
    form {
        max-width: 600px;
        margin: auto;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    form input,
    form textarea {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-family: 'Poppins', sans-serif;
    }

    form button {
        cursor: pointer;
    }

    /* Footer */
    footer {
        background: var(--dark-color);
        color: var(--light-color);
        text-align: center;
        padding: 1.5rem 0;
    }

    /* Media Queries for Responsiveness */
    @media(max-width: 768px) {
        header .container {
            flex-direction: column;
        }

        header nav {
            margin-top: 1rem;
        }

        .hero h1 {
            font-size: 2.5rem;
        }

        .about-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<body>

    <!-- Header and Navigation -->
    <header>
        <div class="container">
            <div class="logo">
                <img src="../assets/img/logo/final 5.png" width="50px" alt="">
                <div>Training Surveys</div>
            </div>
            <!-- <div> -->

                <nav>
                    <ul>
                        <li><a href="#about">About</a></li>
                        <li><a href="#dashboard">Dashboard</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </nav>

                <a href="dashboard.html" class="cta-button primary">Dashboard</a>
            <!-- </div> -->
        </div>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="hero">
        <div class="container">
            <h1>Measure the Impact of Your Training!</h1>
            <p>Administer pre-training and post-training surveys to effectively track knowledge gain and training success.</p>
            <div class="cta-buttons">
                <a href="pre-survey.php" class="cta-button primary">Take Pre-Training Survey</a>
                <a href="post-survey.php" class="cta-button secondary disabled">Take Post-Training Survey</a>
            </div>
        </div>
    </main>

    <!-- About Section -->
    <section id="about" class="section">
        <div class="container">
            <h2>About This System</h2>
            <div class="about-grid">
                <div class="about-item">
                    <h3>Before Training</h3>
                    <p>Assess participants' existing knowledge, skill level, and expectations before the training
                        begins. This data provides a crucial baseline for comparison.</p>
                </div>
                <div class="about-item">
                    <h3>After Training</h3>
                    <p>Measure the immediate impact of the training, including knowledge retention, participant
                        satisfaction, and perceived effectiveness.</p>
                </div>
                <div class="about-item">
                    <h3>Data-Driven Insights</h3>
                    <p>Generate detailed reports to visualize and compare pre- and post-training results, helping you
                        make data-driven decisions for future programs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Placeholder for Dashboard link -->
    <section id="dashboard" class="section dark">
        <div class="container">
            <h2>The Power of Baseline and Follow-up: Why Pre- and Post-Training Surveys Matter</h2>
            <hr>
            <p>In the world of learning and development (L&D), simply running a training course is not enough. To truly understand the impact and return on investment (ROI) of an intervention, organizations must accurately measure change. This is where the strategic use of pre-training and post-training surveys becomes essential..</p>

            <!-- <a href="dashboard.html" class="cta-button primary">View Dashboard</a> -->
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section">
        <div class="container">
            <h2>Contact Us</h2>
            <p>For support or more information, please contact our team.</p>
            <form action="#" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit" class="cta-button primary">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2025 Training Surveys. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="scripts.js"></script>
</body>

</html>