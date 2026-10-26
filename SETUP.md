# OCM website: setup checklist

1. **Quote form.** Create a free access key at web3forms.com using ocmcustomsbrokerage0722@gmail.com, then replace `YOUR_WEB3FORMS_ACCESS_KEY` in index.html. Until then the form falls back to opening the visitor's email app.
2. **Analytics.** Add ocmcustomsbrokerage.com.ph as a site at plausible.io (paid) or swap the two Plausible lines for your Google Analytics snippet. Custom events (service views, chat clicks, checklist use, quote requests) are already wired; in Plausible, add them as goals.
3. **Chat buttons.** Viber and WhatsApp use +63 969 237 8264. Confirm that number is registered on both apps.
4. **Images.** Run `python optimize-images.py`, check images-optimized/, then copy its files (including og-image.jpg) into your images/ folder.
5. **Review content.** Document checklist, FAQ answers, glossary, and the Industries list are general drafts. Edit them to match how OCM actually works.
6. **Upload** index.html, advisories.html, sitemap.xml and robots.txt to the site root. Then submit sitemap.xml in Google Search Console.
7. **Advisories.** Edit the `advisories` list at the bottom of advisories.html to post updates.
