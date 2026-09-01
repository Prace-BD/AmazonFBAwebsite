import asyncio
import os
from playwright.async_api import async_playwright

ARTIFACT_DIR = r"C:\Users\Bloodtek\.gemini\antigravity-ide\brain\a7faf800-e79a-448a-aed8-49d59f412c3d"

async def test_auth_debug():
    async with async_playwright() as p:
        browser = await p.chromium.launch(headless=True)
        context = await browser.new_context(viewport={'width': 1440, 'height': 900})
        page = await context.new_page()

        print("1. Going to login...")
        await page.goto("http://localhost/admin/login", wait_until="networkidle")

        print("2. Logging in with admin123...")
        await page.fill("#adminPassword", "admin123")
        await page.click("button[type='submit']")
        await page.wait_for_load_state("networkidle")
        print("URL after login:", page.url)

        # Capture screenshot of theme control dashboard
        await page.screenshot(path=os.path.join(ARTIFACT_DIR, "preview_admin_after_login.png"), full_page=True)
        print("Captured preview_admin_after_login.png")

        # Let's see what buttons exist on the page
        buttons = await page.eval_on_selector_all("button", "elements => elements.map(e => e.outerHTML)")
        for b in buttons:
            if "data-admin-tab" in b or "Logout" in b:
                print("Found button:", b)

        # Click the 6th tab
        await page.click("button[data-admin-tab='security-tab']")
        await page.wait_for_timeout(500)
        await page.screenshot(path=os.path.join(ARTIFACT_DIR, "preview_admin_security_tab.png"), full_page=True)
        print("Captured preview_admin_security_tab.png")

        await browser.close()
        print("Done!")

if __name__ == "__main__":
    asyncio.run(test_auth_debug())
