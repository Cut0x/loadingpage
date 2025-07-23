<?php
require_once 'LoadingPage.php';

// Initialize the loading page
$loader = new LoadingPage([
    'title' => 'LoadingPage Module Demo',
    'steps' => [
        'Initializing showcase...',
        'Loading components...',
        'Preparing examples...',
        'Ready to explore!'
    ],
    'duration' => 4000,
    'animation_type' => 'bar',
    'background_color' => '#0f172a',
    'text_color' => '#f1f5f9',
    'accent_color' => '#3b82f6',
    'show_percentage' => true,
    'auto_hide' => true
]);

$loader->display();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoadingPage PHP Module - Professional Loading Pages</title>
    <meta name="description" content="A comprehensive PHP module for creating animated, customizable loading pages. Full-screen overlays with multiple animations and complete configuration options.">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Navigation */
        .navbar {
            background: #fff;
            padding: 1rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #3b82f6;
            text-decoration: none;
        }
        
        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }
        
        .nav-menu a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .nav-menu a:hover {
            color: #3b82f6;
        }
        
        .mobile-menu {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }
        
        .mobile-menu span {
            width: 25px;
            height: 3px;
            background: #333;
            margin: 3px 0;
            transition: 0.3s;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 120px 0 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.3);
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }
        
        .hero p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: #3b82f6;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .btn:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
        }
        
        .btn-secondary {
            background: transparent;
            border: 2px solid white;
            margin-left: 1rem;
        }
        
        .btn-secondary:hover {
            background: white;
            color: #333;
        }
        
        /* Features Section */
        .features {
            padding: 80px 0;
            background: #f8fafc;
        }
        
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: #1e293b;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: #3b82f6;
            margin-bottom: 1rem;
        }
        
        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #1e293b;
        }
        
        /* Examples Section */
        .examples {
            padding: 80px 0;
            background: white;
        }
        
        .example-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 3rem;
            border-bottom: 1px solid #e2e8f0;
            flex-wrap: wrap;
        }
        
        .tab-button {
            background: none;
            border: none;
            padding: 1rem 2rem;
            cursor: pointer;
            font-size: 1rem;
            color: #64748b;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
        }
        
        .tab-button.active {
            color: #3b82f6;
            border-bottom-color: #3b82f6;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .example-card {
            background: #f8fafc;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 2rem;
            border: 1px solid #e2e8f0;
        }
        
        .example-header {
            background: #1e293b;
            color: white;
            padding: 1rem 1.5rem;
            font-weight: 600;
        }
        
        .example-content {
            padding: 0;
        }
        
        pre {
            margin: 0 !important;
            border-radius: 0 !important;
        }
        
        code {
            font-size: 0.9rem;
        }
        
        .demo-button {
            display: inline-block;
            margin: 1rem 1.5rem 1.5rem;
            padding: 10px 20px;
            background: #10b981;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            transition: background 0.3s ease;
        }
        
        .demo-button:hover {
            background: #059669;
        }
        
        /* Documentation Section */
        .documentation {
            padding: 80px 0;
            background: #0f172a;
            color: white;
        }
        
        .doc-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 3rem;
            margin-top: 3rem;
        }
        
        .doc-card {
            background: #1e293b;
            padding: 2rem;
            border-radius: 12px;
            border: 1px solid #334155;
        }
        
        .doc-card h3 {
            color: #3b82f6;
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }
        
        .doc-card ul {
            list-style: none;
        }
        
        .doc-card li {
            padding: 0.5rem 0;
            border-bottom: 1px solid #334155;
        }
        
        .doc-card li:last-child {
            border-bottom: none;
        }
        
        .doc-card strong {
            color: #60a5fa;
        }
        
        /* Footer */
        .footer {
            background: #1e293b;
            color: white;
            padding: 3rem 0 1rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .footer h3 {
            color: #3b82f6;
            margin-bottom: 1rem;
        }
        
        .footer a {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer a:hover {
            color: white;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #334155;
            color: #94a3b8;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }
            
            .mobile-menu {
                display: flex;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .btn-secondary {
                margin-left: 0;
                margin-top: 1rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .example-tabs {
                flex-direction: column;
            }
            
            .tab-button {
                text-align: center;
            }
            
            .container {
                padding: 0 15px;
            }
        }
        
        @media (max-width: 480px) {
            .hero {
                padding: 100px 0 60px;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .features, .examples, .documentation {
                padding: 60px 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-container">
                <a href="#" class="logo">
                    <i class="fas fa-spinner"></i> LoadingPage
                </a>
                <ul class="nav-menu">
                    <li><a href="#features">Features</a></li>
                    <li><a href="#examples">Examples</a></li>
                    <li><a href="#documentation">Documentation</a></li>
                    <li><a href="https://github.com" target="_blank">GitHub</a></li>
                </ul>
                <div class="mobile-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Professional Loading Pages</h1>
                <p>Create stunning, customizable loading screens with animations, progress tracking, and full responsive design</p>
                <a href="#examples" class="btn">View Examples</a>
                <a href="#documentation" class="btn btn-secondary">Documentation</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <h2 class="section-title">Powerful Features</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <h3>Fully Customizable</h3>
                    <p>Configure colors, text, duration, animation types, and loading steps. Complete control over appearance and behavior.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-magic"></i>
                    </div>
                    <h3>4 Animation Types</h3>
                    <p>Choose from spinner, bouncing dots, progress bar, and pulse animations. Each optimized for smooth performance.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Responsive Design</h3>
                    <p>Works perfectly on all devices and screen sizes. Full-screen overlay that adapts to any viewport.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3>Easy Integration</h3>
                    <p>Simple PHP class with fluent interface. Get started with just one line of code or customize everything.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <h3>Multi-Step Loading</h3>
                    <p>Display different messages during loading phases. Perfect for applications with complex initialization.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>Event System</h3>
                    <p>JavaScript events for loading completion. Integrate with your application's workflow seamlessly.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Examples Section -->
    <section class="examples" id="examples">
        <div class="container">
            <h2 class="section-title">Live Examples</h2>
            
            <div class="example-tabs">
                <button class="tab-button active" data-tab="basic">Basic Usage</button>
                <button class="tab-button" data-tab="advanced">Advanced Config</button>
                <button class="tab-button" data-tab="themes">Custom Themes</button>
                <button class="tab-button" data-tab="fluent">Fluent Interface</button>
            </div>

            <div class="tab-content active" id="basic">
                <div class="example-card">
                    <div class="example-header">Simple Loading Page</div>
                    <div class="example-content">
                        <pre><code class="language-php"><?php echo htmlspecialchars('<?php
require_once \'LoadingPage.php\';

// Simple usage - one line of code
LoadingPage::show();

// With basic options
LoadingPage::show([
    \'title\' => \'Loading Application...\',
    \'duration\' => 3000,
    \'animation_type\' => \'spinner\'
]);
?>'); ?></code></pre>
                    </div>
                    <a href="?demo=basic" class="demo-button">
                        <i class="fas fa-play"></i> Try This Demo
                    </a>
                </div>
            </div>

            <div class="tab-content" id="advanced">
                <div class="example-card">
                    <div class="example-header">Complete Configuration</div>
                    <div class="example-content">
                        <pre><code class="language-php"><?php echo htmlspecialchars('<?php
$loader = new LoadingPage([
    \'title\' => \'Loading Dashboard\',
    \'steps\' => [
        \'Connecting to database...\',
        \'Loading user preferences...\',
        \'Initializing modules...\',
        \'Preparing interface...\',
        \'Ready!\'
    ],
    \'duration\' => 6000,
    \'animation_type\' => \'bar\',
    \'background_color\' => \'#1a1a2e\',
    \'text_color\' => \'#ffffff\',
    \'accent_color\' => \'#3b82f6\',
    \'show_percentage\' => true,
    \'redirect_url\' => \'dashboard.php\'
]);

$loader->display();
?>'); ?></code></pre>
                    </div>
                    <a href="?demo=advanced" class="demo-button">
                        <i class="fas fa-play"></i> Try This Demo
                    </a>
                </div>
            </div>

            <div class="tab-content" id="themes">
                <div class="example-card">
                    <div class="example-header">Dark Theme with Pulse Animation</div>
                    <div class="example-content">
                        <pre><code class="language-php"><?php echo htmlspecialchars('<?php
LoadingPage::show([
    \'title\' => \'Dark Theme Loading\',
    \'steps\' => [\'Initializing...\', \'Processing...\', \'Complete!\'],
    \'duration\' => 4000,
    \'animation_type\' => \'pulse\',
    \'background_color\' => \'#0f0f23\',
    \'text_color\' => \'#a0a0a0\',
    \'accent_color\' => \'#00d4aa\',
    \'show_percentage\' => true
]);
?>'); ?></code></pre>
                    </div>
                    <a href="?demo=dark" class="demo-button">
                        <i class="fas fa-play"></i> Try This Demo
                    </a>
                </div>

                <div class="example-card">
                    <div class="example-header">Colorful Theme with Dots</div>
                    <div class="example-content">
                        <pre><code class="language-php"><?php echo htmlspecialchars('<?php
LoadingPage::show([
    \'title\' => \'Colorful Loading\',
    \'steps\' => [\'Starting up...\', \'Loading resources...\', \'Almost ready!\'],
    \'duration\' => 5000,
    \'animation_type\' => \'dots\',
    \'background_color\' => \'#ff6b6b\',
    \'text_color\' => \'#ffffff\',
    \'accent_color\' => \'#4ecdc4\'
]);
?>'); ?></code></pre>
                    </div>
                    <a href="?demo=colorful" class="demo-button">
                        <i class="fas fa-play"></i> Try This Demo
                    </a>
                </div>
            </div>

            <div class="tab-content" id="fluent">
                <div class="example-card">
                    <div class="example-header">Fluent Interface Configuration</div>
                    <div class="example-content">
                        <pre><code class="language-php"><?php echo htmlspecialchars('<?php
$loader = new LoadingPage();
$loader->setTitle(\'Professional App\')
       ->setSteps([
           \'System check...\',
           \'Loading components...\',
           \'Finalizing setup...\'
       ])
       ->setDuration(4500)
       ->setAnimationType(\'bar\')
       ->setColors(\'#2c3e50\', \'#ecf0f1\', \'#3498db\')
       ->showPercentage(true)
       ->setRedirectUrl(\'dashboard.php\')
       ->addCustomCSS(\'
           .loading-title { 
               text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
           }
       \')
       ->display();
?>'); ?></code></pre>
                    </div>
                    <a href="?demo=fluent" class="demo-button">
                        <i class="fas fa-play"></i> Try This Demo
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Documentation Section -->
    <section class="documentation" id="documentation">
        <div class="container">
            <h2 class="section-title">Documentation</h2>
            <div class="doc-grid">
                <div class="doc-card">
                    <h3>Configuration Options</h3>
                    <ul>
                        <li><strong>title</strong>: Main loading title text</li>
                        <li><strong>steps</strong>: Array of step messages</li>
                        <li><strong>duration</strong>: Total loading time (ms)</li>
                        <li><strong>animation_type</strong>: spinner, dots, bar, pulse</li>
                        <li><strong>background_color</strong>: Overlay background</li>
                        <li><strong>text_color</strong>: Text color</li>
                        <li><strong>accent_color</strong>: Animation color</li>
                        <li><strong>show_percentage</strong>: Display progress %</li>
                        <li><strong>auto_hide</strong>: Auto-hide when complete</li>
                        <li><strong>redirect_url</strong>: Redirect after loading</li>
                    </ul>
                </div>
                
                <div class="doc-card">
                    <h3>Available Methods</h3>
                    <ul>
                        <li><strong>setTitle()</strong>: Set loading title</li>
                        <li><strong>setSteps()</strong>: Configure loading steps</li>
                        <li><strong>setDuration()</strong>: Set total duration</li>
                        <li><strong>setAnimationType()</strong>: Choose animation</li>
                        <li><strong>setColors()</strong>: Configure color scheme</li>
                        <li><strong>setRedirectUrl()</strong>: Set redirect URL</li>
                        <li><strong>showPercentage()</strong>: Toggle percentage</li>
                        <li><strong>addCustomCSS()</strong>: Add custom styles</li>
                        <li><strong>addCustomJS()</strong>: Add custom scripts</li>
                        <li><strong>display()</strong>: Show loading page</li>
                    </ul>
                </div>
                
                <div class="doc-card">
                    <h3>JavaScript Events</h3>
                    <ul>
                        <li><strong>loadingComplete</strong>: Fired when loading finishes</li>
                    </ul>
                    <pre style="background: #0f172a; padding: 1rem; border-radius: 6px; margin-top: 1rem;"><code class="language-javascript">document.addEventListener('loadingComplete', function() {
    console.log('Loading finished!');
    // Your post-loading logic
});</code></pre>
                </div>
                
                <div class="doc-card">
                    <h3>Browser Support</h3>
                    <ul>
                        <li><strong>Chrome</strong>: 60+</li>
                        <li><strong>Firefox</strong>: 55+</li>
                        <li><strong>Safari</strong>: 12+</li>
                        <li><strong>Edge</strong>: 79+</li>
                        <li><strong>IE</strong>: 11+ (limited support)</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div>
                    <h3>LoadingPage Module</h3>
                    <p>Professional loading pages for PHP applications. Easy to integrate, fully customizable, and responsive.</p>
                </div>
                <div>
                    <h3>Quick Links</h3>
                    <ul style="list-style: none;">
                        <li><a href="#features">Features</a></li>
                        <li><a href="#examples">Examples</a></li>
                        <li><a href="#documentation">Documentation</a></li>
                        <li><a href="https://github.com">GitHub Repository</a></li>
                    </ul>
                </div>
                <div>
                    <h3>Resources</h3>
                    <ul style="list-style: none;">
                        <li><a href="LoadingPage.php">Download Module</a></li>
                        <li><a href="example.php">View Example</a></li>
                        <li><a href="#documentation">API Reference</a></li>
                        <li><a href="https://github.com">Report Issues</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 LoadingPage Module. Open source under MIT License.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
    <script>
        // Tab functionality
        document.querySelectorAll('.tab-button').forEach(button => {
            button.addEventListener('click', () => {
                const tabId = button.dataset.tab;
                
                // Remove active class from all buttons and contents
                document.querySelectorAll('.tab-button').forEach(b => b.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                
                // Add active class to clicked button and corresponding content
                button.classList.add('active');
                document.getElementById(tabId).classList.add('active');
            });
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Loading completion event listener
        document.addEventListener('loadingComplete', function() {
            console.log('LoadingPage showcase is ready!');
        });
    </script>

<?php
// Handle demo requests
if (isset($_GET['demo'])) {
    $demoType = $_GET['demo'];
    
    switch ($demoType) {
        case 'basic':
            echo '<script>setTimeout(() => {
                LoadingPage.show({
                    title: "Basic Loading Demo",
                    duration: 3000,
                    animation_type: "spinner"
                });
            }, 1000);</script>';
            break;
            
        case 'advanced':
            $advancedLoader = new LoadingPage([
                'title' => 'Advanced Demo',
                'steps' => [
                    'Connecting to database...',
                    'Loading user preferences...',
                    'Initializing modules...',
                    'Preparing interface...',
                    'Ready!'
                ],
                'duration' => 6000,
                'animation_type' => 'bar',
                'background_color' => '#1a1a2e',
                'text_color' => '#ffffff',
                'accent_color' => '#3b82f6',
                'show_percentage' => true
            ]);
            echo '<script>setTimeout(() => {';
            ob_start();
            $advancedLoader->display();
            $output = ob_get_clean();
            echo str_replace(['<style>', '</style>', '<div', '</div>', '<script>', '</script>'], '', $output);
            echo '}, 1000);</script>';
            break;
            
        case 'dark':
            $darkLoader = new LoadingPage([
                'title' => 'Dark Theme Demo',
                'steps' => ['Initializing...', 'Processing...', 'Complete!'],
                'duration' => 4000,
                'animation_type' => 'pulse',
                'background_color' => '#0f0f23',
                'text_color' => '#a0a0a0',
                'accent_color' => '#00d4aa',
                'show_percentage' => true
            ]);
            echo '<script>setTimeout(() => {';
            ob_start();
            $darkLoader->display();
            $output = ob_get_clean();
            echo str_replace(['<style>', '</style>', '<div', '</div>', '<script>', '</script>'], '', $output);
            echo '}, 1000);</script>';
            break;
            
        case 'colorful':
            $colorfulLoader = new LoadingPage([
                'title' => 'Colorful Demo',
                'steps' => ['Starting up...', 'Loading resources...', 'Almost ready!'],
                'duration' => 5000,
                'animation_type' => 'dots',
                'background_color' => '#ff6b6b',
                'text_color' => '#ffffff',
                'accent_color' => '#4ecdc4'
            ]);
            echo '<script>setTimeout(() => {';
            ob_start();
            $colorfulLoader->display();
            $output = ob_get_clean();
            echo str_replace(['<style>', '</style>', '<div', '</div>', '<script>', '</script>'], '', $output);
            echo '}, 1000);</script>';
            break;
            
        case 'fluent':
            $fluentLoader = new LoadingPage();
            $fluentLoader->setTitle('Fluent Interface Demo')
                        ->setSteps(['System check...', 'Loading components...', 'Finalizing setup...'])
                        ->setDuration(4500)
                        ->setAnimationType('bar')
                        ->setColors('#2c3e50', '#ecf0f1', '#3498db')
                        ->showPercentage(true);
            echo '<script>setTimeout(() => {';
            ob_start();
            $fluentLoader->display();
            $output = ob_get_clean();
            echo str_replace(['<style>', '</style>', '<div', '</div>', '<script>', '</script>'], '', $output);
            echo '}, 1000);</script>';
            break;
    }
}
?>

</body>
</html>
