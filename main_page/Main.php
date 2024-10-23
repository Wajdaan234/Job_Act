<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Job_act/main_page/main.css">
    <link rel="stylesheet" href="/Job_act/main_page/main_media.css">
    <!-- <meta http-equiv="refresh" content="1"> -->
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/paypal.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Job_Act</title>
    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="icon" type="image/x-icon" href="/Job_act/main_page/image/favicon.png">
</head>
<style>
    #join{
    width: 100%;
    height: 450px;
}


#colorlib-counter {
    position: relative;
    padding: 7em 0;
    background-image: url('/job_act/main_page/image/join-us.jpg'); /* Set the background image */
    background-size: cover;
    background-attachment: fixed; /* Keep the background fixed */
    background-position: center; /* Center the background image */
    width: 100%;
    height: 450px; /* Ensure this height fits your design */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

#colorlib-counter::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #006bc26c;
    z-index: 1;
}

#colorlib-counter .transparent-center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: fit-content;
/* Semi-transparent background */
    z-index: 500;
    /* border: 3px solid red; */
    display: flex;
    align-items: center;
    justify-content: center;
}

#colorlib-counter .content {
    position: relative;
    z-index: 3;
    /* text-align: center; */
    color: white;
    width: 70%;
}

#colorlib-counter .content h1 {
    font-size: 36px;
    letter-spacing: 2px;
    font-family: 'Nunito', sans-serif;
    font-weight: bolder;
}

#colorlib-counter .content p {
    color: white;
}

.transparent-center .join-more {
    width: 200px;
    padding: 1rem;
    border: none;
    font-size: 1rem;
    font-family: 'Nunito', sans-serif;
    font-weight: bolder;
    color: white;
    background-color: var(--yellowcolor);
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    z-index: 100;
    cursor: pointer;
    border: 2px solid white;
    border-radius: 1rem;
}

.transparent-center .join-more:hover {
    color: rgb(252, 252, 252);
    border: 2px solid rgb(255, 208, 0);
    transition: 0.7s;
    background-color: rgba(255, 204, 0);
}
@media screen and (min-width: 360px) and (max-width:850px ) {
        #colorlib-counter .transparent-center{
            /* border: 1px solid red; */
            display: inline;
            text-align: center;
            width: 90%;
        }
           
        #colorlib-counter .content {
            width: 100%;}

        #colorlib-counter .content h1{
            font-size: 20px;}
        #colorlib-counter .content p{
            font-size: 10px;}

        

        .transparent-center .join-more {
            width: 60px;
            padding: 0.5rem;
            color: white;
            margin: 1rem 10rem;
        }
        
    }


</style>
<body>
<!-- nav bar  -->
  <div id="messagePanel">
        <div class="alert">
            <img src="/Job_act/main_page/image/alert.png">
            <h2>Important Message</h2>
        </div>
        
        <p>The frontend of my website is complete, and the backend functionalities for data storage, updates, and deletions have been implemented. The accordion method has been used to manage various types of jobs. <span> Overall, the project is approximately 40% complete.</span> </p>
        <button class="close-btn" onclick="closePanel()">×</button>
    </div>
    <br>
<div class="navbar" id="navbar">
        <div class="logo"><a href="#">JOB<span>_ACT</span></a></div>
        <ul class="links">
            <li><a href="#" id="active">Home</a></li>
            <li><a href="#Jobs">Jobs</a></li>
            <li><a href="#join">Join</a></li>
            <li><a href="#Companies">Featured</a></li> 
            <li><a href="#blog">Blog</a></li> 
        </ul>
        <div class="buttn">
            <button class="btn-17">
                <span class="text-container">
                  <span class="text"><a href="/Job_act/component/registration/signup.php">SIGNUP</a></span>
                </span>
              </button>
              <button class="btn-17">
                <span class="text-container">
                  <span class="text"><a href="/Job_act/component/registration/signup.php">LOGIN</a></span>
                </span>
              </button>
        
        </div>
        <div class="toggle_btn">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
    <div class="dropdown_menu ">
    <li><a href="#" id="active">Home</a></li>
            <li><a href="#Jobs">Jobs</a></li>
            <li><a href="#join">Join</a></li>
            <li><a href="#Companies">Featured</a></li> 
            <li><a href="#blog">Blog</a></li> 
        <li ><a href="/Job_act/component/registration/signup.php">Login</a></li>
        <li ><a href="/Job_act/component/registration/signup.php">Signup</a></li>
    </div>
<!-- nav bar end -->

    <header>
        <div class="header-title">
        FIND YOUR <br> <strong style="color: rgb(0, 113, 206);">PERFECT JOB</strong><br> EASILY
        </div>
    </header>
    <!-- search-box  -->
     <div class="search-wrapper">
        <div class="search-box">
            <div class="search-card">
                <input type="text" placeholder="Job title or keyword" class="search-input">
                <button class="search-btn">Search</button>
            </div>
        </div>
     </div>
    <!-- search-box  -->
    <div class="filter-box">
        <div class="filter-dropdown">
            <select name="job-level" id="job-level" class="filter-select">
                <option>Job level</option>
                <option>Entry</option>
                <option>Mid-Senior</option>
                <option>Director</option>
            </select>
            <select name="job-function" id="job-function" class="filter-select">
                <option>Job Function</option>
                <option>IT</option>
                <option>Management</option>
                <option>Education</option>
            </select>
            <select name="employment" id="employment" class="filter-select">
                <option>Employment</option>
                <option>Internship</option>
                <option>Part Time</option>
                <option>Full Time</option>
            </select>
            <select name="location" id="location" class="filter-select">
                <option>Employment</option>
                <option>Internship</option>
                <option>Part Time</option>
                <option>Full Time</option>
            </select>
            <select name="Education" id="education" class="filter-select">
                <option>Education</option>
                <option>Heigh School</option>
                <option>Bachelor's Degree</option>
                <option>Master's Degree</option>
            </select>
        </div>
        <div class="filter-chosen">
            <div class="chosen-card">
                Remote  <i class="fas fa-times-circle"></i>
            </div>
            <div class="chosen-card">
                Full Time  <i class="fas fa-times-circle"></i>
            </div>
            <div class="chosen-card">
                Financial Tect  <i class="fas fa-times-circle"></i>
            </div>
            <div class="chosen-card">
                Entry Level  <i class="fas fa-times-circle"></i>
            </div>
        </div>
    </div>

    <!-- job posting  -->
     <section class="job-list" id="Jobs">
        
        <div class="job-card">
            <div class="job-name">
                <img class="job-profile" src="/Job_act/main_page/image/digital.webp" alt="">
                <div class="job-detail">
                    <h4>Digital Arcanum</h4>
                    <h3>Graphic Designer</h3>
                    <p>Karachi</p>
                </div>
            </div>
            <div class="job-label">
                <a href="#" class="label-a"><svg xmlns="http://www.w3.org/2000/svg" focusable="false" role="img" fill="currentColor" viewBox="0 0 20 20" data-testid="section-icon" aria-hidden="true" class="js-match-insights-provider-1pdva1a eac13zx0"><path fill-rule="evenodd" d="M4.452 9.604a2.5 2.5 0 00-.952-.19V7.586A2.5 2.5 0 005.996 5.09h5.094a2.5 2.5 0 002.5 2.5v1.836a2.5 2.5 0 00-2.488 2.482H5.995a2.5 2.5 0 00-1.543-2.304zM2 4.09a.5.5 0 01.5-.5h12.09a.5.5 0 01.5.5v8.818a.5.5 0 01-.5.5H2.5a.5.5 0 01-.5-.5V4.09zm6.544 6.41a2 2 0 100-4 2 2 0 000 4zM16.6 7.8v7.11H4.76a.5.5 0 00-.5.5v.5a.5.5 0 00.5.5h12.663c.442 0 .677-.222.677-.663V7.8a.5.5 0 00-.5-.5h-.5a.5.5 0 00-.5.5z" clip-rule="evenodd"></path></svg> 25000</a>
                <a href="#" class="label-b"><svg xmlns="http://www.w3.org/2000/svg" focusable="false" role="img" fill="currentColor" viewBox="0 0 20 20" data-testid="section-icon" aria-hidden="true" class="js-match-insights-provider-1pdva1a eac13zx0"><path fill-rule="evenodd" d="M10 3C7 3 6 6 6 6H2.5a.5.5 0 00-.5.5V9h16V6.5a.5.5 0 00-.5-.5H14s-1-3-4-3zm2.5 3h-5s1-1.5 2.5-1.5S12.5 6 12.5 6z" clip-rule="evenodd"></path><path d="M8 11H2v5.5a.5.5 0 00.5.5h15a.5.5 0 00.5-.5V11h-6c0 1-1 2-2 2s-2-1-2-2z"></path></svg>Full Time</a>
            </div>
            <div class="job-posted">
                posted 2 min ago
            </div>
        </div>
        
        <div class="job-card">
            <div class="job-name">
                <img class="job-profile" src="/Job_act/main_page/image/Straight-Tech.jpg" alt="">
                <div class="job-detail">
                    <h4>Straight Technologies</h4>
                    <h3>Canva Intern</h3>
                    <p>Karachi</p>
                </div>
            </div>
            <div class="job-label">
                <a href="#" class="label-a"><svg xmlns="http://www.w3.org/2000/svg" focusable="false" role="img" fill="currentColor" viewBox="0 0 20 20" data-testid="section-icon" aria-hidden="true" class="js-match-insights-provider-1pdva1a eac13zx0"><path fill-rule="evenodd" d="M4.452 9.604a2.5 2.5 0 00-.952-.19V7.586A2.5 2.5 0 005.996 5.09h5.094a2.5 2.5 0 002.5 2.5v1.836a2.5 2.5 0 00-2.488 2.482H5.995a2.5 2.5 0 00-1.543-2.304zM2 4.09a.5.5 0 01.5-.5h12.09a.5.5 0 01.5.5v8.818a.5.5 0 01-.5.5H2.5a.5.5 0 01-.5-.5V4.09zm6.544 6.41a2 2 0 100-4 2 2 0 000 4zM16.6 7.8v7.11H4.76a.5.5 0 00-.5.5v.5a.5.5 0 00.5.5h12.663c.442 0 .677-.222.677-.663V7.8a.5.5 0 00-.5-.5h-.5a.5.5 0 00-.5.5z" clip-rule="evenodd"></path></svg> 10,000-30,000</a>
                <a href="#" class="label-b"><svg xmlns="http://www.w3.org/2000/svg" focusable="false" role="img" fill="currentColor" viewBox="0 0 20 20" data-testid="section-icon" aria-hidden="true" class="js-match-insights-provider-1pdva1a eac13zx0"><path fill-rule="evenodd" d="M10 3C7 3 6 6 6 6H2.5a.5.5 0 00-.5.5V9h16V6.5a.5.5 0 00-.5-.5H14s-1-3-4-3zm2.5 3h-5s1-1.5 2.5-1.5S12.5 6 12.5 6z" clip-rule="evenodd"></path><path d="M8 11H2v5.5a.5.5 0 00.5.5h15a.5.5 0 00.5-.5V11h-6c0 1-1 2-2 2s-2-1-2-2z"></path></svg>Full Time</a>
            </div>
            <div class="job-posted">
                posted 2 min ago
            </div>
        </div>
        
        <div class="job-card">
            <div class="job-name">
                <img class="job-profile" src="/Job_act/main_page/image/teaching.jfif" alt="">
                <div class="job-detail">
                    <h4>Happy Place Group of School</h4>
                    <h3>Teaching Staff (ALL SUBJECT)</h3>
                    <p>Karachi</p>
                </div>
            </div>
            <div class="job-label">
                <a href="#" class="label-a"><svg xmlns="http://www.w3.org/2000/svg" focusable="false" role="img" fill="currentColor" viewBox="0 0 20 20" data-testid="section-icon" aria-hidden="true" class="js-match-insights-provider-1pdva1a eac13zx0"><path fill-rule="evenodd" d="M4.452 9.604a2.5 2.5 0 00-.952-.19V7.586A2.5 2.5 0 005.996 5.09h5.094a2.5 2.5 0 002.5 2.5v1.836a2.5 2.5 0 00-2.488 2.482H5.995a2.5 2.5 0 00-1.543-2.304zM2 4.09a.5.5 0 01.5-.5h12.09a.5.5 0 01.5.5v8.818a.5.5 0 01-.5.5H2.5a.5.5 0 01-.5-.5V4.09zm6.544 6.41a2 2 0 100-4 2 2 0 000 4zM16.6 7.8v7.11H4.76a.5.5 0 00-.5.5v.5a.5.5 0 00.5.5h12.663c.442 0 .677-.222.677-.663V7.8a.5.5 0 00-.5-.5h-.5a.5.5 0 00-.5.5z" clip-rule="evenodd"></path></svg>30,000</a>
                <a href="#" class="label-b"><svg xmlns="http://www.w3.org/2000/svg" focusable="false" role="img" fill="currentColor" viewBox="0 0 20 20" data-testid="section-icon" aria-hidden="true" class="js-match-insights-provider-1pdva1a eac13zx0"><path fill-rule="evenodd" d="M10 3C7 3 6 6 6 6H2.5a.5.5 0 00-.5.5V9h16V6.5a.5.5 0 00-.5-.5H14s-1-3-4-3zm2.5 3h-5s1-1.5 2.5-1.5S12.5 6 12.5 6z" clip-rule="evenodd"></path><path d="M8 11H2v5.5a.5.5 0 00.5.5h15a.5.5 0 00.5-.5V11h-6c0 1-1 2-2 2s-2-1-2-2z"></path></svg>Full Time</a>
            </div>
            <div class="job-posted">
                posted 2 min ago
            </div>
        </div>
        <button class="job-more">Load More...</button>
     </section>
     <!-- join  -->
      <section id="join">
        <div id="colorlib-counter" class="colorlib-counters" data-stellar-background-ratio="0.5">
              <div class="transparent-center">
                    <div class="content">
                            <h1 class="section-title">LETS START YOUR NEW JOB WITH US</h1>
                            <br><p>We are thrilled to have you join us. Your new role starts today, and we’re excited about the skills and experience you bring to our organization. We believe you'll make a valuable contribution and look forward to seeing the impact you'll have.

                                If you have any questions or need assistance as you get started, feel free to reach out. Here's to a successful journey together!</p>
                    </div>
                    <button class="join-more"> <a href="/Job_act/component/registration/signup.php" style="text-decoration: none; color: black;">Join</a></button>
             </div>
        </div>      
      </section>
     <!-- join  end-->
     <!-- featured-->
    <section id="Companies" class="featured">
        <h1 class="section-title">Featured Companies</h1>
        <p>Our platform proudly collaborates with a diverse range of industry leaders and innovative startups. These featured companies exemplify excellence and innovation,
             driving progress and setting benchmarks in their respective fields. Explore their inspiring journeys and discover the remarkable achievements that make them stand out.</p>
       
        <div class="featured-wrapper">
                    <div class="featured-card">
                        <img class="featured-image" src="/Job_act/main_page/image/Ebay.png" alt="">
                        <p>Ebay</p>
                        <button class="featured-btn">View 2 jobs</button>
                    </div>

                    <div class="featured-card">
                        <img class="featured-image" src="/Job_act/main_page/image/tiktok.png" alt="">
                        <p>Tiktok</p>
                        <button class="featured-btn">View 5 jobs</button>
                   </div>     
            
                    <div class="featured-card">
                        <img class="featured-image" src="/Job_act/main_page/image/amazon.jfif" alt="">
                        <p>Amazon</p>
                        <button class="featured-btn">View 1 jobs</button>
                    </div>
            
                    <div class="featured-card">
                        <img class="featured-image" src="/Job_act/main_page/image/tesla.jpg" alt="">
                        <p>Tesla</p>
                        <button class="featured-btn">View 4 jobs</button>
                    </div>
            
                    <div class="featured-card">
                        <img class="featured-image" src="/Job_act/main_page/image/google.png" alt="">
                        <p>Google</p>
                        <button class="featured-btn">View 7 jobs</button>
                    </div>
            
                    <div class="featured-card">
                        <img class="featured-image" src="/Job_act/main_page/image/you.png" alt="">
                        <p>Youtube</p>
                        <button class="featured-btn">View 3 jobs</button>
                    </div>
            
                    <div class="featured-card">
                        <img class="featured-image" src="/Job_act/main_page/image/apple.png" alt="">
                        <p>Apple</p>
                        <button class="featured-btn">View 3 jobs</button>
                    </div>
            
                    <div class="featured-card">
                        <img class="featured-image" src="/Job_act/main_page/image/facebook.webp" alt="">
                        <p>Facebook</p>
                        <button class="featured-btn">View 8 jobs</button>
                    </div>
        </div>
    </section>

     <!-- featured  end-->
    <!-- testimonal  -->
    <section id="testimoni" class="testimoni">
        <h1 class="section-title">Testimonials</h1>
        <p>Let's see what our clients say about us</p>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                
                <div class="swiper-slide">
                    <i class="fas fa-quote-left"></i>
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h3>
                    <div class="testimoni-pic">
                        <img src="/Job_act/main_page/image/profile2.webp" alt="John Smith">
                        <p>Taylor Tama</p>
                        <span>Data Analyst</span>
                    </div>
                </div>
                
                <div class="swiper-slide">
                    <i class="fas fa-quote-left"></i>
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h3>
                    <div class="testimoni-pic">
                    <img src="/Job_act/main_page/image/profile1.jpg" alt="John Smith">
                        <p>Johny Ibraham</p>
                        <span>Web Develpor</span>
                    </div>
                </div>

                <div class="swiper-slide">
                    <i class="fas fa-quote-left"></i>
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h3>
                    <div class="testimoni-pic">
                        <img src="/Job_act/main_page/image/profile3.webp" alt="John Smith">
                        <p>Albert Johnny</p>
                        <span>Logistics Director</span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <i class="fas fa-quote-left"></i>
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h3>
                    <div class="testimoni-pic">
                        <img src="/Job_act/main_page/image/profile4.webp" alt="John Smith">
                        <p>Peter</p>
                        <span>Product Analyst</span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <i class="fas fa-quote-left"></i>
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h3>
                    <div class="testimoni-pic">
                        <img src="/Job_act/main_page/image/profile5.jpg" alt="John Smith">
                        <p>Julia</p>
                        <span>Marketing Officer</span>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!--blog-->
    <section id="blog" class="blog">
        <h1 class="section-title" style="color: rgb(0, 132, 255);">Career Advise</h1>
        <p>learn more career tips from company's recruiter</p>
        <div class="blog-wrapper">

            
            <div class="blog-card">
                <div class="blog-image"><img src="/Job_act/main_page/image/blog1.jfif" alt=""></div>
                 <div class="blog-detail">
                    <span>11 Apr 2023</span>
                    <h4>How to enjoy your work</h4>
                    <p style="color: white;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <hr class="divider">
                    <a href="" class="blog-more">Read More....</a>
                 </div>
            </div>

            <div class="blog-card">
                <div class="blog-image"><img src="/Job_act/main_page/image/blog3.jpg" alt=""></div>
                 <div class="blog-detail">
                    <span>24 dec 2023</span>
                    <h4>10 Tips for Technical Interviews</h4>
                    <p style="color: white;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <hr class="divider">
                    <a href="" class="blog-more">Read More....</a>
                 </div>
            </div>

            <div class="blog-card">
                <div class="blog-image"><img src="/Job_act/main_page/image/blog2.jpg" alt=""></div>
                 <div class="blog-detail">
                    <span>20 feb 2024</span>
                    <h4>Managing Time Effectivily</h4>
                    <p style="color: white;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <hr class="divider">
                    <a href="" class="blog-more">Read More....</a>
                 </div>
            </div>

        </div>
    </section>
    <!--footer-->
    <section id="footer">
        <footer>
            <div class="footer-wrapper">
                <h3>JOBACT</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <div class="social-media">
                    <a href=""><i class="fab fa-facebook"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-wrapper">
                <h4>Explore</h4>
                <a href="">Top Companies</a>
                <a href="">Terms of service</a>
                <a href="">Podcast</a>
                <a href="">Carrer</a>
            </div>
            <div class="footer-wrapper">
                <h4>About</h4>
                <a href="">FAQ</a>
                <a href="">Get Inspired</a>
                <a href="">Blog</a>
            </div>
            <div class="footer-wrapper">
                <h4>Support</h4>
                <a href="">Customer Service</a>
                <a href="">Trust & safety</a>
                <a href="">Partnershiping</a>
            </div>
            <div class="footer-wrapper">
                <h4>Community</h4>
                <a href="">Community</a>
                <a href="">Invite a Friend</a>
                <a href="">Event</a>
            </div>
        </footer>
    </section>
</body>
<script src="script.js">
</script>
<script> 
    //   window.onload = function() {
    //         alert("This website is 30% complete. Work is still in progress. Stay tuned for updates!");
    //     };
      // Function to close the panel
      function closePanel() {
            document.getElementById('messagePanel').style.display = 'none';
        }
    </script>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</html>