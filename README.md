# Rebrand Website – SDN Bringin 01, Semarang

This repository contains the redesigned website for **SDN Bringin 01**, a primary school in Semarang. Our goal was to modernize the user interface and improve overall usability while retaining simplicity and accessibility.

---

## Table of Contents

- [About](#about)  
- [Features](#features)  
- [Technologies Used](#technologies-used)  
- [Getting Started](#getting-started)  
- [Project Structure](#project-structure)  
- [Credits](#credits)  
- [License](#license)

---

## About

The original school website had an outdated design that didn’t align with current web standards or user expectations. This project revitalizes the site with a cleaner, more responsive layout, focused on delivering relevant school information in a visually appealing and user-friendly way.

---

## Features

- Fully responsive layout optimized for desktop, tablet, and mobile devices  
- Clean and modern design, improving readability and navigation  
- Content organization includes:
  - **Home / Landing Page** (`index.php`)
  - **Information / News** (`informasi.php`)
  - **Gallery** (`galeri.php`)
- Modular templates using PHP includes for shared components (e.g., `navbar.php`, `koneksi.php` for database connections)
- Easy management of content and assets (images located in `img/`, styling in `css/` folder)

---

## Technologies Used

- **HTML5** – Semantic document structure  
- **CSS3** – Custom styling, ideally using frameworks like Bootstrap for layout (if applicable)  
- **PHP** – Server-side rendering and dynamic includes  
- **Optional** – FontAwesome (based on repository file structure) for icons and visual enhancement  

---

## Getting Started

Here’s how to run and customize the project locally:

1. **Clone the repository**

   ```bash
   git clone https://github.com/okamyz/rebrand_website.git
   cd rebrand_website
   ```

2. **Set up a PHP-enabled local server**  
   You can use tools like XAMPP, WAMP, MAMP, or the built-in PHP server:

   ```bash
   php -S localhost:8000
   ```

3. **Access the site**  
   Open your browser and navigate to `http://localhost:8000/index.php`.


---

## Project Structure

```
rebrand_website/
├── img/              # Image assets (e.g., photos, logos)
├── css/              # Stylesheets (custom or framework)
├── index.php         # Homepage
├── informasi.php     # School information / news page
├── galeri.php        # Image gallery of school events
├── navbar.php        # Shared navigation header
└── koneksi.php       # (Optional) Database connection setup
```

---

## Credits

Developed by the web team at **Diskominfo Kota Semarang** for the rebranding of SDN Bringin 01’s website.

---

## License

Feel free to adapt, modify, or redistribute this project under an **MIT License** or another open-source license of your choice.
