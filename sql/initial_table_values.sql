USE workout_tracker;

-- Permission
INSERT INTO Permission (id, name, description) VALUES
(1, 'Void', 'Catch-all.'), 
(2, 'System_Administrator', 'Full system administration.'),
(3, 'Group_Administrator', 'Group Administrator.'),
(4, 'User', 'General user access.'),
(5, 'Viewer', 'Viewer.');

-- Type
INSERT INTO Type (id, name, description) VALUES
(1, 'Void', 'Catch-all.'),
(2, 'Cycle', ''),
(3, 'Run', ''),
(4, 'Swim', ''),
(5, 'Walk', '');
