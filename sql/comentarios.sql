CREATE TABLE comentarios(
    id_evento INT UNSIGNED,
    id_comentario INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    correo VARCHAR(60) NOT NULL,
    fecha DATETIME NOT NULL,
    texto TEXT NOT NULL,
    FOREIGN KEY (id_evento) REFERENCES eventos(id_evento),
    PRIMARY KEY(id_comentario)
);