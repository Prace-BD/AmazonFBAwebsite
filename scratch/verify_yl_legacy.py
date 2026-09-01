import asyncio
import os
from playwright.async_api import async_playwright

ARTIFACT_DIR = r"C:\Users\Bloodtek\.gemini\antigravity-ide\brain\a7faf800-e79a-448a-aed8-49d59f412c3d"

async def test_yl_legacy():
    async with async_playwright() as p:
        browser = await p.chromium.launch(headless=True)
        context = await browser.new_context(viewport={'width': 1440, 'height': 900})
        page = await context.new_page()

        # 1. Public Homepage
        print("1. Testing Public Homepage for YL Legacy...")
        await page.goto("http://localhost/", wait_until="networkidle")
        
        # Verify footer does NOT contain public link to Unified Theme Center
        footer_html = await page.inner_html("footer.site-footer")
        assert "Unified Theme Center" not in footer_html, "Unified Theme Center should NOT be in public footer"
        print("Verified: Unified Theme Center link is hidden from public footer!")

        await page.screenshot(path=os.path.join(ARTIFACT_DIR, "preview_yl_homepage.png"), full_page=True)

        # 2. Public Sitemap
        print("2. Testing Public Sitemap...")
        await page.goto("http://localhost/sitemap", wait_until="networkidle")
        sitemap_html = await page.inner_html("main")
        assert "Unified Theme Center" not in sitemap_html, "Unified Theme Center should NOT be in public sitemap"
        print("Verified: Unified Theme Center link is hidden from public sitemap!")

        # 3. Admin Login & Access
        print("3. Testing Admin Login with admin@yllegacy.com / admin123 ...")
        await page.goto("http://localhost/admin/login", wait_until="networkidle")
        await page.fill("input[name='email']", "admin@yllegacy.com")
        await page.fill("#adminPassword", "admin123")
        await page.click("button[type='submit']")
        await page.wait_for_url("**/admin**")
        await page.wait_for_load_state("networkidle")
        print("Admin login successful, current URL:", page.url)

        # 4. Now that user is authenticated, footer DOES show admin link
        footer_auth_html = await page.inner_html("footer.site-footer")
        assert "Unified Theme Center" in footer_auth_html or "Admin Panel" in footer_auth_html, "Authenticated admin can see admin shortcuts"
        print("Verified: Authenticated admin sees control links!")

        await page.screenshot(path=os.path.join(ARTIFACT_DIR, "preview_yl_admin_dashboard.png"), full_page=True)

        await browser.close()
        print("All YL Legacy tests completed successfully!")

if __name__ == "__main__":
    asyncio.run(test_yl_legacy())
