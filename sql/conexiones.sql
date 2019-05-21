CREATE TABLE conexiones(
    id_usuario INT NOT NULL,
    ip_usuario VARCHAR(30) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
);