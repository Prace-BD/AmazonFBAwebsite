import asyncio
import os
from playwright.async_api import async_playwright

ARTIFACT_DIR = r"C:\Users\Bloodtek\.gemini\antigravity-ide\brain\a7faf800-e79a-448a-aed8-49d59f412c3d"

async def test_and_verify():
    async with async_playwright() as p:
        browser = await p.chromium.launch(headless=True)
        page = await browser.new_page(viewport={'width': 1440, 'height': 900})

        # 1. Test Homepage
        print("Testing OYL Legacy Homepage...")
        await page.goto("http://127.0.0.1:8000/", wait_until="networkidle")
        await page.screenshot(path=os.path.join(ARTIFACT_DIR, "preview_oyl_homepage.png"), full_page=True)

        # 2. Test Refund & Cancellation Policy
        print("Testing Refund & Cancellation Policy...")
        await page.goto("http://127.0.0.1:8000/refund-policy", wait_until="networkidle")
        await page.screenshot(path=os.path.join(ARTIFACT_DIR, "preview_refund_policy.png"), full_page=True)

        # 3. Test Fulfillment Policy
        print("Testing Fulfillment Policy...")
        await page.goto("http://127.0.0.1:8000/fulfillment-policy", wait_until="networkidle")
        await page.screenshot(path=os.path.join(ARTIFACT_DIR, "preview_fulfillment_policy.png"), full_page=True)

        # 4. Test Page List
        print("Testing Page List...")
        await page.goto("http://127.0.0.1:8000/pages", wait_until="networkidle")
        await page.screenshot(path=os.path.join(ARTIFACT_DIR, "preview_oyl_page_list.png"), full_page=True)

        # 5. Test Unified Theme Control Center
        print("Testing Unified Theme Control Center...")
        await page.goto("http://127.0.0.1:8000/admin/theme-control", wait_until="networkidle")
        await page.screenshot(path=os.path.join(ARTIFACT_DIR, "preview_oyl_admin.png"), full_page=True)

        await browser.close()
        print("OYL Legacy verification completed successfully!")

if __name__ == "__main__":
    asyncio.run(test_and_verify())
