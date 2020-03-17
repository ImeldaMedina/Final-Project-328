# Final-Project-328
Separates database/business logic using the MVC pattern.
- The Project has Model, View and Controller. The database functions are in Model, the controller is used for the views. 
 
All URLs are routed using the Fat-Free framework.
- We use both POST and GET throughout the project. F3 is used to define routes and needed values
 
Has a clearly defined database layer using PDO and prepared statements. You should have at least two related tables.
- All calls to the database are made through functions in /model/database.php

Data can be viewed, added, updated, and deleted.
- Admin users can access a special 'admin tools' page, from here an admin
 can view all orders ships and registered users. They can also make other users admins, delete users and cancel starship orders

History of commits from both team members to a Git repository.
- Both Imelda and I have worked on this project, as shown in our commits

Uses OOP, and defines multiple classes, including at least one inheritance relationship.
- We have a basic starship and specialty starship classes for each purpose assigned (battleship uses the BattleShip class)

Has validation on the client side through JavaScript and server side through PHP.
- Javascript verifies that all modules of a starship have sufficient power, php validates that each value is valid.