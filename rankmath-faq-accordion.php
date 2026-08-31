<?php
/**
 * Plugin Name:       Rank Math FAQ Accordion (Pure CSS & Dark Mode)
 * Plugin URI:        https://github.com/saeeddev74/rank-math-faq-accordion
 * Description:       Convert Rank Math FAQ Schema Gutenberg blocks into lightweight, accessible, zero-dependency accordions with native Dark Mode support.
 * Version:           1.0.0
 * Requires at least: 5.0
 * Requires PHP:      7.4
 * Author:            Saeed Moradi
 * Author URI:        https://saeedmoradi.ir
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       rank-math-faq-accordion
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_footer', function () {
    ?>
    <style id="rm-faq-accordion-style">
        /* --- متغیرهای رنگی و استایل در حالت لایت و دارک --- */
        :root {
            --rm-faq-bg: #ffffff;
            --rm-faq-header-bg: #f8fafc;
            --rm-faq-header-hover: #f1f5f9;
            --rm-faq-border: #e2e8f0;
            --rm-faq-border-hover: #cbd5e1;
            --rm-faq-title: #0f172a;
            --rm-faq-content: #475569;
            --rm-faq-primary: #3b82f6;
            --rm-faq-radius: 12px;
            --rm-faq-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            --rm-faq-shadow-active: 0 4px 6px -1px rgba(0, 0, 0, 0.07), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
        }

        /* پشتیبانی از Dark Mode (بر اساس سیستم‌عامل کاربر یا کلاس dark در تگ html/body) */
        @media (prefers-color-scheme: dark) {
            :root {
                --rm-faq-bg: #0f172a;
                --rm-faq-header-bg: #1e293b;
                --rm-faq-header-hover: #334155;
                --rm-faq-border: #334155;
                --rm-faq-border-hover: #475569;
                --rm-faq-title: #f8fafc;
                --rm-faq-content: #94a3b8;
                --rm-faq-primary: #60a5fa;
                --rm-faq-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.3);
                --rm-faq-shadow-active: 0 4px 12px 0 rgba(0, 0, 0, 0.4);
            }
        }

        html.dark, body.dark, [data-theme="dark"] {
            --rm-faq-bg: #0f172a;
            --rm-faq-header-bg: #1e293b;
            --rm-faq-header-hover: #334155;
            --rm-faq-border: #334155;
            --rm-faq-border-hover: #475569;
            --rm-faq-title: #f8fafc;
            --rm-faq-content: #94a3b8;
            --rm-faq-primary: #60a5fa;
            --rm-faq-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.3);
            --rm-faq-shadow-active: 0 4px 12px 0 rgba(0, 0, 0, 0.4);
        }

        /* کانتینر اصلی لیست */
        .rank-math-block {
            margin: 2rem 0 !important;
            padding: 0 !important;
            list-style: none !important;
        }

        /* کارت آکاردئون */
        .rank-math-block .rank-math-list-item {
            background-color: var(--rm-faq-bg) !important;
            border: 1px solid var(--rm-faq-border) !important;
            border-radius: var(--rm-faq-radius) !important;
            margin: 0 0 14px 0 !important;
            padding: 0 !important;
            list-style: none !important;
            overflow: hidden !important;
            box-shadow: var(--rm-faq-shadow) !important;
            transition: border-color 0.25s cubic-bezier(0.4, 0, 0.2, 1),
            box-shadow 0.25s cubic-bezier(0.4, 0, 0.2, 1),
            background-color 0.25s ease !important;
        }

        .rank-math-block .rank-math-list-item:last-child {
            margin-bottom: 0 !important;
        }

        .rank-math-block .rank-math-list-item:hover {
            border-color: var(--rm-faq-border-hover) !important;
        }

        /* هدر / تیتر سوال */
        .rank-math-block .rank-math-question {
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            padding: 16px 20px !important;
            margin: 0 !important;
            background-color: var(--rm-faq-header-bg) !important;
            color: var(--rm-faq-title) !important;
            font-size: 16px !important;
            font-weight: 600 !important;
            line-height: 1.6 !important;
            cursor: pointer !important;
            user-select: none !important;
            outline: none !important;
            transition: background-color 0.2s ease, color 0.2s ease, border-color 0.2s ease !important;
        }

        .rank-math-block .rank-math-question:hover {
            background-color: var(--rm-faq-header-hover) !important;
            color: var(--rm-faq-primary) !important;
        }

        .rank-math-block .rank-math-question:focus-visible {
            box-shadow: inset 0 0 0 2px var(--rm-faq-primary) !important;
        }

        /* آیکون مدرن Chevron (SVG دایره‌ای با انیمیشن چرخش نرم) */
        .rank-math-block .rank-math-question::after {
            content: "" !important;
            display: inline-flex !important;
            width: 28px !important;
            height: 28px !important;
            min-width: 28px !important;
            border-radius: 50% !important;
            background-color: rgba(148, 163, 184, 0.12) !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2364748b' stroke-width='2.2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E") !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
            background-size: 14px !important;
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1), background-color 0.25s ease !important;
            margin-inline-start: 14px !important;
        }

        /* استایل حالت باز شده */
        .rank-math-block .rank-math-list-item.is-active {
            border-color: var(--rm-faq-border-hover) !important;
            box-shadow: var(--rm-faq-shadow-active) !important;
        }

        .rank-math-block .rank-math-list-item.is-active .rank-math-question {
            background-color: var(--rm-faq-header-bg) !important;
            color: var(--rm-faq-primary) !important;
            border-bottom: 1px solid var(--rm-faq-border) !important;
        }

        .rank-math-block .rank-math-list-item.is-active .rank-math-question::after {
            transform: rotate(180deg) !important;
            background-color: rgba(59, 130, 246, 0.15) !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%233b82f6' stroke-width='2.2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E") !important;
        }

        /* باکس پاسخ (CSS Grid Animation) */
        .rank-math-block .rank-math-answer {
            display: grid !important;
            grid-template-rows: 0fr !important;
            transition: grid-template-rows 0.35s cubic-bezier(0.4, 0, 0.2, 1), padding 0.3s ease !important;
            padding: 0 20px !important;
            margin: 0 !important;
            color: var(--rm-faq-content) !important;
            background-color: var(--rm-faq-bg) !important;
            font-size: 15px !important;
            line-height: 1.85 !important;
        }

        .rank-math-block .rank-math-answer > * {
            overflow: hidden !important;
            margin-bottom: 0 !important;
        }

        .rank-math-block .rank-math-list-item.is-active .rank-math-answer {
            grid-template-rows: 1fr !important;
            padding: 18px 20px !important;
        }

        .rank-math-block .rank-math-answer p {
            margin: 0 0 12px 0 !important;
        }

        .rank-math-block .rank-math-answer p:last-child {
            margin-bottom: 0 !important;
        }

        .rank-math-block .rank-math-answer a {
            color: var(--rm-faq-primary) !important;
            text-decoration: underline !important;
            text-underline-offset: 3px !important;
        }
    </style>

    <script id="rm-faq-accordion-script">
        document.addEventListener('DOMContentLoaded', function () {
            const faqBlocks = document.querySelectorAll('.rank-math-block');

            faqBlocks.forEach(function (block) {
                const items = block.querySelectorAll('.rank-math-list-item');

                items.forEach(function (item) {
                    const question = item.querySelector('.rank-math-question');
                    const answer = item.querySelector('.rank-math-answer');

                    if (!question || !answer) return;

                    // ساخت wrapper امن برای انیمیشن Grid بدون افت سرعت یا برش المان‌ها
                    if (answer.children.length === 0 || !answer.querySelector('.rm-answer-inner')) {
                        const innerWrapper = document.createElement('div');
                        innerWrapper.className = 'rm-answer-inner';
                        while (answer.firstChild) {
                            innerWrapper.appendChild(answer.firstChild);
                        }
                        answer.appendChild(innerWrapper);
                    }

                    question.setAttribute('tabindex', '0');
                    question.setAttribute('role', 'button');
                    question.setAttribute('aria-expanded', 'false');

                    const toggleItem = function () {
                        const isCurrentlyActive = item.classList.contains('is-active');

                        // بستن سایر آکاردئون‌ها (تک انتخابی / Single-Open)
                        items.forEach(function (sibling) {
                            if (sibling !== item && sibling.classList.contains('is-active')) {
                                sibling.classList.remove('is-active');
                                const siblingQuestion = sibling.querySelector('.rank-math-question');
                                if (siblingQuestion) {
                                    siblingQuestion.setAttribute('aria-expanded', 'false');
                                }
                            }
                        });

                        // تاگل وضعیت آیتم جاری
                        if (isCurrentlyActive) {
                            item.classList.remove('is-active');
                            question.setAttribute('aria-expanded', 'false');
                        } else {
                            item.classList.add('is-active');
                            question.setAttribute('aria-expanded', 'true');
                        }
                    };

                    question.addEventListener('click', toggleItem);
                    question.addEventListener('keydown', function (e) {
                        if (e.key === 'Enter' || e.key === ' ') {
                            e.preventDefault();
                            toggleItem();
                        }
                    });
                });
            });
        });
    </script>
    <?php
}, 99);
