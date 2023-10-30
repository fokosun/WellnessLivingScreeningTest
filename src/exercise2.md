## Solution
```mysql
SELECT
    t1.dt, t1.s
FROM
    t AS t1
        LEFT OUTER JOIN t AS t2 ON t1.uid = t2.uid
        AND(t1.dt < t2.dt OR(t1.dt = t2.dt AND t1.id < t2.id))
WHERE
    t2.uid IS NULL;
```

In this implementation, a left outer join on the table t ON the uid will one row for each row in the original table.

![left-outer-join.png](..%2Ffiles%2Fleft-outer-join.png)


Now, we are able to filter by the date with `AND(t1.dt < t2.dt OR(t1.dt = t2.dt AND t1.id < t2.id))`.

![filter_rows.png](..%2Ffiles%2Ffilter_rows.png)

Here, the AND operator, first:
1) filters by date, this reduces the number of rows (see image above). The where class returns the rows that are the most recent messages, because these rows have dates that are return false in the the filter `t1.dt < t2.dt`
2) To retrieve the needed rows, the WHERE clause is introduced to return the rows with NULL uid
3) The OR operator is added to return just one row in the case where a uid has multiple rows with the exact datetime stamp

### sql dump used to test
```mysql
-- -------------------------------------------------------------
-- TablePlus 5.1.0(468)
--
-- https://tableplus.com/
--
-- Database: athiftsxpmxaj82c
-- Generation Time: 2023-10-30 18:56:59.3370
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `t`;
CREATE TABLE `t` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `s` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `t` (`id`, `uid`, `s`, `dt`) VALUES
(2, 1, 'text 1', '2023-10-26 20:11:30'),
(3, 1, 'text 2', '2023-10-26 20:15:38'),
(4, 2, 'text 1', '2023-10-26 19:15:04'),
(5, 1, 'text 3', '2022-10-26 20:15:38'),
(6, 3, 'text 1', '2023-10-26 19:15:04'),
(7, 3, 'text 2', '2023-10-26 19:15:04');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
```
