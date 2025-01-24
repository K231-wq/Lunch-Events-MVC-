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

3. Set up your database and update the database connection settings in [Database.php](http://_vscodecontentref_/32) and [Database1.php](http://_vscodecontentref_/33).

4. Start your local server and navigate to the project directory.

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
