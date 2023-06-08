<?php

use Core\Db;
use Dotenv\Dotenv;

require_once dirname(__DIR__) . '/Config/constants.php';
require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv::createUnsafeImmutable(BASE_DIR);
$dotenv->load();

return new class
{
    protected const SCRIPTS_DIR = __DIR__ . '/scripts/';

    protected const MIGRATIONS_TABLE_SQL = '0_migration.sql';

    protected PDO $db;

    public function __construct()
    {
        $this->db = Db::connect();
        try {
            $this->db->beginTransaction();

            $this->createMigrationTable();
            $this->runMigrations();

            $this->db->commit();
        } catch (PDOException $exception) {
            $this->db->rollBack();
            d($exception->getMessage(), $exception->getTrace());
        }
    }

    protected function createMigrationTable(): void
    {
        d('----- Prepare migration table query -----');
        $sql = file_get_contents(static::SCRIPTS_DIR . static::MIGRATIONS_TABLE_SQL);
        $query = $this->db->prepare($sql);

        $result = match ($query->execute()) {
            true => '- Migration table was created (or already exists)',
            false => '- Failed'
        };

        d($result);
        d('----- Finished migration table query -----');
    }

    protected function runMigrations(): void
    {
        d('----- Fetching migrations -----');

        $migrations = scandir(static::SCRIPTS_DIR);
        $migrations = array_values(array_diff($migrations, ['.', '..', static::MIGRATIONS_TABLE_SQL]));

        foreach ($migrations as $migration) {
            if (! $this->isMigrationExist($migration)) {

                $sql = file_get_contents(static::SCRIPTS_DIR . $migration);
                $query = $this->db->prepare($sql);

                if ($query->execute()) {
                    $this->saveMigration($migration);
                    d("- [$migration] - DONE");
                }
            } else {
                d("- [$migration] - SKIPPED");
            }
        }

        d('----- Fetching migrations - DONE -----');
    }

    protected function isMigrationExist(string $migration): bool
    {
        $q = $this->db->prepare("SELECT * FROM migrations WHERE name = :name");
        $q->execute([':name' => $migration]);

        return (bool) $q->fetch();
    }

    protected function saveMigration(string $migration): void
    {
        $q = $this->db->prepare("INSERT INTO migrations (name) VALUES (:name)");
        $q->execute([':name' => $migration]);
    }
};
