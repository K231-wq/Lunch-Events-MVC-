# Lunch-Events-MVC-Architecture-design
Using php Mvc architecture design, I created the page that can register and login to the lunch home page and that is display all events that all users created event, request, attend, delete event and the same logic from the previews Basic php project

# Launch Event Management System

This is an Event Management System built with PHP. It allows users to register, login, create events, invite others, and manage RSVPs.


## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/yourusername/event-management-system.git
    cd event-management-system
    ```

2. Install dependencies using Composer:
    ```sh
    composer install
    ```
3. Install Xampp softwere

4. Set up your database and update the database connection settings in xampp mysql.
   
5. Create one database name events and two tables name allevents and register.
   
6. allEvents table
   ```sh
   CREATE TABLE allevents (
    id INT AUTO_INCREMENT PRIMARY KEY,            -- Unique ID for the event
    UniqueId VARCHAR(255),                        -- Unique identifier for the event
    name VARCHAR(255),                            -- Name of the event
    address LONGTEXT,                             -- Address of the event
    time VARCHAR(255),                            -- Time of the event
    capacity INT,                                 -- Capacity for attendees
    description LONGTEXT,                         -- Detailed description of the event
    create_at VARCHAR(255)                        -- Creation timestamp
);
   ```
7.register table
```sh
CREATE TABLE register (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- Auto-incrementing unique ID
    UniqueId VARCHAR(255),              -- Unique identifier for the user
    Name VARCHAR(255),                  -- User's name
    Email VARCHAR(255),                 -- User's email address
    Password VARCHAR(255)               -- User's password
);
```

8. Start your local server and mysql.
9. GO to the git clone files using cmd cd <Files Path>
10. Using cmd,Go to the public folder with cd <File name>
11. ```sh php -S localhost:8080 ```
12. First register the form
13. Login the page
## Usage

- **Register**: Go to `/register` to create a new account.
- **Login**: Go to `/login` to sign in.
- **Home**: After logging in, you will be redirected to `/home` where you can see all events.
- **Create Event**: Go to `/create` to create a new event.
- **My Invitations**: Go to `/invitations` to see and manage your created events.
- **My RSVP**: Go to `/rsvp` to see and manage your RSVPs.
- **Profile**: Go to `/profile` to view and update your profile.
- **Logout**: Go to `/logout` to log out of your account.

## File Descriptions

- **Controller/Controller1.php**: Handles user registration and login.
- **Controller/EventController.php**: Manages event-related actions like creating, updating, and deleting events.
- **Database.php**: Manages database connections and user-related database operations.
- **Database1.php**: Manages event-related database operations.
- **helper/util_helper.php**: Contains utility functions.
- **models/Event.php**: Represents the Event model.
- **models/UserInfo.php**: Represents the UserInfo model.
- **public/index.php**: Entry point of the application.
- **Router.php**: Handles routing of requests to appropriate controllers and actions.
- **View/**: Contains view files for rendering HTML pages.

## License

This project is licensed under the MIT License. See the LICENSE file for details.

## Authors

- Kris Jackson
