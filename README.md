# 🎨 Art Gallery - Art Sale Management System

**Art Gallery** is a web-based **Art Sale Management System** built using **PHP and MySQL**.  
The application provides a platform where users can explore artworks, add them to a cart, submit queries (with file uploads), and simulate purchases. An admin can view contact submissions and manage user data through the database.

---

## ✨ Core Features

- **User Registration / Login / Logout**  
- **Dynamic Art Gallery**  
  - Filter artworks  
  - Add or remove items dynamically from the **Cart**  
  - Real-time cart updates with total amount calculation  
- **Shopping Cart & Checkout**  
  - Cart stored using **LocalStorage / SessionStorage**  
  - Quantity management and removal of items  
- **Contact Submission Form**  
  - Users can send messages and **upload files**  
  - Submissions are saved to the **database**  
- **Admin Access**  
  - View submitted contact forms and download files via `view_submissions.php`  
  - Monitor registered users in `phpMyAdmin`

---

## ⚙️ Technology Stack

| Technology | Description |
|------------|-------------|
| **PHP** | Backend logic |
| **MySQL** | Database (phpMyAdmin) |
| **HTML / CSS / JavaScript** | Frontend interface |
| **LocalStorage / SessionStorage** | Cart management |
| **XAMPP** | Local server environment |

---

## 🗄️ Database Setup (MySQL)

**Database File:**  
Use the provided **`art_gallery.sql`** for quick setup.

### Contains:

- **`users` table** – Stores user accounts (username, password hash)  
- **`contact_submissions` table** – Stores contact details, message, file upload, and timestamp  

---

## 🚀 Installation & XAMPP Setup

### **Prerequisites**

- Install **[XAMPP](https://www.apachefriends.org/index.html)**

---

### **Steps to Run the Project**

1. **Clone the Repository**

```bash
git clone https://github.com/Prerna13anand/Art-Gallery.git
````

2. **Move Project Files**

Copy the `Art-Gallery` folder into:

```
C:/xampp/htdocs/
```

3. **Start XAMPP**

* Open **XAMPP Control Panel**
* Start **Apache** and **MySQL**

4. **Import the Database**

* Open **phpMyAdmin** at:
  `http://localhost/phpmyadmin/`

* Create a new database named:

```
art_gallery
```

* Go to **Import** → Select **art\_gallery.sql** → Click **Go**

5. **Run the Application**

Open your browser and visit:

```
http://localhost/Art-Gallery/
```

---

## 📥 Repository

GitHub Link: [https://github.com/Prerna13anand/Art-Gallery.git](https://github.com/Prerna13anand/Art-Gallery.git)

```

---


