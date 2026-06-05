# ALP Astrology — WordPress Installation Guide

This directory contains the complete WordPress theme, plugin, and Elementor templates for the ALP Astrology website.

---

## Directory Structure

```
wordpress/
├── themes/
│   └── alp-astrology/          ← Upload to wp-content/themes/
│       ├── style.css           ← Theme declaration + all CSS
│       ├── functions.php       ← Theme setup, enqueues, AJAX handlers
│       ├── header.php          ← Sticky header with nav + dropdown
│       ├── footer.php          ← Footer with social row + floating WA button
│       ├── front-page.php      ← Full home page (static PHP template)
│       ├── page.php            ← Inner page template (page-hero + content)
│       ├── index.php           ← Blog / archive template
│       ├── templates/
│       │   └── elementor-full.php  ← Elementor Full Width page template
│       └── assets/
│           ├── js/
│           │   └── alp-main.js ← All interactive JS
│           └── images/         ← Place your images here (see mapping below)
├── plugins/
│   └── alp-setup/
│       └── alp-setup.php       ← Setup wizard plugin
└── elementor-templates/
    ├── home-page.json          ← Elementor page template for home
    └── elementor-kit.json      ← Elementor global design kit
```

---

## Required Plugins

Install and activate these plugins before running setup:

| Plugin | Version | Required / Optional | Purpose |
|---|---|---|---|
| **Elementor** | 3.x+ | Required | Page builder |
| **Elementor Pro** | 3.x+ | Recommended | Pro widgets, theme builder |
| **Contact Form 7** | Latest | Optional | Alternative contact forms |
| **WPForms Lite** | Latest | Optional | Alternative contact forms |
| **Yoast SEO** | Latest | Recommended | SEO meta tags |
| **WP Fastest Cache** | Latest | Recommended | Page caching |
| **Smush** | Latest | Recommended | Image optimisation |
| **UpdraftPlus** | Latest | Recommended | Backups |

---

## Step-by-Step Installation

### Step 1 — Upload the Theme

1. Go to **Appearance → Themes → Add New → Upload Theme**
2. Upload the `alp-astrology` folder as a ZIP, or via FTP copy `themes/alp-astrology/` to `wp-content/themes/`
3. Click **Activate**

### Step 2 — Install Required Plugins

1. Go to **Plugins → Add New**
2. Search for and install: **Elementor**, **Yoast SEO**, **WP Fastest Cache**, **Smush**
3. Activate all installed plugins

### Step 3 — Upload the ALP Setup Plugin

1. Go to **Plugins → Add New → Upload Plugin**
2. Upload the `alp-setup` folder as a ZIP, or via FTP copy `plugins/alp-setup/` to `wp-content/plugins/`
3. Click **Activate**

### Step 4 — Run Setup Wizard

1. Go to **Settings → ALP Setup**
2. Click **"Run Setup"**

This will:
- Create all required pages (Home, About, Courses, Consultation, Services, Contact, Horoscope, Articles, Videos, Events, Testimonials, FAQ, Success Stories, Privacy Policy, Terms of Use)
- Set the Home page as the static front page in Settings → Reading
- Register ALP brand colors in Elementor's global color palette
- Register ALP fonts in Elementor's global typography

### Step 5 — Import Elementor Kit (Global Design System)

1. In WordPress admin go to **Elementor → Tools → Import Kit** (or via Elementor Kit Library)
2. Click **"Import"** and select `elementor-templates/elementor-kit.json`
3. In the import screen, check **"Colors"** and **"Typography"** and click **Apply**

This sets all brand colors and fonts as Elementor globals throughout the site.

### Step 6 — Import the Home Page Template

1. Go to **Templates → Saved Templates → Import Templates** (Elementor menu)
2. Select `elementor-templates/home-page.json`
3. Once imported, open the **Home** page with Elementor
4. Insert the imported template sections
5. Update the hero background image to your uploaded hero image

### Step 7 — Upload Images to Media Library

Upload all images to **Media → Add New**. See the image mapping below.

### Step 8 — Configure Reading Settings (verify)

1. Go to **Settings → Reading**
2. Confirm **"Your homepage displays"** is set to **"A static page"**
3. Confirm **Homepage** is set to **"Home"**

### Step 9 — Set Up Navigation Menu

1. Go to **Appearance → Menus**
2. Create a menu named "Primary" and assign it to the **Primary Navigation** location
3. Add all top-level pages: Home, About, Courses, Consultation, Services, Contact
4. Add a "Resources" custom link (URL: #) as parent
5. Under Resources, add child pages: Horoscope, Articles, Videos, Events, Testimonials, FAQ, Success Stories

### Step 10 — Upload Logo

1. Go to **Appearance → Customize → Site Identity**
2. Upload your ALP Astrology logo
3. The theme will use this as the header logo automatically

---

## Image Asset Mapping

Place images in `themes/alp-astrology/assets/images/` OR upload to WordPress Media Library and update the image URLs in the Elementor editor.

| File Path | Used In | Recommended Size |
|---|---|---|
| `assets/images/alp-logo.webp` | Header & Footer (fallback) | 200×200 px |
| `assets/images/hero-bg.jpg` | Home hero background | 1920×1080 px |
| `assets/images/banner-bg.jpg` | Inner page hero default | 1920×600 px |
| `assets/images/alp-founder.jpg` | Who We Are section | 800×600 px |
| `assets/images/courses-feature.jpg` | Courses section | 800×600 px |
| `assets/images/consultation-feature.jpg` | Consultation section | 800×600 px |
| `assets/images/testimonial-avatar.jpg` | Testimonial quote | 120×120 px |
| `assets/images/banners/aries.jpg` | Aries horoscope page hero | 1920×600 px |
| `assets/images/banners/taurus.jpg` | Taurus horoscope page | 1920×600 px |
| `assets/images/banners/gemini.jpg` | Gemini horoscope page | 1920×600 px |
| `assets/images/banners/cancer.jpg` | Cancer horoscope page | 1920×600 px |
| `assets/images/banners/leo.jpg` | Leo horoscope page | 1920×600 px |
| `assets/images/banners/virgo.jpg` | Virgo horoscope page | 1920×600 px |
| `assets/images/banners/libra.jpg` | Libra horoscope page | 1920×600 px |
| `assets/images/banners/scorpio.jpg` | Scorpio horoscope page | 1920×600 px |
| `assets/images/banners/sagittarius.jpg` | Sagittarius page | 1920×600 px |
| `assets/images/banners/capricorn.jpg` | Capricorn page | 1920×600 px |
| `assets/images/banners/aquarius.jpg` | Aquarius page | 1920×600 px |
| `assets/images/banners/pisces.jpg` | Pisces page | 1920×600 px |

---

## Plugin Configuration Notes

### Elementor
- After activating, go to **Elementor → Settings** and enable **"Optimized DOM Output"** and **"Improved CSS Loading"** for performance
- Set **"Default Generic Fonts"** to `Helvetica Neue, Helvetica, Arial, sans-serif`
- Under **Experiments**, enable any features you need (Flexbox Container, etc.)

### Yoast SEO
- Run the **Yoast Setup Wizard** for basic configuration
- Set the site name to **"ALP Astrology"**
- Upload a social/OG image (recommended 1200×630)

### WP Fastest Cache
- Enable caching after the site is fully configured
- Add exceptions for AJAX and WooCommerce pages if needed

### Smush
- Run **"Bulk Smush"** after uploading all images
- Enable **WebP Conversion** for best performance

### Contact Form 7 (if used instead of built-in AJAX form)
- The built-in `front-page.php` uses the custom AJAX handler
- For CF7: create a form and replace the `<form id="alpContactForm">` block with the CF7 shortcode
- Style CF7 output to match using the `.field`, `.field input`, `.field textarea` CSS classes already in the stylesheet

---

## Contact Details (for reference)

- **Phone / WhatsApp:** +91 9786556156
- **WhatsApp Link:** https://wa.me/919786556156
- **Email:** alpastrology@gmail.com
- **Office Email:** alpastrologyoffice@gmail.com
- **Address:** F2, 1st Floor, Shiva Homes, Moulivakkam, Chennai 600116

---

## Brand Colors Reference

| Variable | Hex | Usage |
|---|---|---|
| `--saffron` | `#F4A11C` | Primary gold, buttons |
| `--saffron-deep` | `#E07A12` | Hover states |
| `--amber` | `#F6B53C` | Accents, hero eyebrow |
| `--gold-pale` | `#FBE6C4` | Backgrounds |
| `--red` | `#E11D17` | ALP brand red, CTA buttons |
| `--red-deep` | `#BC1411` | Red hover |
| `--ink` | `#1C1813` | Body text, headings |
| `--bg` | `#FFFCF6` | Page background |
| `--bg-cream` | `#FBF4E7` | Section alternating bg |
| `--bg-deep` | `#0A0E27` | Dark cosmic sections |
| `--cos-gold` | `#E8C36B` | Cosmic/dark-bg gold text |

---

## Troubleshooting

**Header not sticky after activating Elementor:** Ensure the page template is NOT set to "Elementor Canvas". Use "Elementor Full Width" or the default template.

**Fonts not loading:** Check that the Google Fonts enqueue in `functions.php` is not blocked by a privacy/GDPR plugin. If needed, self-host the fonts and update the `wp_enqueue_style` URL.

**Contact form not submitting:** Verify the `alp_nonce` is being generated — check browser console for the `alpData` JS object. Ensure `wp_localize_script` is running.

**Images showing placeholder (gradient):** The `.media.ph` class shows a gradient placeholder when no image is present. Upload images to WordPress Media Library and set them in the Elementor editor.

**"Run Setup" created duplicate pages:** The setup script checks for existing slugs before creating pages, so duplicates should not occur. If they do, delete the extra pages from Pages → All Pages.
