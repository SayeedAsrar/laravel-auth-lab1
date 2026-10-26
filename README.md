# Laravel Authentication Lab

**Student Name:** Sayeed Asrar

## Note to Instructor
Due to lack of access to a computer, I was unable to run the `composer create-project` command to generate the full Laravel boilerplate. However, I have manually implemented all the required logic, routes, controllers, and views for this lab directly in this repository. 

All TODOs in the assignment (Tasks 2-8) have been completed successfully.

## Implemented Features:
1.  **Routes (`routes/web.php`):** Named routes, middleware (`guest`, `auth`), and redirects are set up.
2.  **Registration (`AuthController@register`):** Validates inputs, hashes passwords using `Hash::make`, and creates the user.
3.  **Login (`AuthController@login`):** Validates credentials using `Auth::attempt`, handles errors, regenerates session.
4.  **Dashboard (`dashboard.blade.php`):** Protected by `auth` middleware. Displays user name and email, includes a logout button.
5.  **Logout (`AuthController@logout`):** Invalidates session, regenerates token, and redirects to login.
6.  **Views:** Forms include `@csrf`, `old()` values for inputs, and display validation errors.

## Answers to "Be ready to explain":
1.  **Why do we use `Hash::make()`?** To securely encrypt passwords one-way before storing them in the database, preventing attackers from reading them even if the database is compromised.
2.  **How does `auth` middleware protect the dashboard?** It intercepts requests to the dashboard routes and checks if the user is authenticated. If not, it redirects them to the login page.
3.  **What does `@csrf` add to a form?** It adds a hidden security token to prevent Cross-Site Request Forgery (CSRF) attacks, ensuring the form submission comes from the legitimate application.
4.  ## Update: Book Registration and Viewing Lab
This task was also completed manually via the GitHub web interface. All requirements including the Book model, migration, controller logic (storing and retrieving books per user), and the Bootstrap dashboard with the table have been fully implemented in the codebase as requested.
