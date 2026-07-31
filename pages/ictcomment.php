<?php
//    include('./../assets/fn/session.php');
//    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICT Department - Feedback & Comments</title>
    <!-- Bootstrap 5 CSS --> 
     <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/KStyle.css">
    <!-- <link href="https://jsdelivr.net" rel="stylesheet"> -->
    <!-- Bootstrap Icons -->
    <!-- <link href="https://jsdelivr.net" rel="stylesheet"> -->
</head>
<body class="bg-light">

    <!-- Header Section -->
    <header class="text-white py-1 mb-5 shadow-sm " style="background-color: rgba(52, 94, 140, 0.7); align-content: justify;">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="bi bi-cpu-fill fs-1 me-3 text-info"></i>
                <div>
                    <h1 class="h3 mb-0 fw-bold">AHI - ICT Executive</h1>
                    <p class="small mb-0">Help us improve your digital workspace</p>
                </div>
            </div>
            <span class="badge bg-success d-none d-md-inline-block px-3 py-2">
                <i class="bi bi-circle-fill me-1 small"></i> All Systems Operational
            </span>
        </div>
    </header>

    <main class="container mb-5">
        <div class="row g-4">
            
            <!-- Left Column: Feedback Form -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm p-4 p-md-5 bg-white rounded-3">
                    <h2 class="h4 mb-3 fw-bold text-center text-dark">Submit Feedback or Comments</h2>
                    <p class="text-secondary mb-4">Your insights directly guide our hardware upgrades, software deployments, and support workflows.</p>
                    
                    <form action="./../assets/fn/ictcomment.php" method="POST" class="needs-validation" novalidate>
                        <div class="row g-3">
                            <hr>
                            <!-- Name -->
                            <div class="col-md-4">
                                <input type="text" name="fname" class="form-control" id="userName" placeholder="Full Name [Opt]" required>
                            </div>
                            
                            <!-- Email -->
                            <div class="col-md-4">
                                <input type="email" name="email" class="form-control" id="userEmail" placeholder="Email [Opt]" required>
                            </div>

                            <div class="col-md-4">
                                <input type="date" name="date" class="form-control" id="date" placeholder="Date [Opt]" required>
                            </div>
                            <!-- Department/Role -->
                            <div class="col-md-6">
                                <input type="text" name="dept" class="form-control" id="userDept" placeholder="Department [Opt]" required>
                            </div>

                            <!-- Category Selection -->
                            <div class="col-md-6">
                                <select name="cat" class="form-select" id="feedbackCategory" required>
                                    <option value="" selected>Choose a category...</option>
                                    <option value="network">Network & Wi-Fi Speed</option>
                                    <option value="software">Software & Applications</option>
                                    <option value="hardware">Hardware & Workstations</option>
                                    <option value="support">Helpdesk & Tech Support</option>
                                    <option value="suggestion" >General Suggestion</option>
                                </select>
                            </div>
                            <hr>

                            <!-- Urgency Radio Buttons -->
                            <div class="col-12 my-3">
                                <label class="form-label text-center d-block fw-semibold mb-2">Is this related to an active, unresolved technical bottleneck?</label>
                                <div class="form-check form-check-inline">
                                    <input name="rel" class="form-check-input" type="radio" name="urgencyOptions" id="urgencyLow" value="no" checked>
                                    <label class="form-check-label" for="urgencyLow">No, standard feedback</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="rel" class="form-check-input" type="radio" name="urgencyOptions" id="urgencyHigh" value="yes">
                                    <label class="form-check-label" for="urgencyHigh">Yes, impacting my daily work</label>
                                </div>
                                <div id="ticketReminder" class="form-text text-warning d-none">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i> For urgent system failures, please fill the maintenance form via the Helpdesk portal.
                                </div>
                            </div>

                            <!-- Message Body -->
                            <div class="col-12">
                                <!-- <label for="feedbackMessage" class="form-label fw-semibold"></label> -->
                                <textarea name="comment" class="form-control" id="feedbackMessage" rows="5" placeholder="Provide clear specific details, tool names, or locations if applicable..." required></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 pt-2">
                                <button type="submit" class="btn btn-success btn-lg w-100 px-4 fw-bold shadow-sm transition-all">
                                    <i class="bi bi-send-fill me-2"></i>Submit to ICT Team
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Column: Info & Stats Sidebar -->
            <div class="col-lg-4">
                <!-- Response Time Card -->
                <div class="card border-0 shadow-sm p-4 bg-white mb-4 rounded-3 text-center">
                    <div class="d-inline-flex align-items-center justify-content-center bg-info bg-opacity-10 text-info rounded-circle mb-3 mx-auto" style="width: 60px; height: 60px;">
                        <!-- <i class="bi bi-clock-history fs-3"></i> -->
                        <a href=""><img src="./../assets/img/logo/final 5.png" width="50" height="50" class="d-inline-block align-text-top">
                        </a>
                    </div>
                    <h3 class="h5 fw-bold mb-1">Our Commitment</h3>
                    <p class="text-secondary small mb-3">We review all incoming comments weekly to shape upcoming sprint priorities.</p>
                    <hr class="text-muted opacity-25">
                    <div class="row g-2">
                        <div class="col-6 border-end">
                            <span class="d-block h4 fw-bold text-dark mb-0">24h</span>
                            <small class="text-muted text-uppercase style-tracking small">Review Time</small>
                        </div>
                        <div class="col-6">
                            <span class="d-block h4 fw-bold text-success mb-0">0%</span>
                            <small class="text-muted text-uppercase style-tracking small">Fix Rate</small>
                        </div>
                    </div>
                </div>

                <!-- Alternative Channels Card -->
                <div class="card border-0 shadow-sm p-4 bg-white rounded-3">
                    <h3 class="h6 fw-bold text-dark mb-3"><i class="bi bi-life-preserver me-2 text-secondary"></i>Other Resources</h3>
                    <div class="list-group list-group-flush small">
                        <a href="../material/ICT/AHI ICT policy V1.0.pdf" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0 py-3 border-0">
                            <span><i class="bi bi-book me-2"></i>ICT Policy and Proc.</a></span>
                            <!-- <i class="bi bi-chevron-right text-muted small"></i> -->
                        </a>
                        <a href="./../index.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0 py-3 border-0">
                            <span><i class="bi bi-ticket-perforated me-2"></i>Open Support Ticket</a></span>
                            <!-- <i class="bi bi-chevron-right text-muted small"></i> -->
                        </a>
                        <a href="./../index.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0 py-3 border-0">
                            <span><i class="bi bi-shield-check me-2"></i>Report Security Vulnerability</span>
                            <!-- <i class="bi bi-chevron-right text-muted small"></i> -->
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </main>
 
    <!-- Footer -->
    <footer class="bg-white border-top py-4 text-center mt-auto">
        <p class="small text-muted mb-0">&copy; 2019 Animal Health Institute ICT Executive. </p>
    </footer>

    <!-- Bootstrap 5 JavaScript & Interactivity Logic -->
    <script src="https://jsdelivr.net"></script>
    <script>
        // Form Validation Logic
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
