CREATE TABLE IF NOT EXISTS incomes (
    id SERIAL CHECK ( id > 0 ) PRIMARY KEY,
    user_id INT NOT NULL,
    source_id INT NOT NULL,
    description TEXT,
    sum FLOAT,
    created_at TIMESTAMP DEFAULT NOW()
);
