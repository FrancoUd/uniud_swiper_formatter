# UniUD Swiper Formatter

A lightweight and flexible Drupal field formatter for image fields using the Swiper.js library. This module allows you to transform any multi-value image field into a modern, touch-enabled slideshow with captions and links.

## Features

- **Touch-ready**: Fully compatible with mobile devices and touch gestures.
- **Dynamic Captions**: Automatically uses the image Alt text as a styled overlay caption.
- **Image Links**: Uses the image Title field to wrap slides in clickable links.
- **Flexible Layout**: Handles images of different orientations without cropping issues.
- **Configurable**: Settings for transition effects (Slide, Fade, Cube, Coverflow, Flip), autoplay, speed, and loop.
- **Modern JS**: Uses Vanilla JavaScript and Drupal Core `once()` library (no jQuery dependency).

## Requirements

This module requires the core **Image** module. It fetches the [Swiper.js](https://swiperjs.com/) library via CDN (jsDelivr) by default.


## Installation

### With Composer

Since this module is currently hosted on GitHub, you can install it by following these steps:

1. **Add the GitHub repository** to your Drupal project:
   `composer config repositories.uniud-swiper vcs https://github.com/FrancoUd/uniud_swiper_formatter`

2. **Download the module**:
   `composer require francoud/uniud_swiper_formatter:dev-main`

3. **Enable the module**:
   `drush en uniud_swiper_formatter`

### Without Composer (Manual)

1. Download the source code from GitHub as a ZIP file.
2. Extract it into your Drupal installation under the `/modules/custom` directory.
3. **Important**: Ensure the folder name is exactly `uniud_swiper_formatter`.
4. Enable the module via the Drupal admin interface (**Extend**).

## Uninstallation
To completely remove the module and its repository reference from your project, follow these steps:

1. **Uninstall the module** in Drupal (via Admin UI or Drush):
   `drush pmu uniud_swiper_formatter -y`

2. **Remove the module files** using Composer:
   `composer remove francoud/uniud_swiper_formatter`

3. **Remove the GitHub repository reference** from your composer.json:
   `composer config --unset repositories.uniud-swiper`

## Configuration

### Prepare the Image Field

1. Go to **Structure > Content types > [Your Content Type] > Manage fields**.
2. Edit your Image field settings.
3. Ensure that both **Alt field** and **Title field** are enabled.
4. *Note: The Alt text will be used for captions, and the Title field for the link URL.*

### Set the Formatter

1. Go to the **Manage display** tab of your content type.
2. For your image field, select **UniUD Swiper Slideshow** from the Format drop-down menu.
3. Click the gear icon to configure transition effects, speed, and autoplay settings.

### Field Labels Automation

The module automatically renames "Alt text" to **"Slide Caption"** and "Title" to **"Slide Link URL"** in the content edit form, but only if the Swiper formatter is active for that field.

## Theming and Customization

The module provides a default Twig template: `templates/swiper-image-formatter.html.twig`. You can override this in your theme to customize the HTML structure.

To change the appearance of the captions or navigation buttons, you can override the CSS classes in your theme's stylesheet:
- `.swiper-caption`: The overlay text container.
- `.slide-inner`: The wrapper for image and caption.

## Credits

This module was produced and sponsored by the **University of Udine** (Università degli Studi di Udine).

## Maintainers

- **Francesco Brunetta**
  - Institutional: [francesco.brunetta@uniud.it](mailto:francesco.brunetta@uniud.it)
  - Personal: [franco.brunetta@gmail.com](mailto:franco.brunetta@gmail.com)

## License

This project is licensed under the **GPL-2.0-or-later** license. The Swiper.js library is licensed under **MIT**.
