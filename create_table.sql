CREATE DATABASE `infuse_media_04122023`;
CREATE TABLE `page_views`
(
    `id`          int(11) unsigned NOT NULL AUTO_INCREMENT,
    `ip_address`  varchar(255)     NOT NULL,
    `user_agent`  text             NOT NULL,
    `view_date`   datetime         NOT NULL,
    `page_url`    text             NOT NULL,
    `views_count` int(11)          NOT NULL,
    PRIMARY KEY (`id`),
    KEY `ip_address` (`ip_address`),
    KEY `user_agent` (`user_agent`(191)),
    KEY `page_url` (`page_url`(191))
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_520_ci;
