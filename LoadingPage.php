<?php
/**
 * LoadingPage - Configurable Loading Page Module
 * 
 * Creates customizable loading pages with animations,
 * configurable text and multi-step loading process.
 * 
 * @author Your Name
 * @version 1.0
 */

class LoadingPage {
    
    private $config = [
        'title' => 'Loading...',
        'steps' => [
            'Initializing...',
            'Loading data...',
            'Finalizing...'
        ],
        'duration' => 3000, // Total duration in milliseconds
        'animation_type' => 'spinner', // spinner, dots, bar, pulse
        'background_color' => '#1a1a1a',
        'text_color' => '#ffffff',
        'accent_color' => '#007bff',
        'redirect_url' => null,
        'auto_hide' => true,
        'show_percentage' => true,
        'custom_css' => '',
        'custom_js' => ''
    ];
    
    /**
     * Constructor
     * @param array $options Custom configuration
     */
    public function __construct($options = []) {
        $this->config = array_merge($this->config, $options);
    }
    
    /**
     * Set the loading page title
     * @param string $title
     * @return LoadingPage
     */
    public function setTitle($title) {
        $this->config['title'] = $title;
        return $this;
    }
    
    /**
     * Set the loading steps
     * @param array $steps
     * @return LoadingPage
     */
    public function setSteps($steps) {
        $this->config['steps'] = $steps;
        return $this;
    }
    
    /**
     * Set the total loading duration
     * @param int $duration Duration in milliseconds
     * @return LoadingPage
     */
    public function setDuration($duration) {
        $this->config['duration'] = $duration;
        return $this;
    }
    
    /**
     * Set the animation type
     * @param string $type spinner, dots, bar, pulse
     * @return LoadingPage
     */
    public function setAnimationType($type) {
        $this->config['animation_type'] = $type;
        return $this;
    }
    
    /**
     * Set the color scheme
     * @param string $background
     * @param string $text
     * @param string $accent
     * @return LoadingPage
     */
    public function setColors($background, $text, $accent) {
        $this->config['background_color'] = $background;
        $this->config['text_color'] = $text;
        $this->config['accent_color'] = $accent;
        return $this;
    }
    
    /**
     * Set the redirect URL after loading
     * @param string $url
     * @return LoadingPage
     */
    public function setRedirectUrl($url) {
        $this->config['redirect_url'] = $url;
        return $this;
    }
    
    /**
     * Enable/disable automatic hiding
     * @param bool $autoHide
     * @return LoadingPage
     */
    public function setAutoHide($autoHide) {
        $this->config['auto_hide'] = $autoHide;
        return $this;
    }
    
    /**
     * Show/hide percentage display
     * @param bool $show
     * @return LoadingPage
     */
    public function showPercentage($show) {
        $this->config['show_percentage'] = $show;
        return $this;
    }
    
    /**
     * Add custom CSS
     * @param string $css
     * @return LoadingPage
     */
    public function addCustomCSS($css) {
        $this->config['custom_css'] = $css;
        return $this;
    }
    
    /**
     * Add custom JavaScript
     * @param string $js
     * @return LoadingPage
     */
    public function addCustomJS($js) {
        $this->config['custom_js'] = $js;
        return $this;
    }
    
    /**
     * Generate the loading page CSS
     * @return string
     */
    private function generateCSS() {
        $css = "
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            #loading-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: " . $this->config['background_color'] . ";
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                z-index: 9999;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: " . $this->config['text_color'] . ";
                transition: opacity 0.5s ease-out;
            }
            
            .loading-content {
                text-align: center;
                max-width: 500px;
                padding: 2rem;
            }
            
            .loading-title {
                font-size: 2rem;
                font-weight: 300;
                margin-bottom: 2rem;
                opacity: 0.9;
            }
            
            .loading-animation {
                margin: 2rem 0;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            
            /* Spinner Animation */
            .spinner {
                width: 60px;
                height: 60px;
                border: 4px solid rgba(255,255,255,0.1);
                border-left: 4px solid " . $this->config['accent_color'] . ";
                border-radius: 50%;
                animation: spin 1s linear infinite;
            }
            
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            
            /* Dots Animation */
            .dots {
                display: flex;
                gap: 8px;
            }
            
            .dots .dot {
                width: 12px;
                height: 12px;
                background: " . $this->config['accent_color'] . ";
                border-radius: 50%;
                animation: bounce 1.4s ease-in-out infinite both;
            }
            
            .dots .dot:nth-child(1) { animation-delay: -0.32s; }
            .dots .dot:nth-child(2) { animation-delay: -0.16s; }
            .dots .dot:nth-child(3) { animation-delay: 0s; }
            
            @keyframes bounce {
                0%, 80%, 100% { transform: scale(0); }
                40% { transform: scale(1); }
            }
            
            /* Progress Bar Animation */
            .progress-bar {
                width: 300px;
                height: 4px;
                background: rgba(255,255,255,0.1);
                border-radius: 2px;
                overflow: hidden;
                position: relative;
            }
            
            .progress-fill {
                height: 100%;
                background: linear-gradient(90deg, " . $this->config['accent_color'] . ", #fff);
                border-radius: 2px;
                width: 0%;
                transition: width 0.3s ease;
            }
            
            /* Pulse Animation */
            .pulse {
                width: 80px;
                height: 80px;
                background: " . $this->config['accent_color'] . ";
                border-radius: 50%;
                animation: pulse 2s ease-in-out infinite;
            }
            
            @keyframes pulse {
                0% { transform: scale(1); opacity: 1; }
                50% { transform: scale(1.2); opacity: 0.7; }
                100% { transform: scale(1); opacity: 1; }
            }
            
            .loading-step {
                font-size: 1.1rem;
                margin: 1rem 0;
                opacity: 0.8;
                min-height: 1.5rem;
                transition: opacity 0.3s ease;
            }
            
            .loading-percentage {
                font-size: 3rem;
                font-weight: 200;
                color: " . $this->config['accent_color'] . ";
                margin: 1rem 0;
            }
            
            .fade-out {
                opacity: 0 !important;
            }
            
            " . $this->config['custom_css'] . "
        </style>";
        
        return $css;
    }
    
    /**
     * Generate animation based on selected type
     * @return string
     */
    private function generateAnimation() {
        switch ($this->config['animation_type']) {
            case 'dots':
                return '<div class="dots"><div class="dot"></div><div class="dot"></div><div class="dot"></div></div>';
            case 'bar':
                return '<div class="progress-bar"><div class="progress-fill" id="progress-fill"></div></div>';
            case 'pulse':
                return '<div class="pulse"></div>';
            default:
                return '<div class="spinner"></div>';
        }
    }
    
    /**
     * Generate the loading page JavaScript
     * @return string
     */
    private function generateJS() {
        $steps = json_encode($this->config['steps']);
        $duration = $this->config['duration'];
        $redirectUrl = $this->config['redirect_url'] ? "'" . $this->config['redirect_url'] . "'" : 'null';
        $autoHide = $this->config['auto_hide'] ? 'true' : 'false';
        $showPercentage = $this->config['show_percentage'] ? 'true' : 'false';
        
        $js = "
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const steps = $steps;
                const duration = $duration;
                const redirectUrl = $redirectUrl;
                const autoHide = $autoHide;
                const showPercentage = $showPercentage;
                
                const stepElement = document.getElementById('loading-step');
                const percentageElement = document.getElementById('loading-percentage');
                const progressFill = document.getElementById('progress-fill');
                const overlay = document.getElementById('loading-overlay');
                
                let currentStep = 0;
                let currentPercentage = 0;
                
                const stepDuration = duration / steps.length;
                
                function updateStep() {
                    if (currentStep < steps.length) {
                        stepElement.textContent = steps[currentStep];
                        currentStep++;
                        setTimeout(updateStep, stepDuration);
                    }
                }
                
                function updatePercentage() {
                    const interval = setInterval(() => {
                        if (currentPercentage < 100) {
                            currentPercentage += 1;
                            if (showPercentage && percentageElement) {
                                percentageElement.textContent = currentPercentage + '%';
                            }
                            if (progressFill) {
                                progressFill.style.width = currentPercentage + '%';
                            }
                        } else {
                            clearInterval(interval);
                            finishLoading();
                        }
                    }, duration / 100);
                }
                
                function finishLoading() {
                    setTimeout(() => {
                        if (autoHide) {
                            overlay.classList.add('fade-out');
                            setTimeout(() => {
                                overlay.style.display = 'none';
                                if (redirectUrl) {
                                    window.location.href = redirectUrl;
                                }
                            }, 500);
                        } else if (redirectUrl) {
                            window.location.href = redirectUrl;
                        }
                        
                        // Dispatch custom event to signal loading completion
                        const event = new CustomEvent('loadingComplete');
                        document.dispatchEvent(event);
                        
                    }, 500);
                }
                
                // Start animations
                updateStep();
                updatePercentage();
                
                " . $this->config['custom_js'] . "
            });
        </script>";
        
        return $js;
    }
    
    /**
     * Display the loading page
     */
    public function display() {
        echo $this->generateCSS();
        echo '<div id="loading-overlay">';
        echo '<div class="loading-content">';
        echo '<h1 class="loading-title">' . htmlspecialchars($this->config['title']) . '</h1>';
        echo '<div class="loading-animation">' . $this->generateAnimation() . '</div>';
        
        if ($this->config['show_percentage']) {
            echo '<div class="loading-percentage" id="loading-percentage">0%</div>';
        }
        
        echo '<div class="loading-step" id="loading-step"></div>';
        echo '</div>';
        echo '</div>';
        echo $this->generateJS();
    }
    
    /**
     * Static method for quick display
     * @param array $options
     */
    public static function show($options = []) {
        $loader = new self($options);
        $loader->display();
    }
    
    /**
     * Manually hide the loading page
     */
    public static function hide() {
        echo "<script>
            const overlay = document.getElementById('loading-overlay');
            if (overlay) {
                overlay.classList.add('fade-out');
                setTimeout(() => overlay.style.display = 'none', 500);
            }
        </script>";
    }
}
?>
