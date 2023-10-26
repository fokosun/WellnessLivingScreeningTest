# Software Developer Screening Task

This repository contains the answers to the following assignments:

`Exercise 1:` 

- Find the first element in alphabetical order for an array of strings using a loop

`Exercise 2:` 

- Write an SQL query to retrieve date and text of the last message for all users.


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
