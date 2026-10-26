"""Run from your website folder:  pip install pillow  &&  python optimize-images.py
Creates images-optimized/ with smaller copies (same file names) plus og-image.jpg
for social sharing. Check them, then copy them over your images/ folder."""
from PIL import Image, ImageOps
import pathlib
src, out = pathlib.Path('images'), pathlib.Path('images-optimized'); out.mkdir(exist_ok=True)
for p in src.iterdir():
    if p.suffix.lower() not in ('.jpg', '.jpeg', '.png', '.webp', '.avif') or p.stem == 'ocmlogo': continue
    try:
        im = Image.open(p); im.thumbnail((1600, 1600))
        im.save(out / p.name, quality=78, optimize=True); print('ok', p.name)
    except Exception as e: print('skipped', p.name, e)
hero = src / 'aboutus.webp'
if hero.exists():
    ImageOps.fit(Image.open(hero).convert('RGB'), (1200, 630)).save(out / 'og-image.jpg', quality=85); print('ok og-image.jpg')
