<?php
// index.php - LoadingPage Module Demonstration

require_once '../LoadingPage.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoadingPage Example</title>
</head>
<body>

<?php
// Complete Configuration Example
$loader = new LoadingPage([
    'title' => 'Loading Application',
    'steps' => [
        'System initialization...',
        'Connecting to database...',
        'Loading modules...',
        'Preparing interface...',
        'Loading user data...',
        'Finalizing...'
    ],
    'duration' => 6000, // 6 seconds
    'animation_type' => 'bar', // spinner, dots, bar, pulse
    'background_color' => '#1a1a2e',
    'text_color' => '#eee',
    'accent_color' => '#16213e',
    'show_percentage' => true,
    'auto_hide' => true,
    'redirect_url' => null // or 'dashboard.php'
]);

$loader->display();
?>

<!-- Your page content that will be hidden during loading -->
<div style="padding: 2rem; font-family: Arial, sans-serif;">
    <h1>Welcome to Your Website!</h1>
    <p>This content will appear after the loading is complete.</p>
    
    <h2>LoadingPage Module Features:</h2>
    
    <h3>Key Features:</h3>
    <ul>
        <li><strong>4 Animation Types</strong>: spinner, dots, bar, pulse</li>
        <li><strong>Full Customization</strong>: colors, text, duration</li>
        <li><strong>Configurable Steps</strong>: as many steps as needed</li>
        <li><strong>Progress Percentage</strong>: can be enabled/disabled</li>
        <li><strong>Auto Redirect</strong>: to any URL after completion</li>
        <li><strong>Custom CSS/JS</strong>: for specific needs</li>
        <li><strong>Event System</strong>: 'loadingComplete' event dispatched at end</li>
        <li><strong>Fluent Methods</strong>: chainable configuration</li>
        <li><strong>Full Screen Overlay</strong>: covers entire viewport</li>
        <li><strong>Responsive Design</strong>: works on all devices</li>
    </ul>
    
    <h3>Easy Integration:</h3>
    <p>Simply include the LoadingPage.php file and use it with just one line:</p>
    <pre><code>LoadingPage::show();</code></pre>
    
    <h3>Configuration Options:</h3>
    <ul>
        <li><strong>title</strong>: Main loading title</li>
        <li><strong>steps</strong>: Array of step messages</li>
        <li><strong>duration</strong>: Total loading time in milliseconds</li>
        <li><strong>animation_type</strong>: spinner, dots, bar, or pulse</li>
        <li><strong>background_color</strong>: Overlay background color</li>
        <li><strong>text_color</strong>: Text color</li>
        <li><strong>accent_color</strong>: Animation and progress color</li>
        <li><strong>show_percentage</strong>: Display loading percentage</li>
        <li><strong>auto_hide</strong>: Automatically hide when complete</li>
        <li><strong>redirect_url</strong>: URL to redirect after loading</li>
    </ul>
    
    <h3>JavaScript Integration:</h3>
    <p>Listen for the loading completion event:</p>
    <pre><code>document.addEventListener('loadingComplete', function() {
    console.log('Loading finished!');
    // Your post-loading logic here
});</code></pre>
    
    <h3>Browser Compatibility:</h3>
    <p>Works on all modern browsers including Chrome 60+, Firefox 55+, Safari 12+, Edge 79+, and Internet Explorer 11+.</p>
</div>

<script>
// Example of listening to the loading completion event
document.addEventListener('loadingComplete', function() {
    console.log('Loading is complete!');
    // Here you can add your post-loading logic
});
</script>

</body>
</html>
