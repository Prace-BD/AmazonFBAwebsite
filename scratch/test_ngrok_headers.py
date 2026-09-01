import urllib.request

req = urllib.request.Request(
    "http://localhost/",
    headers={
        "Host": "random-subdomain.ngrok-free.dev",
        "X-Forwarded-Proto": "https",
        "X-Forwarded-Host": "random-subdomain.ngrok-free.dev",
        "User-Agent": "Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X)"
    }
)

try:
    with urllib.request.urlopen(req) as response:
        html = response.read().decode('utf-8')
        print("HTTP Status:", response.status)
        
        # Check what CSS and JS urls were generated
        for line in html.splitlines():
            if "theme.css" in line or "theme.js" in line:
                print("Asset Tag:", line.strip())
except Exception as e:
    print("Error:", e)
