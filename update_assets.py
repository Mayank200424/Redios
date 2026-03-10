
import os
import re

files = [
    r"d:\xampp\htdocs\Redios\resources\views\customer\index.blade.php",
    r"d:\xampp\htdocs\Redios\resources\views\customer\404.blade.php",
    r"d:\xampp\htdocs\Redios\resources\views\customer\about.blade.php",
    r"d:\xampp\htdocs\Redios\resources\views\customer\account.blade.php",
    r"d:\xampp\htdocs\Redios\resources\views\customer\checkout.blade.php",
    r"d:\xampp\htdocs\Redios\resources\views\customer\contact.blade.php",
    r"d:\xampp\htdocs\Redios\resources\views\customer\home-2.blade.php",
    r"d:\xampp\htdocs\Redios\resources\views\customer\home-3.blade.php",
    r"d:\xampp\htdocs\Redios\resources\views\customer\news-single.blade.php",
    r"d:\xampp\htdocs\Redios\resources\views\customer\news.blade.php",
    r"d:\xampp\htdocs\Redios\resources\views\customer\shop-left-sidebar.blade.php",
    r"d:\xampp\htdocs\Redios\resources\views\customer\shop-signle.blade.php",
    r"d:\xampp\htdocs\Redios\resources\views\customer\shop-single.blade.php",
    r"d:\xampp\htdocs\Redios\resources\views\customer\shop.blade.php"
]

def update_file(filepath):
    if not os.path.exists(filepath):
        print(f"File not found: {filepath}")
        return

    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    # src replacement
    # Pattern: src="assets/..." -> src="{{ asset('assets/...') }}"
    # We use non-greedy matching? No, [^"]+ is better.
    new_content = re.sub(r'src="assets/([^"]+)"', r"src=\"{{ asset('assets/\1') }}\"", content)
    
    # href replacement
    new_content = re.sub(r'href="assets/([^"]+)"', r"href=\"{{ asset('assets/\1') }}\"", new_content)

    if content != new_content:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(new_content)
        print(f"Updated {filepath}")
    else:
        print(f"No changes for {filepath}")

if __name__ == "__main__":
    for fp in files:
        update_file(fp)
