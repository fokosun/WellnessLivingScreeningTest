### Problem statement

```text
A business has two types of users: staff and clients. Staff members can perform actions to help run the business while clients interact with the business by buying products and services. 

The two types of users aren't completely different however, they both have logins and profiles. 

Describe in words (no source code) what classes you'd create to model users for this business and any relationships between classes (no need for properties or methods).
```

## Solution
Based on the above, users can only be differentiated by their "role" which in this case can simply just be staff or client.
Everything else is the same for all users like logins (authentication). Given this, we can say authorization to access certain parts of the business logic can be restricted by their assigned role(s) i.e authorization.


### Required classes

- User class

- Role Model

- UserRole Model 

# User Class
This class represents a user entity. It will be mapped to the users table in the database. All users will have exactly one entry in this table. Every user can login, every user will have a `role` too or multiple roles but for the sake of simplicity, we'd assume just one role, staff or client. The user's role is what determines what actions the user is authorized to perform (`authorization`). The authorization logic can be handled in multiple ways, one of which is the implementation of a auth guard that checks user's authorization and rejects the request if the user is not authorized to perform the action in the request.


# Role Class
This class represents the Role entity. Like the User class, this class is tied to the roles table in the underlying database. The table will hold the roles supported, for simplicity, we'd have 2 rows in this table, staff and client.

# UserRole
Representing records of a user's role(s). The underlying database table (`user_roles`) will serve as a pivot table between the users and the roles tables. This means a user may have multiple rows. We can add strict rules to restrict a user to just one role if that's a hard requirement. This table will help keep track of user's permissions and can be used in the auth guard logic to determine if a request should be aborted or continue to the next request.

# Relationship Diagram

![relationship-diagram.png](..%2Ffiles%2Frelationship-diagram.png)
