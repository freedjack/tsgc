import { ThemeManager } from '../main.js';

describe('ThemeManager', () => {
    beforeEach(() => {
        localStorage.clear();
        document.documentElement.removeAttribute('data-theme');
    });

    test('initializes with default theme', () => {
        const tm = new ThemeManager();
        expect(tm.getCurrentTheme()).toBe('modern-professional');
    });

    test('applies theme correctly', () => {
        const tm = new ThemeManager();
        tm.applyTheme('ocean-breeze');
        expect(document.documentElement.getAttribute('data-theme')).toBe('ocean-breeze');
        expect(localStorage.getItem('tsgc-theme')).toBe('ocean-breeze');
    });

    test('theme switcher creates UI elements', () => {
        const tm = new ThemeManager();
        tm.createThemeSwitcher();
        expect(document.querySelectorAll('.theme-option').length).toBe(6);
    });
});
