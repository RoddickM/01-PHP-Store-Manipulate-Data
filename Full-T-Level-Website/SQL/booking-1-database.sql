-- (A) USERS
CREATE TABLE `users` (
    `user_id` bigint(20) NOT NULL,
    `user_name` varchar(255) NOT NULL,
    `user_email` varchar(255) NOT NULL,
    `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `users`
ADD PRIMARY KEY (`user_id`),
ADD UNIQUE KEY `user_email` (`user_email`);

ALTER TABLE `users`
MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Joa Doe', 'joa@doe.com', '12345'),
(2, 'Job Doe', 'job@doe.com', '12345'),
(3, 'Joe Doe', 'joe@doe.com', '12345'),
(4, 'Jon Doe', 'jon@doe.com', '12345'),
(5, 'Joy Doe', 'joy@doe.com', '12345');

-- (B) APPOINTMENTS
CREATE TABLE `appointments` (
    `appo_date` date NOT NULL,
    `appo_slot` varchar(255) NOT NULL,
    `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `appointments`
ADD PRIMARY KEY (`appo_date`,`appo_slot`),
ADD KEY `user_id` (`user_id`);