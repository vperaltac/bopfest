CREATE TABLE imagenes_eventos(
    id_evento INT UNSIGNED,
    imagen VARCHAR(100) NOT NULL,
    titulo VARCHAR(30) NOT NULL,
    creditos VARCHAR(60),
    FOREIGN KEY (id_evento) REFERENCES eventos(id_evento)
);