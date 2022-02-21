BEGIN;
UPDATE user
SET roles    = :roles,
    password = :password
WHERE email = :email;
COMMIT;