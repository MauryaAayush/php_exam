# 📚 Exam Management System - RESTful APIs

> A robust PHP-MySQL based RESTful API system for managing students, courses, and enrollments with comprehensive CRUD operations.

![PHP Version](https://img.shields.io/badge/PHP-7.4+-777BB4?style=flat-square&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=flat-square&logo=mysql&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green.svg)

## 🌟 Features

- **Complete CRUD Operations**: Full support for Create, Read, Update, and Delete operations
- **Three Core Entities**: Students, Courses, and Enrollments management
- **RESTful Architecture**: Following REST principles for API design
- **Secure Database Operations**: Proper validation and error handling
- **Easy to Deploy**: Simple setup process with clear instructions

## 🚀 API Endpoints

### Students Management
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/students` | Create a new student record |
| GET | `/api/students` | Retrieve all students data |

### Courses Management
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/courses` | Create a new course |
| PUT | `/api/courses/{id}` | Update course description |

### Enrollments Management
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/enrollments` | Enroll a student in a course |
| DELETE | `/api/enrollments/{id}` | Remove an enrollment |

## 📊 Database Schema

### Students Table
| Column | Type | Description |
|--------|------|-------------|
| id | INT (PK) | Auto-increment ID |
| name | VARCHAR(255) | Student name |
| email | VARCHAR(255) | Student email |
| phone | VARCHAR(15) | Student phone number |

### Courses Table
| Column | Type | Description |
|--------|------|-------------|
| id | INT (PK) | Auto-increment ID |
| course_name | VARCHAR(255) | Course name |
| description | TEXT | Course description |

### Enrollments Table
| Column | Type | Description |
|--------|------|-------------|
| id | INT (PK) | Auto-increment ID |
| student_id | INT | References `Students(id)` |
| course_id | INT | References `Courses(id)` |
| enrollment_date | DATE | Date of enrollment |

## 📁 Project Structure

```bash
project-root/
├── api/
│   ├── students.php      # Students API endpoints
│   ├── courses.php       # Courses API endpoints
│   └── enrollments.php   # Enrollments API endpoints
│
└── config/
    └── database.php      # Database configuration
```

## 🛠️ Installation & Setup

1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-username/php-crud-api.git
   cd php-crud-api
   ```

2. **Database Setup**
   - Import the provided `database.sql` into your MySQL server
   - Configure your database settings:
     ```php
     // config/database.php
     define('DB_HOST', 'localhost');
     define('DB_NAME', 'your_database');
     define('DB_USER', 'your_username');
     define('DB_PASS', 'your_password');
     ```

3. **Server Configuration**
   - Deploy to your local server (XAMPP/WAMP)
   - Place in the `htdocs` directory
   - Access via: `http://localhost/php-crud-api/api/`

## 🧪 Testing

All API endpoints have been rigorously tested using Postman to ensure:
- Proper request/response handling
- Appropriate error messages
- Valid HTTP status codes
- Data validation
- Security measures

## 📘 Documentation

Detailed API documentation is available in the following formats:
- Postman Collection (available in `/docs`)
- API Blueprint
- Video Walkthrough (coming soon)

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request. For major changes, please open an issue first to discuss what you would like to change.

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📺 Video Demo

A comprehensive video walkthrough covering:
- API implementation details
- Project structure overview
- Testing procedures

[Watch the Demo](#) (Coming Soon)

---

<div align="center">
Made with ❤️ by [Your Name]
</div>
