BEGIN;
INSERT INTO user (email, roles, password)
VALUES (:email, :roles, :password);
COMMIT;