CREATE TABLE manutencoes (
    id INT AUTO_INCREMENT PRIMARY KEY,

    equipamento_id INT NOT NULL,

    funcionario_id INT NOT NULL,

    tipo VARCHAR(50) NOT NULL,

    descricao TEXT NOT NULL,

    data_manutencao DATE NOT NULL,

    proxima_manutencao DATE NULL,

    custo DECIMAL(10,2) NULL,

    status VARCHAR(20) NOT NULL,

    created_at TIMESTAMP NULL,

    updated_at TIMESTAMP NULL,

    FOREIGN KEY (equipamento_id)
        REFERENCES equipamentos(id),

    FOREIGN KEY (funcionario_id)
        REFERENCES funcionarios(id)
);