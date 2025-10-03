# 📚 Library Management System - PHP & MySQL  

This is a **powerful Library Management System** developed using **Core PHP** and **MySQL**.  
Unlike simple CRUD projects, this system provides **real-world library features**, including membership expiration tracking and smart notifications.  

---

## 🚀 Key Features  
- **Book Management** – add, edit, and delete books.  
- **Author Management** – manage book authors.  
- **Member Management** – register and track members.  
- **Staff Management** – manage library staff information.  
- **Transactions** – record book issues and returns.  
- **Membership Expiration Alerts** –  
  - If a member’s subscription has **expired**, their status is **highlighted in red**.  
  - On detailed view (**Show** page), the system displays the exact **membership duration**.  
  - If expired, the system gives a clear **warning message**:  
    *“This member’s membership has expired.”*  
- **User-Friendly UI** – built with HTML, CSS, Bootstrap, and JavaScript for responsive design.  

---

## 🛠️ Technologies Used  
- **PHP** (Core PHP, no framework)  
- **MySQL** (phpMyAdmin)  
- **HTML, CSS, Bootstrap** (frontend UI)  
- **JavaScript** (basic interactivity)  
- **OpenServer / XAMPP** (local development)  

---

## 🗄️ Database Structure  
This project uses **6 MySQL tables**:  

- `author` – stores author information.  
- `book` – stores book details.  
- `member` – stores library members.  
- `register` – handles new member registration.  
- `staff` – stores staff data.  
- `transaction` – records book issues and returns.  

> Database schema and sample data are included:  
- **schema.sql** → creates tables and relationships.  
- **sample_data.sql** → tables with demo records.  

---

## ⚙️ Installation Instructions  

1. **Clone this repository**:
   ```bash
      git clone https://github.com/Yusufxon790/library-system-admin.git

2. **Set up the database**:   
   - Open phpMyAdmin (or MySQL CLI).   
   - Create a new database, e.g., `library`.  
   - Import either:  
         - `schema.sql` → clean tables only.  
         - `sample_data.sql` → tables + sample records.  
     
2. **Run the project locally**:  
   - Place the project folder inside `htdocs/` (XAMPP) or `domains/` (OpenServer).  
   - Start Apache and MySQL.  
   - Open your browser and go to:
     ```
     http://localhost/library/index.php

---

## 📂 Project Structure

``` 
│── index.php                  → Main entry point (redirects to book.php or dashboard)    
│── book-related files         → Book management (list, add, edit, delete)  
│── author-related files       → Author management (list, add, edit, delete)  
│── member-related files       → Member management (register, edit, delete, view)  
│── staff-related files        → Staff management (CRUD operations)  
│── transaction-related files  → Transactions (issue/return)  
│── schema.sql          → Database schema  
│── sample_data.sql     → Database with sample data  
│── README.md           → Documentation  
 
```

---

## 🔑 Why This Project Stands Out  

Unlike typical student projects, this system includes:   
✅ Real-time membership validation  
✅ Smart UI alerts for expired members  
✅ Clean code with structured database   
✅ Ready-to-use for small libraries  

---

## 👨‍💻 Author  
- [MuhammadYusuf Akramov](https://github.com/Yusufxon790)   
- 📧 Email: akramovyusufxon590@gmail.com  

---

## 📝 License
This project is for **educational purposes**.  
Feel free to use, modify, or improve it.  
