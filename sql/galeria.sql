CREATE TABLE galeria(
    id_evento INT UNSIGNED,
    imagen VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_evento) REFERENCES eventos(id_evento)
);