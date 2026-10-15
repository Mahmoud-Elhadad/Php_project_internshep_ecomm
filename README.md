# 🛒 E-Commerce Web Application with Admin Dashboard

A full-stack e-commerce platform built with **PHP** and **MySQL**, developed as part of an internship project. The system consists of two main parts: a customer-facing storefront and an admin dashboard for managing the store.

---

## 📸 Project Structure

```
├── ecomerce/        → Customer-facing storefront
└── Dashboard/       → Admin control panel
```

---

## ✨ Features

### 🏪 Storefront (Customer Side)
- Responsive homepage with product sliders and banners
- Product listing with grid & list views
- Product details page with image gallery and reviews
- Shopping cart & checkout pages
- User registration & login pages
- Blog with sidebar (grid & single post views)
- FAQ and About Us pages
- Contact form with PHP mail handling
- 404 error page

### 🔧 Admin Dashboard
- **Authentication** — Secure admin login with session management (only `admin` role can access)
- **Product Management** — Add, edit, delete products with:
  - Multiple image uploads (PNG, JPG, JPEG, WEBP, AVIF)
  - Category assignment
  - Price, sale percentage, and stock count
- **Category Management** — Add and manage product categories
- **User Management** — Add, update, delete users with:
  - Role assignment (admin / user)
  - Password hashing (`password_hash`)
  - Phone number validation (Egyptian format)
  - Profile image upload with gender-based default avatar
- **Dashboard Overview** — Weekly sales, orders, and visitor statistics

---

## 🛠️ Tech Stack

| Technology | Usage |
|---|---|
| PHP (Procedural) | Backend logic & form handling |
| MySQL + MySQLi | Database & queries |
| HTML5 | Page structure |
| CSS3 + Bootstrap | Styling & responsive layout |
| JavaScript | Frontend interactivity |
| XAMPP | Local development server |

---

## 🗄️ Database

- **Database name:** `mo-project`
- **Main tables:** `users`, `product`, `categories`

---

## ⚙️ Installation & Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/your-repo-name.git
   ```

2. **Move the project** to your XAMPP `htdocs` directory
   ```
   C:\xampp\htdocs\php_projects\Project_internshep_ecomm
   ```

3. **Start XAMPP** — make sure Apache and MySQL are running

4. **Create the database**
   - Open [phpMyAdmin](http://localhost/phpmyadmin)
   - Create a new database named `mo-project`
   - Import the SQL file (if provided)

5. **Configure the connection** in both:
   - `Dashboard/functions/connection.php`
   - `ecomerce/functions/connection.php`
   ```php
   $connection = mysqli_connect('localhost', 'root', '', 'mo-project');
   ```

6. **Access the project**
   - Storefront: `http://localhost/php_projects/Project_internshep_ecomm/ecomerce/`
   - Dashboard: `http://localhost/php_projects/Project_internshep_ecomm/Dashboard/`

---

## 🔐 Admin Login

To access the dashboard, the user must exist in the `users` table with `role = 'admin'`.

---

## 📁 Key Pages

| Page | Path |
|---|---|
| Storefront Home | `ecomerce/index.php` |
| Product Details | `ecomerce/product-details.php` |
| Cart | `ecomerce/cart.html` |
| Checkout | `ecomerce/checkout.html` |
| Admin Dashboard | `Dashboard/index.php` |
| Manage Products | `Dashboard/product.php` |
| Manage Users | `Dashboard/user.php` |
| Manage Categories | `Dashboard/category.php` |

---

## 👨‍💻 Author

Built during internship — feel free to fork and improve!
