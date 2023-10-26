# Software Developer Screening Task

This repository contains the answers to the following assignments:

`Exercise 1:` 

- Find the first element in alphabetical order for an array of strings using a loop. For example, for this array: `$a=['my','name','is','john','doe'];` the result should be 'doe'. Please write your answer in PHP 8.2

`Exercise 2:` 

- There is a `t` table with 3 fields:
  
    - `uid` - user ID

    - `dt` - date and time of message

    - `s` - text of the message

Each message gets its own row in the database. Write an SQL query to retrieve date and text of the last message for all users.

`Exerice 3:`

- A business has two types of users: staff and clients. Staff members can perform actions to help run the business while clients interact with the business by buying products and services. The two types of users aren't completely different however, they both have logins and profiles. Describe in words (no source code) what classes you'd create to model users for this business and any relationships between classes (no need for properties or methods).

## Exercise 1
The solution to this assignment can be found in:

```text
src/AlphabeticalOrder
```

### Explanation of the approach used

- Given a list of strings, the `findFirst` method loops through the array of strings
- Then uses the `inbuilt php ord function` to create an associative array using the returned ASCII value from the ord function as the key and the string as the value.
- Next, the keys are compared using the php inbuilt min function to get the string with the lowest value

```text
Reference: https://www.php.net/manual/en/function.ord.php
```

### Test
A couple of test cases (including the one provided in the assignment) were used to test the implementation. To run the tests, change directory to tests and run the following command:
```text
./vendor/bin/phpunit tests
```
![exercise-1.png](files%2Fexercise-1.png)
