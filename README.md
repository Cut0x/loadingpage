# LoadingPage PHP Module

A comprehensive and highly customizable PHP module for creating animated loading pages that cover the entire screen. Perfect for applications that need to show loading states during initialization, data processing, or page transitions.

## Features

- **Full-screen overlay**: Takes up the entire viewport during loading
- **Multiple animation types**: Spinner, bouncing dots, progress bar, and pulse animations
- **Fully customizable**: Configure colors, text, duration, and steps
- **Multi-step loading**: Show different messages during loading phases
- **Progress tracking**: Optional percentage display
- **Auto-redirect**: Automatically redirect to another page after loading
- **Event system**: Listen for loading completion events
- **Responsive design**: Works on all screen sizes
- **Easy integration**: Simple PHP class with fluent interface

## Installation

Simply include the `LoadingPage.php` file in your project:

```php
require_once 'LoadingPage.php';
```

## Quick Start

### Basic Usage

```php
// Simple loading page
LoadingPage::show();

// With basic configuration
LoadingPage::show([
    'title' => 'Loading Application...',
    'duration' => 3000,
    'animation_type' => 'spinner'
]);
```

### Advanced Configuration

```php
$loader = new LoadingPage([
    'title' => 'Application Loading',
    'steps' => [
        'Connecting to database...',
        'Loading modules...',
        'Preparing interface...',
        'Finalizing...'
    ],
    'duration' => 5000,
    'animation_type' => 'bar',
    'background_color' => '#1a1a2e',
    'text_color' => '#ffffff',
    'accent_color' => '#3498db',
    'show_percentage' => true,
    'redirect_url' => 'dashboard.php'
]);

$loader->display();
```

### Fluent Interface

```php
$loader = new LoadingPage();
$loader->setTitle('My Application')
       ->setSteps(['Starting...', 'Loading resources...', 'Ready!'])
       ->setDuration(4000)
       ->setAnimationType('pulse')
       ->setColors('#2c3e50', '#ecf0f1', '#e74c3c')
       ->showPercentage(true)
       ->display();
```

## Configuration Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `title` | string | 'Loading...' | Main title displayed during loading |
| `steps` | array | ['Initializing...', 'Loading data...', 'Finalizing...'] | Array of step messages |
| `duration` | int | 3000 | Total loading duration in milliseconds |
| `animation_type` | string | 'spinner' | Animation type: 'spinner', 'dots', 'bar', 'pulse' |
| `background_color` | string | '#1a1a1a' | Background color of the overlay |
| `text_color` | string | '#ffffff' | Color of the text |
| `accent_color` | string | '#007bff' | Color of the animation and progress elements |
| `redirect_url` | string | null | URL to redirect to after loading completes |
| `auto_hide` | bool | true | Whether to automatically hide the loading page |
| `show_percentage` | bool | true | Whether to display loading percentage |
| `custom_css` | string | '' | Additional CSS to include |
| `custom_js` | string | '' | Additional JavaScript to include |

## Animation Types

### Spinner
Classic rotating spinner animation.

### Dots
Three bouncing dots animation.

### Bar
Horizontal progress bar that fills up during loading.

### Pulse
Pulsating circle animation.

## Methods

### Configuration Methods

- `setTitle(string $title)` - Set the loading title
- `setSteps(array $steps)` - Set the loading steps
- `setDuration(int $duration)` - Set total duration in milliseconds
- `setAnimationType(string $type)` - Set animation type
- `setColors(string $background, string $text, string $accent)` - Set color scheme
- `setRedirectUrl(string $url)` - Set redirect URL after loading
- `setAutoHide(bool $autoHide)` - Enable/disable auto-hide
- `showPercentage(bool $show)` - Show/hide percentage display
- `addCustomCSS(string $css)` - Add custom CSS
- `addCustomJS(string $js)` - Add custom JavaScript

### Display Methods

- `display()` - Display the loading page
- `show(array $options)` - Static method for quick display
- `hide()` - Static method to manually hide the loading page

## JavaScript Events

The module dispatches a custom event when loading is complete:

```javascript
document.addEventListener('loadingComplete', function() {
    console.log('Loading finished!');
    // Your post-loading logic here
});
```

## Examples

### Dark Theme

```php
$loader = new LoadingPage([
    'title' => 'Loading Application',
    'steps' => ['Connecting...', 'Syncing...', 'Ready!'],
    'duration' => 4000,
    'animation_type' => 'dots',
    'background_color' => '#0f0f23',
    'text_color' => '#a0a0a0',
    'accent_color' => '#00d4aa'
]);
$loader->display();
```

### Progress Bar with Percentage

```php
$loader = new LoadingPage();
$loader->setTitle('Processing Data')
       ->setAnimationType('bar')
       ->setDuration(6000)
       ->showPercentage(true)
       ->setRedirectUrl('results.php')
       ->display();
```

### Custom Styling

```php
$loader = new LoadingPage([
    'title' => 'Custom Loading',
    'animation_type' => 'pulse',
    'custom_css' => '
        .loading-title { 
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            font-family: "Arial Black", sans-serif;
        }
    '
]);
$loader->display();
```

## Browser Compatibility

- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+
- Internet Explorer 11+ (with some limitations)

## Requirements

- PHP 5.6 or higher
- No external dependencies

## License

This project is open source and available under the MIT License.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## Changelog

### Version 1.0.0
- Initial release
- Four animation types
- Full customization options
- Event system
- Responsive design
