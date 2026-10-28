# App Help Desk 🎫

A help desk web application developed as a study project to practice PHP, built from scratch to reinforce server-side fundamentals, session management, file-based data persistence, and secure architectural practices.

## 📄 About

A web-based support ticketing system where users can authenticate with different profiles, register support requests (title, category, and description), and consult tickets with built-in role-based filtering. The application features server-side validation, secure session control, and a flat-file database isolated safely outside the public web root.

## 📁 Project structure

```text
app-help-desk/
├── app_help_desk/         # Private folder (outside htdocs) for backend scripts & data
│   ├── arquivo.hd         # Flat-file database for support tickets
│   └── valida_login.php   # Authentication backend logic
└── htdocs/HelpDesk/       # Public web root folder
    ├── index.php          # Login page
    ├── home.php           # Main dashboard
    ├── abrir_chamado.php  # Ticket registration form
    ├── registra_chamado.php # Ticket saving logic
    ├── consultar_chamado.php # Ticket viewing & filtering
    ├── validador_acesso.php # Session protection middleware
    ├── logoff.php         # Session termination
    └── logo.png
    ```

## 🚀 How to run

1. Clone or download the project repository to your local environment (e.g., XAMPP).
2. Place the private core folder (`app_help_desk`) outside your public web root (`htdocs`), and the public project folder inside `htdocs/HelpDesk/`.
3. Start the Apache server via the XAMPP Control Panel.
4. Open your browser and navigate to `http://localhost/HelpDesk/index.php`.

## 🛠️ Technology

- PHP (Vanilla server-side logic)
- HTML5 & CSS3 (Bootstrap 4)
- Native PHP Sessions (`$_SESSION`)
- Flat-file I/O handling (`fopen`, `fgets`, `fwrite`, `fclose`)
- Font Awesome (icons)

## ✨ Features

- User authentication system with secure session management
- Role-based access control (Regular users view only their own tickets; Support staff view all tickets)
- Support ticket registration form (Title, Category, Description)
- Secure data persistence using a plain-text flat-file (`.hd`) stored outside the public web root (`htdocs`)
- Ticket consultation page with dynamic card rendering and data sanitization
- Form validation and error handling preventing empty fields or corrupted records
- Secure session middleware protecting restricted pages from unauthorized direct access

## 🎯 Learning objective

- Server-side scripting fundamentals with PHP
- Managing user states and authentication via PHP Sessions (`session_start()`, `$_SESSION`)
- Implementing role-based security and access validation middlewares (`validador_acesso.php`)
- File system operations (`fopen`, `feof`, `fgets`, `fwrite`, `fclose`) for reading and appending data
- Web security best practices: isolating sensitive data files outside the public `htdocs` directory to prevent direct URL exposure and unauthorized public downloads
- String manipulation and data sanitization (`explode()`, `str_replace()`) to parse delimiter-separated text databases (`|`)

## 📚 Lessons learned

- **Flat-file database management:** Learned how to structure, read, and write data line by line into a plain-text file (`.hd`) using pipe symbols (`|`) as column separators.
- **Web security & directory isolation:** Understood why storing sensitive data files inside the public web root (`htdocs`) leaves them vulnerable to direct browser downloads via URL, and how placing them outside `htdocs` (using `../../`) safeguards the application against public inspection.
- **Session control & authentication workflow:** Mastered how `session_start()` securely passes user authentication states (`$_SESSION['id']`, `$_SESSION['profile_id']`) across different pages to protect routes and filter user data.
- **Role-based filtering logic:** Implemented conditional access logic where standard users (Profile 2) only see tickets matching their user ID, while administrative users can oversee all tickets.
- **Data sanitization and delimiter safety:** Handled edge cases where users input pipe characters (`|`) by replacing them with hyphens (`-`) to prevent breaking the flat-file column structure.
- **Debugging PHP parse & runtime errors:** Diagnosed and fixed common issues such as unclosed curly braces (`Parse error`), missing array keys (`Undefined array key`), and empty record cards caused by unvalidated trailing lines in text files.
- **Multi-page PHP application architecture:** Organized a multi-page vanilla PHP project linking front-end Bootstrap templates with backend validation scripts without relying on heavy frameworks.

## 👤 Author

Made with 💜 by Leonam Giocondo (GiocondoDev)