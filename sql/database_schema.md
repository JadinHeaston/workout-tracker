# Database Schema <!-- omit in toc -->

## ToC <!-- omit in toc -->

1. [Database](#database)
2. [Tables](#tables)
	1. [Group](#group)
		1. [SQL Creation](#sql-creation)
	2. [Permission](#permission)
		1. [SQL Command](#sql-command)
		2. [Values](#values)
			1. [SQL Insert](#sql-insert)
	3. [Type](#type)
		1. [SQL Creation](#sql-creation-1)
		2. [Values](#values-1)
			1. [SQL Insert](#sql-insert-1)
	4. [User](#user)
		1. [SQL Creation](#sql-creation-2)
	5. [Workout](#workout)
		1. [SQL Creation](#sql-creation-3)
3. [Views](#views)
	1. [Metric](#metric)

## Database

```sql
CREATE OR REPLACE DATABASE workout_tracker;
```

## Tables

### Group

| Column Name | Description    | Datatype   |
| ----------- | -------------- | ---------- |
| id          | Auto-generated | BINARY(36) |
| name        |                | VARCHAR    |
| description |                | VARCHAR    |

#### SQL Creation

```sql
CREATE TABLE `Group` (
	id BINARY(36) NOT NULL DEFAULT UUID() PRIMARY KEY,
	name VARCHAR(64) NOT NULL,
	description VARCHAR(256) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
```

### Permission

| Column Name | Description      | Datatype         |
| ----------- | ---------------- | ---------------- |
| id          | Auto-incremented | TINYINT UNSIGNED |
| name        |                  | VARCHAR(64)      |
| description |                  | VARCHAR(256)     |

#### SQL Command

```sql
CREATE TABLE `Permission` (
	id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(64) NOT NULL,
	description VARCHAR(256) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
```

#### Values

| ID  | Name                 | Description                 |
| --- | -------------------- | --------------------------- |
| 1   | Void                 | Catch-all failure.          |
| 2   | System_Administrator | Full system administration. |
| 3   | Group_Administrator  | Group Administrator.        |
| 4   | User                 | General user access.        |
| 5   | Viewer               | View only access.           |

##### SQL Insert

```sql
INSERT INTO Permission (id, name, description) VALUES
(1, 'Void', 'Catch-all.'), 
(2, 'System_Administrator', 'Full system administration.'),
(3, 'Group_Administrator', 'Group Administrator.'),
(4, 'User', 'General user access.'),
(5, 'Viewer', 'Viewer.');
```

### Type

| Column Name | Description      | Datatype         |
| ----------- | ---------------- | ---------------- |
| id          | Auto-incremented | TINYINT UNSIGNED |
| name        |                  | VARCHAR          |
| description |                  | VARCHAR          |

#### SQL Creation

```sql
CREATE TABLE `Type` (
	id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(64) NOT NULL,
	description VARCHAR(256) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
```

#### Values

| ID  | Name  | Description |
| --- | ----- | ----------- |
| 1   | Void  | Catch-all.  |
| 2   | Cycle |             |
| 3   | Run   |             |
| 4   | Swim  |             |
| 5   | Run   |             |

##### SQL Insert

```sql
INSERT INTO Type (id, name, description) VALUES
(1, 'Void', 'Catch-all.'),
(2, 'Cycle', 'Specific workout.'),
(3, 'Run', 'Specific workout.'),
(4, 'Swim', 'Specific workout.'),
(5, 'Walk', 'Specific workout.');
(6, 'Step', 'Steps taken for a given period.');
```

### User

| Column Name   | Description         | Datatype         |
| ------------- | ------------------- | ---------------- |
| id            | Auto-generated      | BINARY(36)       |
| username      |                     | VARCHAR(64)      |
| first_name    |                     | VARCHAR(50)      |
| last_name     |                     | VARCHAR(50)      |
| email         | Email Address       | VARCHAR(254)     |
| group_id      | FK to group         | BINARY(36)       |
| permission_id | FK of Permission id | TINYINT UNSIGNED |

#### SQL Creation

```sql
CREATE TABLE `User` (
	id BINARY(36) NOT NULL DEFAULT UUID() PRIMARY KEY,
	username VARCHAR(64) NOT NULL,
	password CHAR(97) NOT NULL,
	first_name VARCHAR(64) NOT NULL,
	last_name VARCHAR(64) NOT NULL,
	email VARCHAR(254),
	group_id BINARY(36),
	permission TINYINT UNSIGNED NOT NULL DEFAULT 4,
	CONSTRAINT `fk_permission` FOREIGN KEY (permission) REFERENCES `Permission` (id) ON DELETE RESTRICT ON UPDATE RESTRICT,
	CONSTRAINT `fk_group_id` FOREIGN KEY (group_id) REFERENCES `Group` (id) ON DELETE RESTRICT ON UPDATE RESTRICT,
	UNIQUE INDEX ix_username (username),
	INDEX ix_permission (permission),
	INDEX ix_group_id (group_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
```

### Workout

| Column Name | Description         | Datatype         |
| ----------- | ------------------- | ---------------- |
| id          | Auto-generated      | BINARY(36)       |
| owner       | Change Owner (`ID`) | BINARY(36)       |
| type        |                     | TINYINT UNSIGNED |
| start_time  |                     | DATETIME         |
| end_time    |                     | DATETIME         |
| notes       |                     | TEXT(65535)      |

#### SQL Creation

```sql
CREATE TABLE `Workout` (
	id BINARY(36) NOT NULL DEFAULT UUID() PRIMARY KEY,
	owner BINARY(36) NOT NULL,
	type TINYINT UNSIGNED NOT NULL,
	start_time DATETIME NULL,
	end_time DATETIME NULL,
	CONSTRAINT `fk_owner` FOREIGN KEY (owner) REFERENCES Users (id) ON DELETE RESTRICT ON UPDATE RESTRICT,
	CONSTRAINT `fk_type` FOREIGN KEY (type) REFERENCES Type (id) ON DELETE RESTRICT ON UPDATE RESTRICT,
	INDEX ix_owner (owner),
	INDEX ix_type (type),
	INDEX ix_start_time (start_time),
	INDEX ix_end_time (end_time)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
```

## Views

### Metric

