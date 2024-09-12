Project Documentation: Enhanced CRUD Application Step-by-Step Instructions for Setup Download the Project

Clone or download the project from the repository provided. Install Dependencies

Open a terminal in the project directory. Run the following command to install Node.js dependencies:

    npm install
Build Assets (Optional) If the project doesn't work properly after installation, run the following command to build assets:

    npm run build
Configure MySQL Database

Open the .env file in the project directory. Update the database configuration (DB_DATABASE, DB_USERNAME, DB_PASSWORD) to match your MySQL setup. For example:

DB_CONNECTION=mysql 
DB_HOST=127.0.0.1 
DB_PORT=3306 
DB_DATABASE=ims 
DB_USERNAME=your_database_username 
DB_PASSWORD=your_database_password

Migrate the Database

Run the following command to create the necessary tables in your database:

    php artisan migrate
Run the Application

Start the server with:

    php artisan serve
Visit http://127.0.0.1:8000 in your browser to access the application.




Project Overview This enhanced CRUD application uses Laravel 11 and is styled with the AdminLTE template to provide a modern and responsive user interface. It allows users to add, view, edit, and delete items through an intuitive web interface.

AdminLTE Template: 

The application uses the AdminLTE template for the frontend. The side navigation bar, header, and overall layout are powered by AdminLTE, which enhances the user experience.

Sidebar Route for Add Item: In the sidebar, there's a menu item labeled "Add New Item". Clicking on it routes the user to a new page where they can add an item. This page contains a form to input item details, such as the name, description, and price.




Features and Functionalities:

Add New Item
The "Add Item" page has a form that includes fields for item details:

Name: A text input field for the item's name. Description: A textarea for item details. Quantity: A number field for the quantity of the items. Submit Button: When the user clicks the submit button, the form data is saved to the database, and the new item appears in a table below the form.

Items Table After adding an item, it will appear in the Items Table, located below the form. The table displays each item's Name, Description, Quantity, and includes Action Buttons to: Edit: Modify an existing item. Delete: Remove an item from the database.

Action Buttons Edit Button: Opens the selected item's details in the form for modification. Delete Button: Removes the item from the database, with a confirmation prompt.

Also "..." button is used for the description and when clicked it it shows the modal of the description using Ajax request
