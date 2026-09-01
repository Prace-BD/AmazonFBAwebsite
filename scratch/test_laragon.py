import asyncio
import os
from playwright.async_api import async_playwright

ARTIFACT_DIR = r"C:\Users\Bloodtek\.gemini\antigravity-ide\brain\a7faf800-e79a-448a-aed8-49d59f412c3d"

async def test_laragon():
    async with async_playwright() as p:
        browser = await p.chromium.launch(headless=True)
        page = await browser.new_page(viewport={'width': 1440, 'height': 900})
        await page.goto("http://localhost/", wait_until="networkidle")
        await page.screenshot(path=os.path.join(ARTIFACT_DIR, "preview_laragon_localhost.png"), full_page=True)
        print("Captured preview_laragon_localhost.png successfully!")
        await browser.close()

if __name__ == "__main__":
    asyncio.run(test_laragon())
