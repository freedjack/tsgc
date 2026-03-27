# Layout System Documentation

## Overview

The TSGC website now features a comprehensive layout system with 5 distinct layout variants that control spacing, sizing, and visual density. The system works seamlessly with the theme system and provides users with complete control over their viewing experience.

## Available Layouts

### 1. Standard (Default)
- **Container Width**: 1800px
- **Content Width**: 1200px
- **Grid Gap**: 2rem
- **Section Spacing**: 4rem
- **Card Spacing**: 2rem
- **Border Radius**: 8px
- **Container Padding**: 3rem 8rem
- **Card Padding**: 2.5rem
- **Style**: Balanced, professional, good for most content

### 2. Compact
- **Container Width**: 1400px
- **Content Width**: 1000px
- **Grid Gap**: 1.5rem
- **Section Spacing**: 2.5rem
- **Card Spacing**: 1.5rem
- **Border Radius**: 6px
- **Container Padding**: 2rem 4rem
- **Card Padding**: 2rem
- **Style**: Dense, efficient, good for information-heavy pages

### 3. Spacious
- **Container Width**: 2000px
- **Content Width**: 1400px
- **Grid Gap**: 3rem
- **Section Spacing**: 6rem
- **Card Spacing**: 3rem
- **Border Radius**: 12px
- **Container Padding**: 4rem 10rem
- **Card Padding**: 3rem
- **Style**: Airy, premium feel, good for presentations

### 4. Magazine
- **Container Width**: 1600px
- **Content Width**: 1100px
- **Grid Gap**: 2.5rem
- **Section Spacing**: 5rem
- **Card Spacing**: 2.5rem
- **Border Radius**: 4px
- **Container Padding**: 2.5rem 6rem
- **Card Padding**: 2.25rem
- **Style**: Editorial, structured, good for articles

### 5. Minimal
- **Container Width**: 1200px
- **Content Width**: 800px
- **Grid Gap**: 1rem
- **Section Spacing**: 3rem
- **Card Spacing**: 1rem
- **Border Radius**: 2px
- **Container Padding**: 1.5rem 3rem
- **Card Padding**: 1.5rem
- **Style**: Clean, focused, good for reading

## How to Use

### For Users
1. Look for the layout switcher on the right side of the page (desktop) or bottom-right (mobile)
2. Click on any layout option to switch instantly
3. Your layout preference is automatically saved and will persist across sessions
4. Use keyboard navigation (arrow keys + Enter/Space) for accessibility
5. Layout changes work seamlessly with theme changes

### For Developers

#### Adding a New Layout
1. Add the layout to the `layouts` object in `main.js`:
```javascript
this.layouts = {
    // ... existing layouts
    'your-new-layout': 'Your New Layout Name'
};
```

2. Add CSS variables for the new layout in `style.css`:
```css
[data-layout="your-new-layout"] {
    --layout-name: 'your-new-layout';
    --container-max-width: 1600px;
    --content-max-width: 1100px;
    --grid-gap: 2rem;
    --section-spacing: 4rem;
    --card-spacing: 2rem;
    --border-radius: 8px;
    --content-line-height: 1.6;
    --container-padding: 2rem 5rem;
    --card-padding: 2rem;
}
```

3. Add a preview pattern for the layout switcher:
```css
.layout-preview[data-layout="your-new-layout"] {
    background: /* your pattern here */;
}
```

#### Using Layout Variables in CSS
```css
.your-element {
    max-width: var(--container-max-width);
    padding: var(--container-padding);
    border-radius: var(--border-radius);
    margin-bottom: var(--section-spacing);
    gap: var(--grid-gap);
    transition: all var(--transition-normal);
}
```

#### JavaScript API
```javascript
// Get current layout
const currentLayout = layoutManager.getCurrentLayout();

// Get layout display name
const layoutName = layoutManager.getLayoutName('compact');

// Apply layout programmatically
layoutManager.applyLayout('spacious');
```

## Technical Features

### CSS Custom Properties
- All spacing, sizing, and layout properties are defined as CSS variables
- Easy to maintain and modify
- Automatic layout switching without page reload
- Smooth transitions between layout changes

### Responsive Design
- All layouts adapt to different screen sizes
- Mobile-optimized spacing and sizing
- Touch-friendly interface on mobile devices
- Consistent experience across devices

### Accessibility
- Full keyboard navigation support
- Screen reader announcements for layout changes
- High contrast maintained across all layouts
- Focus indicators that adapt to each layout

### Performance
- Layouts are applied instantly without page reload
- Local storage for layout persistence
- Minimal JavaScript footprint
- CSS-only layout switching

### Integration with Theme System
- Layouts work seamlessly with all themes
- Layout variables complement theme variables
- Combined theme and layout preferences are saved
- Smooth transitions when changing both theme and layout

## Layout Variables Reference

| Variable | Description | Usage |
|----------|-------------|-------|
| `--layout-name` | Current layout identifier | For debugging/logging |
| `--container-max-width` | Maximum width of main containers | `.container`, `.loose-container` |
| `--content-max-width` | Maximum width of content areas | `.hero-content`, `.footer-content` |
| `--grid-gap` | Gap between grid items | `.content-grid`, `.feature-grid` |
| `--section-spacing` | Vertical spacing between sections | `.module-grid`, `.feature-grid` |
| `--card-spacing` | Spacing between cards | `.content-grid` |
| `--border-radius` | Border radius for elements | `.content-card`, `button`, `.cta-button` |
| `--content-line-height` | Line height for text content | Typography elements |
| `--container-padding` | Padding for main containers | `.container`, `.loose-container` |
| `--card-padding` | Padding for card elements | `.content-card` |

## Browser Support
- Modern browsers with CSS custom properties support
- Graceful degradation for older browsers
- No JavaScript required for basic functionality (layouts still work)

## File Structure
```
assets/
├── css/
│   └── style.css          # Main stylesheet with layout definitions
└── js/
    └── main.js            # Layout management JavaScript
```

## Best Practices

### Layout Design
1. **Consistency**: Use the same variable names across all layouts
2. **Proportional Scaling**: Maintain proportional relationships between spacing values
3. **Accessibility**: Ensure adequate spacing for touch targets and readability
4. **Performance**: Keep layout changes smooth and fast

### Content Considerations
1. **Standard**: Best for general content and mixed media
2. **Compact**: Ideal for data-heavy pages and dashboards
3. **Spacious**: Perfect for presentations and visual content
4. **Magazine**: Great for articles and editorial content
5. **Minimal**: Excellent for focused reading and simple interfaces

### Testing
1. Test layouts across different content types
2. Verify responsive behavior on all screen sizes
3. Check accessibility with screen readers
4. Validate performance with layout switching

## Future Enhancements
- Layout preview on hover
- Custom layout creation interface
- Layout import/export functionality
- Automatic layout detection based on content type
- Layout-specific typography scaling
- Advanced grid system integration

