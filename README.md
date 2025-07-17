# Art Gallery Website 🎨

This is a web-based application for an online art gallery built using PHP and MySQL. It allows users to browse artwork, artists to manage their pieces, and an administrator to oversee the platform.

## About The Project

*(**[IMPORTANT]** Replace this paragraph with your own project description. Talk about what problem it solves, what technologies you used, and what you learned. For example:)*

This project was developed to create a digital platform for artists to showcase their work and for art enthusiasts to discover new pieces. The system features separate functionalities for regular users, artists, and an admin. I built this using core PHP for the backend logic, MySQL for the database, and standard HTML/CSS/JavaScript for the front-end. It was a great learning experience in database management and dynamic web development.

---

## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

You will need a local server environment. **XAMPP** is highly recommended as it includes everything you need.
* [Download XAMPP](https://www.apachefriends.org/download.html)

### Installation and Setup

1.  **Clone the Repository**
    Open your terminal and clone the project into a folder of your choice.
    ```sh
    git clone [https://github.com/Prerna13anand/Art-Gallery.git](https://github.com/Prerna13anand/Art-Gallery.git)
    ```

2.  **Start XAMPP**
    Open the **XAMPP Control Panel** and start the **Apache** and **MySQL** modules.

    ![XAMPP Control Panel](https://i.imgur.com/k6p5J78.png)

3.  **Create the Database**
    * Open your web browser and go to `http://localhost/phpmyadmin/`.
    * Click on the **Databases** tab.
    * In the "Create database" field, enter `art_gallery` and click **Create**.
    * Select the newly created `art_gallery` database from the left-hand sidebar.
    * Click on the **Import** tab.
    * Click "Choose File" and navigate to the project folder you cloned. Select the `database/art_gallery.sql` file.
    * Scroll down and click the **Go** button to import the schema and data.

4.  **Move Project Files**
    * Move the entire cloned project folder (`Art-Gallery`) into the `htdocs` folder inside your XAMPP installation directory (e.g., `C:/xampp/htdocs/`).

5.  **Run the Project**
    * You're all set! Open your web browser and navigate to:
    * `http://localhost/Art-Gallery/`

---