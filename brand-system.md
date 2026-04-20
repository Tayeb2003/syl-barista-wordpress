# Syl Barista Brand System

## Positioning

Syl Barista expresses modern luxury through calm confidence, meticulous craft, and elevated hospitality.

## Color system

- `--color-bg: #12110f` (deep charcoal)
- `--color-bg-soft: #1d1a16` (warm deep neutral)
- `--color-surface: #27221c` (panel background)
- `--color-text: #f4efe6` (warm ivory)
- `--color-text-muted: #c4b7a3` (secondary copy)
- `--color-accent: #c69c6d` (copper-gold accent)
- `--color-accent-strong: #e3b47e` (hover/highlight)

## Typography

- Display headings: `Playfair Display` (`700`)
- Body/UI text: `Manrope` (`400`, `500`, `700`)
- Scale:
  - H1: clamp `2.4rem` to `4.6rem`
  - H2: clamp `1.8rem` to `3rem`
  - Body: `1rem`

## Layout principles

- Container width: `min(1120px, 92vw)`
- Spacious vertical rhythm (section padding `4.5rem` to `7rem`)
- Alternating dark surface layers to create depth
- Intentional negative space in hero and image-led blocks

## Motion principles

- Entrance duration: `500ms` to `900ms` with cubic-bezier easing
- Staggered reveals for hero and card groups (`70ms` to `120ms` delays)
- Hover transitions `220ms` to `350ms`, no bounce effects
- Respect `prefers-reduced-motion` with near-instant alternatives

## Imagery direction

- Cinematic close-ups of espresso extraction, milk texture, and artisan process
- Slightly desaturated high-contrast tone for premium editorial look
- Use overlays to maintain text readability without flattening mood

## Voice and microcopy

- Confident, minimal, sensory language
- Avoid loud sales phrasing
- CTA tone examples:
  - `Reserve Your Table`
  - `Explore Signature Drinks`
  - `Visit Syl Barista`
