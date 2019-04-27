CREATE TABLE eventos(
    id_evento INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(60) NOT NULL,
    organizador VARCHAR(60),
    fecha DATETIME NOT NULL,
    texto LONGTEXT,
    info_adicional TEXT
);