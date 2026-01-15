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

1. Upload the `uniud_swiper_formatter` folder to your `/modules/custom` directory.
2. Enable the module via the Admin UI or Drush:
   `drush en uniud_swiper_formatter`

## Installation via Composer

Since this module is hosted on GitHub, you need to add the repository to your project's `composer.json` before installing it.

1. Open your project's `composer.json` and add the following:
```json
"repositories": [
    {
        "type": "vcs",
        "url": "[https://github.com/FrancoUd/uniud_swiper_formatter](https://github.com/FrancoUd/uniud_swiper_formatter)"
    }
],
```
2. Run the composer command to require the module:

`composer require francoud/uniud_swiper_formatter:dev-main`

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