# Registration_task
Simple registration-login sckript.

Registration form that allows user to sign up to site.

After successful registration user will be signed in automatically.
System will display current user email, name and ‘logout’ link.
User can log out by clicking on link.
“Sign in” form.
User can sign in with their login + password OR email + password pairs.

Functional requirements
Registration form fields:
-email;
-login(min 6 en Characters );
-real name (min 6 en-ru Characters );
-password (min 6 en Characters );
-birth date (calendar);
-country (drop down list taken from database);
-agree with terms and conditions (checkbox, must be checked by user).

Sign in form fields:

-login or email;
-password.

Every form have "Red line"(error field).

All fields validates before saving to DB;
Form stay filled (except password field) in case of validation errors;
Email and login - unique;
List of countries stored in DB;
Added user registration Unix timestamp to DB (field type - integer).
Routing work not only in the root of domain.

