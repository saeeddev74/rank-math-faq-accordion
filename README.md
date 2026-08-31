# Convert Rank Math FAQ Block to Modern Accordion (SEO & Dark Mode Ready) ⚡

[![WordPress Compatibility](https://img.shields.io/badge/WordPress-5.0%2B-21759B?style=for-the-badge&logo=wordpress&logoColor=white)](https://wordpress.org)
[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Rank Math Compatible](https://img.shields.io/badge/Rank%20Math-Compatible-blueviolet?style=for-the-badge)](https://rankmath.com)
[![Zero Dependencies](https://img.shields.io/badge/Dependencies-Zero%20(Vanilla)-success?style=for-the-badge)](https://github.com/saeedmoradi)
[![License: GPL v2+](https://img.shields.io/badge/License-GPLv2%2B-orange?style=for-the-badge)](LICENSE)

An ultra-lightweight, zero-dependency WordPress solution to **transform static Rank Math FAQ Schema blocks into accessible, animated, interactive accordions** with automatic Dark Mode support.

---

## 🎯 Why Use This Snippet/Plugin?

By default, the [Rank Math SEO](https://rankmath.com/) FAQ Gutenberg block displays questions and answers as a plain, static list. While great for Schema markup, it lacks user engagement and takes up excessive vertical space on mobile devices.

This solution turns any Rank Math FAQ block into an **interactive accordion** with:
- **0 Extra HTTP Requests:** Inlined critical CSS & Vanilla JS.
- **Pure CSS Grid Transitions:** Smooth height calculation without layout shifts (CLS = 0).
- **Preserved SEO Schema:** 100% compliant with Rank Math JSON-LD FAQPage Schema.

---

## 🚀 Key Features

* **⚡ Zero External Dependencies:** No jQuery, no third-party libraries, purely Vanilla JavaScript & CSS Custom Properties.
* **🌓 Dual Dark Mode Support:** Automatically detects OS settings (`prefers-color-scheme: dark`) and integrates with theme toggles (`.dark`, `body.dark`, `[data-theme="dark"]`).
* **🔒 Single-Open Accordion Logic:** Opening one question automatically collapses any other open item in that block.
* **♿ Full A11y & Keyboard Navigation:** Supports `Tab`, `Enter`, `Space`, and includes dynamic `aria-expanded` attributes.
* **🌐 RTL & LTR Friendly:** Uses CSS logical properties (`margin-inline-start`) for seamless Persian, Arabic, and English typography.
* **📱 Mobile First & Performance Tuned:** Lightweight payload (< 3 KB) with smooth 60fps animations.

---

## 📦 How to Install

### Method 1: Drop into `functions.php` (Quickest)
1. Open your active child theme's `functions.php` file.
2. Copy and paste the entire code from [`rankmath-faq-accordion.php`](./rankmath-faq-accordion.php) at the end of the file.
3. Save changes.

### Method 2: Use as a Standalone Plugin
1. Download or clone this repository.
2. Place the folder inside `wp-content/plugins/rank-math-faq-accordion/`.
3. Go to **WordPress Dashboard > Plugins** and click **Activate**.

---

## 🛠️ Customization with CSS Variables

Customize colors, spacing, and border radiuses without editing core logic by adding these variables to your stylesheet:
```css
:root {
--rm-faq-bg: #ffffff;             /* Accordion card background */
--rm-faq-header-bg: #f8fafc;      /* Question bar background */
--rm-faq-header-hover: #f1f5f9;   /* Question bar hover state */
--rm-faq-border: #e2e8f0;         /* Border color */
--rm-faq-title: #0f172a;          /* Question text color */
--rm-faq-content: #475569;        /* Answer text color */
--rm-faq-primary: #3b82f6;        /* Accent / Active icon color */
--rm-faq-radius: 12px;            /* Border radius */
}
