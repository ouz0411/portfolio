# Full Stack Portfolio Website

This is a dynamic full-stack portfolio web application built with **PHP, MySQL, HTML5, CSS3, and JavaScript**.  
It includes an admin panel, authentication system, project management module, and a contact message system.

---

## 🚀 Features

### Public Side
- Responsive modern portfolio design
- Home / About / Skills / Projects / Contact sections
- Dynamic project listing (from database)
- Contact form with database storage
- Dark mode toggle (JavaScript)

### Admin Panel
- Secure login system (session-based authentication)
- Dashboard overview
- Add / Edit / Delete projects (CRUD operations)
- View messages sent from contact form
- Logout system

---

## 🛠️ Technologies Used

- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP (Core PHP, no framework)
- **Database:** MySQL
- **Server Environment:** XAMPP (Apache + MySQL)
- **Styling:** Custom CSS (Flexbox & Grid)

---

## 📁 Project Structure

### 📂 /assets
- Images, icons, and media files.

### 📂 /css
- Custom styling, animations, and responsive layouts.

### 📂 /js
- Dark mode logic, form validations, and UI interactions.

### 📂 /includes
- **db.php**: Database connection (PDO/MySQLi) configuration.
- **auth.php**: Session control and admin access security.

### 📂 /admin
- **dashboard.php**: Admin control center overview.
- **messages.php**: Viewing and managing contact form submissions.
- **add_project.php**: Interface for adding new project cards.
- **edit_project.php**: Updating existing project information.
- **delete_project.php**: Removing projects from the database.

### 📄 Root Files
- **index.php**: The main public portfolio page.
- **login.php**: Secure login portal for the admin.
- **logout.php**: Ends the current admin session.
- **send_message.php**: Backend script to process contact form data.

---

## 🗄️ Database Structure

**Database Name:** `portfolio_db`

### Tables:

#### 👤 users
- `id`: Primary Key (Auto-increment)
- `username`: Admin identification
- `password`: Hashed security credentials

#### 💻 projects
- `id`: Primary Key (Auto-increment)
- `title`: Project name
- `description`: Detailed project info
- `github_link`: Repository URL

#### ✉️ messages
- `id`: Primary Key (Auto-increment)
- `name`: Sender's name
- `email`: Sender's contact mail
- `message`: Message content
- `created_at`: Timestamp of submission

