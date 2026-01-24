-- Table de liaison entre sprints et compétences
-- À exécuter dans votre base de données PostgreSQL

CREATE TABLE IF NOT EXISTS sprint_comp (
    id SERIAL PRIMARY KEY,
    sprint_id INTEGER NOT NULL REFERENCES sprint(id) ON DELETE CASCADE,
    comp_id INTEGER NOT NULL REFERENCES competence(id) ON DELETE CASCADE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(sprint_id, comp_id)
);

-- Index pour améliorer les performances
CREATE INDEX IF NOT EXISTS idx_sprint_comp_sprint ON sprint_comp(sprint_id);
CREATE INDEX IF NOT EXISTS idx_sprint_comp_comp ON sprint_comp(comp_id);
