import asyncio
import os
from playwright.async_api import async_playwright

ARTIFACT_DIR = r"C:\Users\Bloodtek\.gemini\antigravity-ide\brain\a7faf800-e79a-448a-aed8-49d59f412c3d"

async def test_auth():
    async with async_playwright() as p:
        browser = await p.chromium.launch(headless=True)
        context = await browser.new_context(viewport={'width': 1440, 'height': 900})
        page = await context.new_page()

        # 1. Unauthenticated visit to http://localhost/admin should redirect to /admin/login
        print("1. Testing unauthenticated redirect...")
        await page.goto("http://localhost/admin", wait_until="networkidle")
        print("URL after visit:", page.url)
        assert "/admin/login" in page.url

        # Save login preview
        await page.screenshot(path=os.path.join(ARTIFACT_DIR, "preview_admin_login.png"), full_page=True)
        print("Saved preview_admin_login.png")

        # 2. Test Invalid Password
        print("2. Testing invalid password...")
        await page.fill("#adminPassword", "wrongpass123")
        await page.click("button[type='submit']")
        await page.wait_for_load_state("networkidle")
        print("URL after invalid pass:", page.url)
        assert "/admin/login" in page.url

        # 3. Test Valid Password (admin123)
        print("3. Testing valid generic password (admin123)...")
        await page.fill("#adminPassword", "admin123")
        await page.click("button[type='submit']")
        await page.wait_for_url("**/admin**", timeout=10000)
        await page.wait_for_load_state("networkidle")
        print("URL after valid login:", page.url)

        # 4. Click Security & Password tab
        print("4. Switching to Security & Password tab...")
        await page.click("button[data-admin-tab='security-tab']")
        await page.wait_for_timeout(600)
        await page.screenshot(path=os.path.join(ARTIFACT_DIR, "preview_admin_security_tab.png"), full_page=True)
        print("Saved preview_admin_security_tab.png")

        # 5. Test Logout
        print("5. Testing Logout...")
        await page.click("button:has-text('Logout')")
        await page.wait_for_url("**/admin/login**", timeout=10000)
        await page.wait_for_load_state("networkidle")
        print("URL after logout:", page.url)
        assert "/admin/login" in page.url

        await browser.close()
        print("ALL AUTHENTICATION TESTS PASSED SUCCESSFULLY!")

if __name__ == "__main__":
    asyncio.run(test_auth())
