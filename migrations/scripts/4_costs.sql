CREATE TABLE IF NOT EXISTS costs (
    id SERIAL CHECK ( id > 0 ) PRIMARY KEY,
    user_id INT NOT NULL,
    category_id INT NOT NULL,
    description TEXT,
    sum FLOAT,
    created_at TIMESTAMP DEFAULT NOW()
);
