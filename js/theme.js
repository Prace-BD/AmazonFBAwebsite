/**
 * AmazonConsultant.ae Interactive Frontend Logic
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Sticky Header Scroll Effect
  const header = document.querySelector('.site-header');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 40) {
      header?.classList.add('scrolled');
    } else {
      header?.classList.remove('scrolled');
    }
  });

  // 2. Mobile Drawer Navigation
  const mobileToggle = document.getElementById('mobileToggle');
  const mobileDrawer = document.getElementById('mobileDrawer');
  const drawerOverlay = document.getElementById('drawerOverlay');
  const closeDrawer = document.getElementById('closeDrawer');

  function openMenu() {
    mobileDrawer?.classList.add('open');
    drawerOverlay?.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeMenu() {
    mobileDrawer?.classList.remove('open');
    drawerOverlay?.classList.remove('open');
    document.body.style.overflow = '';
  }

  mobileToggle?.addEventListener('click', openMenu);
  closeDrawer?.addEventListener('click', closeMenu);
  drawerOverlay?.addEventListener('click', closeMenu);

  // 3. FAQ Accordions
  const faqItems = document.querySelectorAll('.faq-item');
  faqItems.forEach(item => {
    const question = item.querySelector('.faq-question');
    question?.addEventListener('click', () => {
      const isActive = item.classList.contains('active');
      faqItems.forEach(other => other.classList.remove('active'));
      if (!isActive) {
        item.classList.add('active');
      }
    });
  });

  // 4. Pricing Platform Tabs (Amazon, Walmart, eBay)
  const platformTabs = document.querySelectorAll('[data-platform-tab]');
  const pricingCards = document.querySelectorAll('[data-package-platform]');

  platformTabs.forEach(tab => {
    tab.addEventListener('click', (e) => {
      e.preventDefault();
      const targetPlatform = tab.getAttribute('data-platform-tab');
      
      platformTabs.forEach(t => {
        t.classList.remove('btn-primary');
        t.classList.add('btn-outline');
      });
      tab.classList.remove('btn-outline');
      tab.classList.add('btn-primary');

      pricingCards.forEach(card => {
        const cardPlatform = card.getAttribute('data-package-platform');
        if (targetPlatform === 'all' || cardPlatform === targetPlatform) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  // 5. Auto dismiss alerts after 5 seconds
  const flashAlerts = document.querySelectorAll('.alert-auto-dismiss');
  flashAlerts.forEach(alert => {
    setTimeout(() => {
      alert.style.transition = 'opacity 0.5s ease';
      alert.style.opacity = '0';
      setTimeout(() => alert.remove(), 500);
    }, 5000);
  });
});
