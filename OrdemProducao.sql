CREATE TABLE ordens_producao (
    id INT AUTO_INCREMENT PRIMARY KEY,

    setor_id INT NOT NULL,

    responsavel_id INT NOT NULL,

    codigo_ordem VARCHAR(30) NOT NULL,

    produto VARCHAR(100) NOT NULL,

    quantidade_planejada INT NOT NULL,

    quantidade_produzida INT NOT NULL,

    data_inicio DATETIME NOT NULL,

    data_fim DATETIME NULL,

    status VARCHAR(20) NOT NULL,

    observacoes TEXT NULL,

    created_at TIMESTAMP NULL,

    updated_at TIMESTAMP NULL,

    FOREIGN KEY (setor_id)
        REFERENCES setores(id),

    FOREIGN KEY (responsavel_id)
        REFERENCES funcionarios(id)
);
