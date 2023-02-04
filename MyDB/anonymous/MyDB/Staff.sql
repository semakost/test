create table Staff
(
    id        int auto_increment
        primary key,
    name      varchar(255)         not null,
    position  varchar(30)          null,
    birthday  date                 not null,
    has_child tinyint(1) default 0 not null,
    phone     varchar(20)          not null,
    constraint phone
        unique (phone)
);

