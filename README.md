# server-side-ca2
This is my PHP college project. It is a Recipe website, whose primary function is to display the details of recipes stored in a MySQL database. In this readme I aim to talk in depth about each important file, my thought process behind decisions and the things I failed to do.

---
# Index.php
This PHP code retrieves data from a database of recipes, specifically the recipe ID, title, description, image, cooking time, instructions, and ingredients. It uses a prepared statement to execute a SQL query that joins the "recipes" and "ingredients" tables on their recipe ID, groups the results by recipe ID, and orders them by recipe ID. The query also concatenates the ingredient name, quantity, and unit into a single string using GROUP_CONCAT and CONCAT_WS. I found this worked best with the data I had created as without concatenating it, it would display the recipes multiple times based on the ingredient data. The fetched data is stored in an array variable called $recipes.

The HTML code uses Bootstrap to style a navigation bar and a container for the recipe list. It includes a header with a hero image and text, and a div that displays each recipe's image, title, and cooking time. The PHP code uses a foreach loop to iterate through each recipe in the $recipes array and display its data. It also generates a link to a recipe details page with the recipe ID as a parameter. I used this method as I wanted to display each recipe in it's own 'card', so to speak. The design is fairly basic as I focused more on the implementation of the various features needed for the assignment.

References to relevant tutorials or resources are provided at the end of the code.

---
# page-3.php
This is the page that contains the contact form. The code is a template for a basic website page that includes a navigation bar, a form, and some custom styles. The page is written in HTML and includes links to Bootstrap and custom CSS files. The navigation bar includes a logo and a "Contact Us" link. The form includes fields for name, email, phone number, address, country, and a message. All fields are required. The form uses the POST method and submits to a PHP file called "contact-form-handler.php". The page also includes a Bootstrap JavaScript bundle. Regretably, I did not have the chance to add better error messages to the form. If the user enters incorrect details it shows the errors like in the starter template.

---
# contact-form-handler.php
This is a PHP script for handling form submissions from a contact form. The script begins with error checking to ensure that all required fields have been filled out and that the email address and phone number are valid. If there are no errors, an email is created and sent to the email address specified in the script with the submitted information. Finally, the user is redirected to a "thank you" page. If there are errors, they are displayed on the page for the user to correct.

---
# database.php
This PHP code sets up a connection to a MySQL database named 'D00238368' (My d number) on a local server. The connection credentials are specified in the code with the $dsn, $username, and $password variables.
The code then attempts to connect to the database using the PDO (PHP Data Objects) library. If the connection is successful, the $db variable is set to the database object, which can be used to query the database.
If an error occurs during the connection attempt, a PDOException is thrown and caught by the code. The error message is then saved to the $error_message variable and the code includes a file named 'database_error.php' to display the error message. Finally, the code exits to prevent further execution.
This code is taken from the "https://mysql07.comp.dkit.ie/" example PHP script. As I found this was the only version that worked.

---
# mystyle.css
This code is a set of CSS styles for a website that includes a navigation bar, a header section with a large image, a list of recipes, and a contact form. It also includes responsive styles for different screen sizes.

The code imports a font from Google Fonts and sets styles for different HTML elements, including tables, headers, and forms. The navigation bar is styled with a dark background color and white text, while the header section includes an image with a semi-transparent overlay and centered text. The list of recipes is displayed in a grid with images and text, and the contact form includes labels that transition to the top of the input fields when the user interacts with them.

The code also includes media queries for smaller and larger screens to ensure that the website is responsive and looks good on all devices.
